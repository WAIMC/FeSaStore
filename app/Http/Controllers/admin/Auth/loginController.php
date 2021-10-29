<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('adminAuth');
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required|string|max:255|email',
                'password' => 'required|string|min:8'
            ],
            [
                'email.required'=>'Do not input email blank',
                'email.email'=>'Input is not email',
                'password.min'=>'Password min 8 character'
            ]
        );
        if(
            Auth::guard('adminAuth')->attempt(['email' => request()->email, 'password' => request()->password], request()->has('remember'))
        ){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error','Đăng nhập thất bại, thử lại!');
    }

    public function logout(Request $request)
    {
        if(auth()->guard('adminAuth')->logout()){        
            Session::flush();
            Sessioin::put('success','Đăng Xuất thành công!');        
            return redirect(route('admin.login'));
        }
        return redirect()->back()->with('error', 'Đăng xuất thất bại!');
    }
}
