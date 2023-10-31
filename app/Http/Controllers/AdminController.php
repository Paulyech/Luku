<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data=category::All();

        return view('admin.category',compact('data'));
    }

    public function add_category(request $request){

        $data= new category;
        $data->category_name=$request->category;
        $data->save();

        return redirect()->back()->with('message','category added succussfully');
    }

    public function delete_category($id){
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','category deleted succussfully');

    }



    public function view_product(){

        $category= category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(request $request){

        $product=new product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        // $image=$request->image;
        $image = $request->file('image');

        $imagename=time().'.'.$image->getClientOriginalExtension();

        // Store the image in the "public/product" directory
        $image->storeAs('public/product', $imagename);

        // Save the image file path to the database
        $product->image = 'product/' . $imagename;


        // $request->image->move('product',$imagename);


        $product->save();

        return redirect()->back()->with('message','product added succussfully');


    }

    public function show_product(){
        $product=product::all();

        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);

        $product->delete();
        return redirect()->back()->with('message','product deleted succussfully');

    }

    public function edit_product($id){

        $product=product::find($id);
        $category=Category::all();

        return view('admin.edit_product',compact('product','category'));
    }
    public function update_product(request $request, $id){

        
        $product= product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        
        $image=$request ->file('image');

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/product',$imagename);
    
            $product->image = 'product/'.$imagename;
        }



        $product->save();

        return redirect()->back()->with('message','product updated succussfully');

    }
}
