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
    
    //Route::post('xu-li-don-hang/{id}',[])

    Route::prefix('admin')->middleware('adminAuth')->group(function(){
        Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.index');
        Route::post('/filter_chart_by_date',[App\Http\Controllers\admin\AdminController::class, 'filter_chart_by_date'])->name('admin.filter_chart_by_date');
        Route::get('/file',[App\Http\Controllers\admin\AdminController::class,'file'])->name('admin.file');
        Route::post('/Admin/Logout',[App\Http\Controllers\admin\Auth\loginController::class,'logout'])->name('admin.logout');

        Route::resources([
            'settingLink'=>admin\SettingLinkController::class,
            'category'=>admin\CategoryController::class,
            'product'=>admin\ProductController::class,
            'banner'=>admin\BannerController::class,
            'variantProduct'=>admin\VariantProductController::class,
            'brand'=>admin\BrandController::class,
            'order'=>admin\OrderController::class,
            'slider'=>admin\SliderController::class,
            'blog'=>admin\BlogController::class,
            'categoryblog'=>admin\CategoryBlogController::class,
            'role'=>admin\RoleController::class,
            'decentralize'=>admin\DecentralizeController::class,
            'comment'=>admin\CommentController::class,
            'order'=>admin\OrderController::class,
            'customer'=>admin\CustomerController::class,
        ]);
        
    });
    

/*
    End route admin
*/ 


/*
    Start route client
*/ 
    Route::get('/',[App\Http\Controllers\client\HomeController::class,'index'])->name('client.index');
    Route::get('/shop',[App\Http\Controllers\client\HomeController::class,'shop'])->name('client.shop');
    Route::get('/productDetail/{product_id}',[App\Http\Controllers\client\HomeController::class,'productDetail'])->name('client.productDetail');
    Route::get('/about',[App\Http\Controllers\client\HomeController::class,'about'])->name('client.about');
    Route::get('/contact',[App\Http\Controllers\client\HomeController::class,'contact'])->name('client.contact');
    Route::post('/contact',[App\Http\Controllers\client\HomeController::class,'post_contact'])->name('client.post_contact');
    
    // route user
    Route::get('/register',[App\Http\Controllers\client\Auth\RegisterController::class,'register'])->name('client.register');
    Route::post('/register',[App\Http\Controllers\client\Auth\RegisterController::class,'postRegister'])->name('client.Postregister');

    Route::get('/login',[App\Http\Controllers\client\Auth\loginController::class,'login'])->name('client.login');
    Route::post('/login',[App\Http\Controllers\client\Auth\loginController::class,'postLogin']);
    Route::get('/logout',[App\Http\Controllers\client\Auth\loginController::class,'logout'])->name('client.logout');

    Route::get('forget-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('client.forgotPassword');
    Route::post('forget-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('client.forget.password.post'); 
    Route::get('reset-password/{token}', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('client.reset.password.get');
    Route::post('reset-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('client.reset.password.post');


 //end
//cart
 Route::prefix('cart')->group(function () {
    Route::get('/', [App\Http\Controllers\client\CartController::class, 'view'])->name('cart.view');
    Route::get('add/{id}', [App\Http\Controllers\client\CartController::class, 'add'])->name('cart.add');
    Route::get('removelist/{id}', [App\Http\Controllers\client\CartController::class, 'remove']);
    Route::get('remove/{id}', [App\Http\Controllers\client\CartController::class, 'removelistcart'])->name('cart.remove');
    Route::get('update', [App\Http\Controllers\client\CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [App\Http\Controllers\client\CartController::class, 'clear'])->name('cart.clear');
    Route::get('checkout', [App\Http\Controllers\client\CartController::class, 'checkout'])->name('cart.checkout')->middleware('cus');
    Route::post('checkout', [App\Http\Controllers\client\CartController::class, 'PostCheckout'])->name('cart.postcheckout')->middleware('cus');
});

//end

//wishlist
Route::prefix('wishlist')->group(function () {
    Route::get('/', [App\Http\Controllers\client\WishlistController::class, 'view'])->name('wishlist.view');
    Route::get('add/{id}', [App\Http\Controllers\client\WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('removelist/{id}', [App\Http\Controllers\client\WishlistController::class, 'remove']);
    Route::get('remove/{id}', [App\Http\Controllers\client\WishlistController::class, 'removelistwishlist'])->name('wishlist.remove');
    Route::get('update', [App\Http\Controllers\client\WishlistController::class, 'update'])->name('wishlist.update');
    Route::get('clear', [App\Http\Controllers\client\WishlistController::class, 'clear'])->name('wishlist.clear');
    Route::get('checkout', [App\Http\Controllers\client\WishlistController::class, 'checkout'])->name('wishlist.checkout')->middleware('cus');
    Route::post('checkout', [App\Http\Controllers\client\WishlistController::class, 'PostCheckout'])->name('wishlist.postcheckout')->middleware('cus');
});

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
