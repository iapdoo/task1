<?php

use App\Http\Controllers\Admin\Admins\AdminController;
use App\Http\Controllers\Admin\AuthAdmin;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Orders\OrderController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
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




Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('login', [AuthAdmin::class, 'login'])->name('admin.login');
        Route::post('login', [AuthAdmin::class, 'dologin'])->name('admin.dologin');

    });

    Route::group(['middleware' => 'auth:admin'], function () {


        ################### Start Admin Control Users #####################################
        Route::get('getAllAdmins',[AdminController::class, 'AllAdmins'])->name('admin.AllAdmins');
        Route::get('create',[AdminController::class, 'create'])->name('admin.create');
        Route::post('store',[AdminController::class, 'store'])->name('admin.admin.store');
        Route::get('edit/{id}',[AdminController::class, 'edit'])->name('admin.edit');
        Route::post('update/{id}',[AdminController::class, 'update'])->name('admin.update');
        Route::get('destroy/{id}',[AdminController::class, 'destroy'])->name('admin.destroy');
        Route::get('admin/changeStatus/{id}',[AdminController::class, 'changeStatus'])->name('admin.changeStatus');
        ################### End Admin Control Users #####################################


        ################### Start Admin Dashboard #####################################
        Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
        ################### End Admin Dashboard #####################################

        ################### Start Category Control Dashboard #####################################
        Route::resource('Category',CategoryController::class);
        Route::post('Category/update/{id}',[CategoryController::class, 'update'])->name('Category.update');
        Route::get('Category/destroy/{id}',[CategoryController::class, 'destroy'])->name('Category.destroy');
        ################### End Category Control Dashboard #####################################


        ################### Start Product Control Dashboard #####################################
        Route::resource('Product',ProductController::class);
        Route::post('Product/update/{id}',[ProductController::class, 'update'])->name('Product.update');
        Route::get('Product/destroy/{id}',[ProductController::class, 'destroy'])->name('Product.destroy');
        ################### End Product Control Dashboard #####################################


        ################### Start Partner Control Dashboard #####################################
        Route::resource('Partner',PartnerController::class);
        Route::post('Partner/update/{id}',[PartnerController::class, 'update'])->name('Partner.update');
        Route::get('Partner/destroy/{id}',[PartnerController::class, 'destroy'])->name('Partner.destroy');
        ################### End Partner Control Dashboard #####################################


        ################### Start Testimonial Control Dashboard #####################################
        Route::get('testimonial/showindex',[TestimonialController::class , 'ShowIndex'])->name('testimonial.showindex');
        Route::get('testimonial/{id}',[TestimonialController::class , 'destroy'])->name('testimonial.destroy');
        Route::get('changeStatus/{id}', [TestimonialController::class, 'changeStatus'])->name('testimonial.status');
        ################### End Testimonial Control Dashboard #####################################

        ################### Start Orders Control Dashboard #####################################
        Route::get('orders/showindex',[OrderController::class , 'ShowIndex'])->name('orders.showindex');
        Route::get('orders/{id}',[OrderController::class , 'destroy'])->name('orders.destroy');
        Route::get('showDetails/{id}', [OrderController::class, 'showDetails'])->name('orders.showDetails');
        Route::get('changeStatusToPay/{id}',[OrderController::class , 'changeStatusToPay'])->name('orders.changeStatusToPay');
        Route::get('changeStatusToDelivered/{id}',[OrderController::class , 'changeStatusToDelivered'])->name('orders.changeStatusToDelivered');
        ################### End Orders Control Dashboard #####################################
    });
});
Route::get('admin/logout', [AuthAdmin::class, 'logout'])->name('admin.logout');
