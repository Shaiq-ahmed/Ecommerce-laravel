<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\TryCatch;

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
}
