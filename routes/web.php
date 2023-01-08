<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\Order\OrderController;
use App\Http\Controllers\Users\Testimonial\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/show_product/{id}',[CategoryController::class , 'show_product'])->middleware('auth');

############################# Start Cart ###################################
//Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
////Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
//Route::post('cart', [CartController::class, 'addToMyCart'])->name('cart.storetocart');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
//Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


Route::post('cart', [CartController::class, 'addToMyCart'])->name('cart.storetocart');
Route::get('cartlist', [CartController::class, 'cartlist'])->name('cart.cartlist');
Route::post('cartremove/{product_id}', [CartController::class, 'removeCart'])->name('cart.remove');
//Route::post('update-cart/{product_id}', [CartController::class, 'updateCart'])->name('cart.update');
############################# End Cart ###################################

############################## Start Testimonial ###################################
Route::get( 'Testimonial',[TestimonialController::class , 'index'])->name('Testimonial')->middleware('auth');
Route::post('Testimonial',[TestimonialController::class , 'create'])->name('create.Testimonial')->middleware('auth');

############################# End Testimonial ###################################

Route::get('/show_product_details/{id}',[ProductController::class , 'show_product_details'])->middleware('auth');
Route::post('/addOrder',[OrderController::class ,'addOrder'])->name('order.add')->middleware('auth');
Route::get('product-Order',[OrderController::class ,'getOrderById']) ;
