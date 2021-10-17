<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;



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
Route::get('/',[HomeController::class,'index'])->name('home.index');


Route::get('/about',[HomeController::class,'about'])->name('about.about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact.contact');

Route::get('/shop',[HomeController::class,'shop'])->name('site.shop');
Route::get('/wishlish',[HomeController::class,'wishlish'])->name('site.wishlist');


Route::get('/shop',[HomeController::class,'shop'])->name('site.shop');

// start vinh
Route::get('/register',[HomeController::class,'register'])->name('site.register');
Route::get('/signIn',[HomeController::class,'signIn'])->name('site.signIn');
Route::get('/forgotPassword',[HomeController::class,'forgotPassword'])->name('site.forgotPassword');

// end vinh

Route::get('/checkout',[HomeController::class,'checkout'])->name('home.checkout');
Route::get('/product',[HomeController::class,'product'])->name('home.product');


Route::get('/blog','HomeController@blog')->name('home.blog');
Route::get('/blog-details','HomeController@blog_details')->name('home.blog_details');
