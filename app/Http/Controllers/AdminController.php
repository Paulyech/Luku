<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
// use Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function view_category(){
        $data=category::All();
        $usetype=Auth::user();

        if ($usetype) {
            return view('admin.category',compact('data'));

        } 
        
        else
        {
            return redirect('login');
        }
        

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

        $image = $request->file('image');
        if ($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $product->image=$imagename;
        }

        

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
        

        $image = $request->file('image');
        if ($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $product->image=$imagename;
        }


        $product->save();

        return redirect()->back()->with('message','product updated succussfully');

    }

    public function view_order(){
        $order=order::All();

        return view('admin.order',compact('order'));
    }

    public function delivered_order($id){

        $order=order::find($id);

        $order->delivery_status ='delivered';
        $order->payment_status ='paid';

        $order->save();

        return redirect()->back();

    }

    public function print_pdf($id){

        $order =order::find($id);

        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
        



    }

    public function send_email($id){
        $order= order::find($id);

        return view('admin.email',compact('order'));
    }

    public function send_user_email(request $request,$id){
        $order=order::find($id);

        $details = [
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back()->with('message','email sent successfully');

    }

    public function searchdata(request $request){

        $searchText = $request->search;

        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();

        return view('admin.order',compact('order'));
    }
}
