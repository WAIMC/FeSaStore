<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('adminAuth');
    // }

    public function index()
    {
        return view('dashboard.index');
    }
    public function file(){
        return view('dashboard.filemanager.index');
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }
}
