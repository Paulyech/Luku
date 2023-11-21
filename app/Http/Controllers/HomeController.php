<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Psy\Command\WhereamiCommand;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){

        $products=Product::paginate(3);

        return view('home.index',compact('products'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;

        if ($usertype=='1') {

            $total_order=order::all()->count();
            $total_product=product::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $dashorder=order::orderBy('created_at', 'desc')->get();
            $total_revenue=0;
            
            
            foreach ($order as $order) {
                $total_revenue=$total_revenue + $order->price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_pending=order::where('delivery_status','=','processing')->get()->count();

            return view('admin.home',compact('total_order','dashorder','total_product','total_user','total_revenue','total_delivered','total_pending'));
        } else {
            $products=Product::paginate(3);

            return view('home.index',compact('products'));
        }
    }

    public function details_product($id){
        $product=Product::find($id);

        return view('home.product_details',compact('product'));
    }

    public function add_cart(request $request,$id){

        if (Auth::id()) {
            
           $user=Auth::user();
           $userid=$user->id;

           $product=product::find($id);

           $product_exist_id = cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

           if ($product_exist_id) 
                {
                   $cart=cart::find($product_exist_id)->first();
                   $quantity=$cart->quantity;

                   $cart->quantity=$quantity + $request->quantity;

                        if ($product->discount_price !=null) {
                            $cart->price=$product->discount_price *$cart->quantity;

                        }
                        else {
                            $cart->price=$product->price *$cart->quantity;
                        }

                   $cart->save();
                 Alert::success('Product Added Successfully','Check Your Cart or Add More');
                   return redirect()->back()->with('message','product added to cart ');


                } else 
                {
                    $cart=new cart;

                    $cart->name=$user->name;
                    $cart->email=$user->email;
                    $cart->phone=$user->phone;
                    $cart->address=$user->address;
                    $cart->user_id=$user->id;

                    $cart->product_title=$product->title;
                    if ($product->discount_price !=null) {
                        $cart->price=$product->discount_price *$request->quantity;

                    }
                    else {
                        $cart->price=$product->price *$request->quantity;
                    }
                    $cart->image=$product->image;
                    $cart->product_id=$product->id;
                    $cart->quantity=$request->quantity;

                    $cart->save(); 
                    return redirect()->back()->with('message','product added to cart ');
                }
           

          

           


           
        }
        else {
            return redirect('login');
        }

    }

    public function show_cart(){

        if (Auth::id()) {
            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();
    
            return view('home.cart',compact('cart'));
        }
        else {
            return redirect('login');
        }

    }

    public function delete_cart($id){

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){

        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();


        foreach ($data as $data) {
            $order =new order;

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

            $order->payment_status ="Cash on delivery" ;
            $order->delivery_status ="processing" ;

            $order->save();

            $cart_id = $data->id;

            $cart=cart::find($cart_id);

            $cart->delete();
        }
        return redirect()->back()->with('message','Your order has been received ,we will get back to you as soon as possible');
    }

    public function show_order(){

        // check if user is logged in 
        if (Auth::id()) {
            // get logged in user details 
            $user=Auth::user();

            // get logged in user id 
            $userid=$user->id;

            // get order data of the user 

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }
        else
            return redirect('login');
    }

    public function cancel_order($id){

        $order=order::find($id);

        $order->delivery_status ='order cancelled';

        $order->save();

        return redirect()->back();

    }

    public function product_search(request $request){
        $searchText = $request->search;

        $products=product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"$searchText")->paginate(4);

        return view('home.index',compact('products'));
        

    }
    public function all_product_search(request $request){
        $searchText = $request->search;

        $products=product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"$searchText")->paginate(4);

        return view('home.all_products',compact('products'));
        

    }

    public function all_products(){
        $products=product::paginate(10);

        return view('home.all_products',compact('products'));

    }
}
