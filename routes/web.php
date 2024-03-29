<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/view_category',[AdminController::class,'view_category']);
Route::get('/view_order',[AdminController::class,'view_order']);
Route::get('/delivered_order/{id}',[AdminController::class,'delivered_order']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

Route::get('/view_product',[AdminController::class,'view_product']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
Route::post('/update_product/{id}',[AdminController::class,'update_product']);
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);
Route::get('/search',[AdminController::class,'searchdata']);




Route::get('/details_product/{id}',[HomeController::class,'details_product']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::get('/delete_cart/{id}',[HomeController::class,'delete_cart']);
Route::get('/product_search',[HomeController::class,'product_search']);
Route::get('/all_product_search',[HomeController::class,'all_product_search']);
Route::get('/all_products',[HomeController::class,'all_products']);


// cash on delivery 
Route::get('/cash_order',[HomeController::class,'cash_order']);


