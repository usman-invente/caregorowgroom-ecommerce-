<?php

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
Route::get('sub', function(){
    // return App\Models\Category::with(['childs'=>function($query){
    //     $query->with(['childs']);
    // }])->where('p_id',0)->get();

    // return App\Models\Product::with('images')->where('id',19)->first();

    return App\Models\Order::with('orders_products')->where('id',19)->get();
});
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('product-detail/{slug}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productDetail');
Route::post('addproduct', [App\Http\Controllers\ProductController::class, 'addproduct'])->name('addproduct');
Route::get('cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::post('updateCart', [App\Http\Controllers\ProductController::class, 'updateCart'])->name('updateCart');
Route::delete('removecart', [App\Http\Controllers\ProductController::class, 'removecart'])->name('removecart');
Route::get('checkout', [App\Http\Controllers\ProductController::class, 'checkout'])->name('checkout');
Route::post('order', [App\Http\Controllers\ProductController::class, 'order'])->name('order');
Route::get('about-us', [App\Http\Controllers\IndexController::class, 'about'])->name('about');
Route::get('contact-us', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact');
Route::post('contact-us', [App\Http\Controllers\IndexController::class, 'ContactEmail'])->name('contactus');
//orders
Route::get('orders', [App\Http\Controllers\ProductController::class, 'orders'])->name('user.allorder');
Route::post('orders', [App\Http\Controllers\ProductController::class, 'getAllOrders'])->name('user.getorders');

//blogs
Route::get('blog/detail/{slug}', [App\Http\Controllers\ProductController::class, 'blogDetail'])->name('blogDetail');
Route::get('product/category/{id}', [App\Http\Controllers\ProductController::class, 'productListing'])->name('productListing');
Route::get('getproductsByCategory', [App\Http\Controllers\ProductController::class, 'getProductsByCategory'])->name('getProductsByCategory');
Route::get('shopbyprice', [App\Http\Controllers\ProductController::class, 'shopbyprice'])->name('shopbyprice');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
