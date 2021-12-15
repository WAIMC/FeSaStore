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
    // login admin
    Route::get('/Admin/Dang-Nhap',[App\Http\Controllers\admin\Auth\loginController::class,'login'])->name('admin.login');
    Route::post('/Admin/Dang-Nhap',[App\Http\Controllers\admin\Auth\loginController::class,'postLogin'])->name('admin.login');

    // register admin
    Route::get('/Admin/Dang-Ky',[App\Http\Controllers\admin\Auth\RegisterController::class,'register'])->name('admin.register');
    Route::post('Admin/Dang-Ky',[App\Http\Controllers\admin\Auth\RegisterController::class,'postRegister'])->name('admin.register');

    // forgot and reset password
    Route::get('/Admin/Cai-Lai-Mat-Khau', [App\Http\Controllers\admin\Auth\ForgotPasswordController::class,'showForm'])->name('admin.password_reset');
    Route::post('/Admin/Cai-Lai-Mat-Khau', [App\Http\Controllers\admin\Auth\ForgotPasswordController::class,'sendPasswordResetToken'])->name('admin.password_reset');
    Route::get('/Admin/Cai-Lai-Mat-Khau/{token}', [App\Http\Controllers\admin\Auth\ForgotPasswordController::class,'showPasswordResetForm'])->name('admin.get_token');
    Route::post('/Admin/Cai-Lai-Mat-Khau/{token}', [App\Http\Controllers\admin\Auth\ForgotPasswordController::class,'resetPassword'])->name('admin.get_token');

    // manager admin
    Route::prefix('admin')->middleware('adminAuth')->group(function(){

        Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.index');
        Route::post('/Bieu-Đo-Doanh-Thu',[App\Http\Controllers\admin\AdminController::class, 'filter_chart_by_date'])->name('admin.filter_chart_by_date');
        Route::get('/Quan-Ly-Anh',[App\Http\Controllers\admin\AdminController::class,'file'])->name('admin.file');
        Route::post('/Admin/Dang-Xuat',[App\Http\Controllers\admin\Auth\loginController::class,'logout'])->name('admin.logout');

        Route::resources([
            'settingLink'=>admin\SettingLinkController::class,
            'category'=>admin\CategoryController::class,
            'product'=>admin\ProductController::class,
            'banner'=>admin\BannerController::class,
            'variantProduct'=>admin\VariantProductController::class,
            'brand'=>admin\BrandController::class,
            'slider'=>admin\SliderController::class,
            'blog'=>admin\BlogController::class,
            'categoryblog'=>admin\CategoryBlogController::class,
            'role'=>admin\RoleController::class,
            'decentralize'=>admin\DecentralizeController::class,
            'comment'=>admin\CommentController::class,
            'commentblog'=>admin\CommentBlogController::class,
            'order'=>admin\OrderController::class,
            'customer'=>admin\CustomerController::class,
            'rating'=>admin\RatingController::class,
            'coupon'=>admin\CouponController::class,
        ]);

    });
    

/*
    End route admin
*/ 


