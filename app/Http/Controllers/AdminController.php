<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\sendEmailNotification;
use Illuminate\Http\Request;
use Notification;
use PDF;

class AdminController extends Controller
{
    public function view_category(){
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request){

        Category::create([
            "category_name"=>$request->category_name
        ]);
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id){

        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');


    }

    public function view_product(){

        $categories = Category::all();
        return view('admin.addProduct', compact('categories'));
    }

    public function addProduct(Request $request){
        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        Product::create([
            'title'=> $request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category'=>$request->category,
            'image'=>$imagename,
            'discounted_price'=>$request->discounted_price,
        ]);
        return redirect()->back()->with('message','product Added Successfully');
    }

    public function show_product(){
        $products = Product::all();

        return view('admin.showProduct', compact('products'));
    }

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');

    }

    public function update_product($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.updateProduct', compact('product','categories'));
    }

    public function update_product_confirm(Request $request,$id){

        $image=$request->image;
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image = $imagename;
            $product->save();
        }


        // if(!empty($request->has('image')))
        // {
        //     $imagename = time().'.'.$image->getClientOriginalExtension();
        //     $request->image->move('product',$imagename);
        //     $product->image = $imagename;
        // }
        $product->discounted_price = $request->discounted_price;

        $product->update();

        return redirect()->back()->with('message','product Updated Successfully');


    }

    public function show_all_orders(){

        $orders = Order::all();

        return view('admin.orders', compact('orders'));
    }
    public function deliver($id)
    {

        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->save();

        return redirect()->back();
    }

    public function pdf($id){
        $order = Order::find($id);
        // dd((public_path().'/product').'/'.$order->image);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');


    }

    public function sendEmail($id){

        $order = Order::find($id);
        return view('admin.sendEmail', compact('order'));
    }

    public function sendUserEmail(Request $request,$id){
        $order = Order::find($id);
        // $order = Order::where('id', $id)->get();

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline

        ];

        Notification::send($order, new sendEmailNotification($details));
        return redirect()->back();
    }

    public function search_order(Request $request){
        $search = $request->search;
        $orders = Order::where('name', 'LIKE', "%{$search}%")->orWhere('phone', 'LIKE', "%{$search}%")->orWhere('product_title', 'LIKE', "%{$search}%")->get();
        return view('admin.orders',compact('orders'));
    }
}
