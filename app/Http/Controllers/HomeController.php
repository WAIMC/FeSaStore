<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('site.home');
    }

    public function about(){
        return view('site.about');
    }

    public function contact(){
        return view('site.contact');
    }

    public function shop(){
        return view('site.shop');
    }

    public function wishlish(){
        return view('site.wishlish');
    }
======= vinh_layout

    public function register(){
        return view('site.register');
    }

    public function signIn(){
        return view('site.signIn');
    }

    public function forgotPassword(){
        return view('site.forgotPassword');
    }
=======
    public function product(){
        return view('site.products');
    }
    public function checkout(){
        return view('site.checkout');
    }
    public function blog(){
        return view('site.blog');
    }
    public function blog_details(){
        return view('site.blog_details');
    }

======= dev
}
