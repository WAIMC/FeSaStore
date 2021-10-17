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
Route::get('/',[App\Http\Controllers\client\HomeController::class,'index'])->name('client.index');


Route::get('/about',[App\Http\Controllers\client\HomeController::class,'about'])->name('client.about');
Route::get('/contact',[App\Http\Controllers\client\HomeController::class,'contact'])->name('client.contact');

Route::get('/shop',[App\Http\Controllers\client\HomeController::class,'shop'])->name('client.shop');
Route::get('/wishlish',[App\Http\Controllers\client\HomeController::class,'wishlish'])->name('client.wishlist');


Route::get('/shop',[App\Http\Controllers\client\HomeController::class,'shop'])->name('client.shop');

// start vinh
Route::get('/register',[App\Http\Controllers\client\HomeController::class,'register'])->name('client.register');
Route::get('/signIn',[App\Http\Controllers\client\HomeController::class,'signIn'])->name('client.signIn');
Route::get('/forgotPassword',[App\Http\Controllers\client\HomeController::class,'forgotPassword'])->name('client.forgotPassword');

// end vinh

Route::get('/checkout',[App\Http\Controllers\client\HomeController::class,'checkout'])->name('client.checkout');
Route::get('/product',[App\Http\Controllers\client\HomeController::class,'product'])->name('client.product');


Route::get('/blog',[App\Http\Controllers\client\HomeController::class,'blog'])->name('client.blog');
Route::get('/blog-details',[App\Http\Controllers\client\HomeController::class,'blog_details'])->name('client.blog_details');