/*
    Start route client
*/ 
    Route::get('/',[App\Http\Controllers\client\HomeController::class,'index'])->name('client.index');
    Route::get('/Cua-Hang',[App\Http\Controllers\client\HomeController::class,'shop'])->name('client.shop');
    Route::get('/productDetail/{slug}',[App\Http\Controllers\client\HomeController::class,'productDetail'])->name('client.productDetail');
    Route::post('/productDetail/{slug}',[App\Http\Controllers\client\HomeController::class,'post_comment_product'])->name('client.productDetail');
    Route::get('/productDetail/rating/{slug}',[App\Http\Controllers\client\HomeController::class,'post_rating'])->name('client.rating');
    Route::get('/Gioi-Thieu',[App\Http\Controllers\client\HomeController::class,'about'])->name('client.about');
    Route::get('/Lien-He',[App\Http\Controllers\client\HomeController::class,'contact'])->name('client.contact');
    Route::post('/Lien-He',[App\Http\Controllers\client\HomeController::class,'post_contact'])->name('client.post_contact');
    
    // route user
    Route::get('/register',[App\Http\Controllers\client\Auth\RegisterController::class,'register'])->name('client.register');
    Route::post('/register',[App\Http\Controllers\client\Auth\RegisterController::class,'postRegister'])->name('client.Postregister');

    Route::get('/login',[App\Http\Controllers\client\Auth\loginController::class,'login'])->name('client.login');
    Route::post('/login',[App\Http\Controllers\client\Auth\loginController::class,'postLogin']);
    Route::get('/logout',[App\Http\Controllers\client\Auth\loginController::class,'logout'])->name('client.logout');

    Route::get('/login/google',[App\Http\Controllers\client\Auth\loginController::class,'googleRedirect'])->name('client.ggRedirect');
    Route::get('/google/return',[App\Http\Controllers\client\Auth\loginController::class,'googleCallback'])->name('client.ggCallback');
 
    Route::get('/login/facebook',[App\Http\Controllers\client\Auth\loginController::class,'facebookRedirect'])->name('client.fbRedirect');
    Route::get('/facebook/return',[App\Http\Controllers\client\Auth\loginController::class,'facebookCallback'])->name('client.fbCallback');


    Route::get('forget-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('client.forgotPassword');
    Route::post('forget-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('client.forget.password.post'); 
    Route::get('reset-password/{token}', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('client.reset.password.get');
    Route::post('reset-password', [App\Http\Controllers\client\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('client.reset.password.post');

    Route::group(['prefix' => 'account', 'middleware' => 'cus'],function () {
    Route::get('/',[App\Http\Controllers\client\AccountController::class,'index'] )->name('client.account.index');
    Route::get('/history',[App\Http\Controllers\client\AccountController::class,'showOrder'] )->name('client.account.order');
    Route::get('/address',[App\Http\Controllers\client\AccountController::class,'Address'] )->name('client.account.address');
    Route::post('/address/{user_id}',[App\Http\Controllers\client\AccountController::class,'updateAddress'] );

    Route::get('/change-pass',[App\Http\Controllers\client\AccountController::class,'showChangePass'] )->name('client.account.changepass');
    Route::post('/change-pass',[App\Http\Controllers\client\AccountController::class,'ChangePass'] );
    Route::get('reset-password/{token}',[App\Http\Controllers\client\AccountController::class, 'showResetPasswordForm'])->name('client.account.changepass.get');
    Route::post('reset-password',[App\Http\Controllers\client\AccountController::class, 'submitResetPasswordForm'])->name('client.account.changepass.post');


    Route::get('/order/view/{id}',[App\Http\Controllers\client\AccountController::class,'showOrderDetail'] )->name('client.account.orderDetail');
    Route::get('/order/{id}',[App\Http\Controllers\client\AccountController::class,'updateOrder'] )->name('client.account.updateOrder');
});

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
    Route::post('payment/online', [App\Http\Controllers\client\CartController::class, 'PostCheckoutOnline'])->name('cart.postcheckoutonline')->middleware('cus');
    Route::get('vnpay/return', [App\Http\Controllers\client\CartController::class, 'vnpayReturn'])->name('cart.vnpayReturn');

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



   
    Route::get('/blog',[App\Http\Controllers\client\HomeController::class,'blog'])->name('client.blog');
    Route::get('/blog-details/{slug}',[App\Http\Controllers\client\HomeController::class,'blog_details'])->name('client.blog_details');
    Route::post('/blog-details/{slug}',[App\Http\Controllers\client\HomeController::class,'post_comment_blog'])->name('client.blog_details');
    Route::get('/blog/category/{slug}',[App\Http\Controllers\client\HomeController::class,'categoryblog'])->name('client.cateblog');
/*
    End route client
*/ 

// Auth::routes();

// Route::get('/home', ['as' => 'login', App\Http\Controllers\HomeController::class, 'index'])->name('home');