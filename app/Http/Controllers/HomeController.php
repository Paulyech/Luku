<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;


class HomeController extends Controller
{
    public function index(){

        $products=Product::paginate(3);

        return view('home.index',compact('products'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;

        if ($usertype=='1') {
            return view('admin.home');
        } else {
            $products=Product::paginate(3);

            return view('home.index',compact('products'));
        }
    }

    public function details_product($id){
        $product=Product::find($id);

        return view('home.product_details',compact('product'));
    }
}
