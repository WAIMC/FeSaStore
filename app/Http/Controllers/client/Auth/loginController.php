<?php

namespace App\Http\Controllers\client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Contracts\UserInterface;

class loginController extends Controller
{
    protected $users;
    public function __construct(UserInterface $users)
    {
        $this->users=$users;
    }

    public function login()
    {
        return view('client.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required|string|max:255|email',
                'password' => 'required|string|min:8'
            ],
            [
                'email.required'=>'Email không được để trống1',
                'email.email'=>'Email không đúng định dạng!',
                'password.min'=>'Mật khẩu phải nhiều hơn 8 ký tự!'
                ,
                'password.required'=>'Mật khẩu phải là kiều chuỗi!'
                ,
                'password.string'=>'Mật khẩu không được bỏ trống!'
            ]
        );
        if(
            Auth::guard('cus')->attempt(['email' => request()->email, 'password' => request()->password], request()->has('remember'))
        ){
            return redirect()->route('client.index');
        }
        return redirect()->back()->with('error','Đăng nhập thất bại, thử lại!');
    }

    public function logout(Request $request)
    {
        if(auth()->guard('cus')->logout()){        
            Session::flush();
            Sessioin::put('success','Đăng Xuất thành công!');        
            return redirect(route('client.login'));
        }
        return redirect()->back()->with('error', 'Đăng xuất thất bại!');
    }
}
