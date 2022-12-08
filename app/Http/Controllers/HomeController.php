<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Use Stripe;
// use Stripe;
// require_once('vendor/autoload.php');





class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('home.userpage', compact('products'));
    }
    public function redirect()
    {

        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {

            $totalproducts = Product::all()->count();
            $totalorders = Order::all()->count();
            $totalusers = User::all()->count();
            $totalrevenue = 0;
            $orders = Order::all();
            $delivered = Order::where('delivery_status', '=', 'delivered')->count();

            foreach ($orders as $order ){
                $totalrevenue = $totalrevenue + $order->price;
            }
            return view('admin.home',compact('totalproducts', 'totalorders', 'totalusers','totalrevenue','delivered'));
        } else {
            $products = Product::paginate(5);
            return view('home.userpage', compact('products'));
        }

    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.productDetails', compact('product'));
    }
    public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $request->quantity * $product->price;
            $cart->image = $product->image;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.cart', compact('cart'));
        }
        else{
            return redirect('login');
        }

    }

    public function remove_cartproduct($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function checkout(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $user = Auth::user();
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.checkout', compact('cart','user'));
        }
        else{
            return redirect('login');
        }

    }
    public function cash_order(){

        $user = Auth::user();
        $data = Cart::where('user_id', '=', $user->id)->get();
        foreach ($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();



        }
        return redirect()->back()->with('message', 'we have recieved your order we will confirm you soon');
    }

    public function stripe($totalprice){

        return view('home.stripe', compact('totalprice'));

    }
    public function stripePost(Request $request, $totalprice)

    {


        $stripe = Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $stripe->paymentIntents()->create([


                 "amount" => $totalprice / 100,

                 "currency" => "usd",

                 'payment_method_types' => [
                    'card',
                ],

         ]);

        $user = Auth::user();
        $data = Cart::where('user_id', '=', $user->id)->get();
        foreach ($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'paid';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();



        }



        Session::flash('success', 'Payment successful!');




        return back();

    }


}
