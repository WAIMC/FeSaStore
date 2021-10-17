<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function about(){
        return view('client.pages.about');
    }

    public function contact(){
        return view('client.pages.contact');
    }

    public function shop(){
        return view('client.products.shop');
    }

    public function wishlish(){
        return view('client.wishlish');
    }


    public function register(){
        return view('client.register');
    }

    public function signIn(){
        return view('client.signIn');
    }

    public function forgotPassword(){
        return view('client.forgotPassword');
    }

    public function product(){
        return view('client.products.products');
    }
    public function checkout(){
        return view('client.carts.checkout');
    }
    public function blog(){
        return view('client.blogs.blog');
    }
    public function blog_details(){
        return view('client.blogs.blog_details');
    }


}
