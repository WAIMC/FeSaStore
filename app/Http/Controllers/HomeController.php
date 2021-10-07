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
}
