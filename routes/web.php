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

/*
    Start route admin
*/ 
    Route::get('/Admin/Login',[App\Http\Controllers\admin\Auth\loginController::class,'login'])->name('admin.login');
    Route::post('/Admin/Login',[App\Http\Controllers\admin\Auth\loginController::class,'postLogin'])->name('admin.login');

    Route::get('/Admin/Register',[App\Http\Controllers\admin\Auth\RegisterController::class,'register'])->name('admin.register');
    Route::post('Admin/Register',[App\Http\Controllers\admin\Auth\RegisterController::class,'postRegister'])->name('admin.register');


    Route::prefix('admin')->middleware('adminAuth')->group(function(){
        Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.index');
        Route::get('/file',[App\Http\Controllers\admin\AdminController::class,'file'])->name('admin.file');
        Route::post('/Admin/Logout',[App\Http\Controllers\admin\Auth\loginController::class,'logout'])->name('admin.logout');

        Route::resources([
            'settingLink'=>admin\SettingLinkController::class,
            'category'=>admin\CategoryController::class,
            'product'=>admin\ProductController::class,
            'banner'=>admin\BannerController::class,
            'variantProduct'=>admin\VariantProductController::class,
            'brand'=>admin\BrandController::class,
            'blog'=>admin\BlogController::class,
            'categoryblog'=>admin\CategoryBlogController::class
        ]);
    });

/*
    End route admin
*/ 


/*
    Start route client
*/ 
    Route::get('/',[App\Http\Controllers\client\HomeController::class,'index'])->name('client.index');
    Route::get('/about',[App\Http\Controllers\client\HomeController::class,'about'])->name('client.about');
    Route::get('/contact',[App\Http\Controllers\client\HomeController::class,'contact'])->name('client.contact');
    Route::get('/shop',[App\Http\Controllers\client\HomeController::class,'shop'])->name('client.shop');
    Route::get('/productDetail/{product_id}',[App\Http\Controllers\client\HomeController::class,'productDetail'])->name('client.productDetail');
    Route::get('/wishlist',[App\Http\Controllers\client\HomeController::class,'wishlish'])->name('client.wishlist');
// route user
    Route::get('/register',[App\Http\Controllers\admin\Auth\loginController::class,'register'])->name('client.register');
    Route::get('/login',[App\Http\Controllers\client\Auth\loginController::class,'login'])->name('client.login');
    Route::get('/forgotPassword',[App\Http\Controllers\admin\Auth\loginController::class,'forgotPassword'])->name('client.forgotPassword');
 //end
    Route::get('/checkout',[App\Http\Controllers\client\HomeController::class,'checkout'])->name('client.checkout');
    Route::get('/blog',[App\Http\Controllers\client\HomeController::class,'blog'])->name('client.blog');
    Route::get('/blog-details/{slug}',[App\Http\Controllers\client\HomeController::class,'blog_details'])->name('client.blog_details');
    Route::get('/blog/category/{slug}',[App\Http\Controllers\client\HomeController::class,'categoryblog'])->name('client.cateblog');
/*
    End route client
*/ 

// Auth::routes();

// Route::get('/home', ['as' => 'login', App\Http\Controllers\HomeController::class, 'index'])->name('home');
