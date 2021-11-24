<?php

namespace App\Http\Controllers\client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Contracts\UserInterface;
use App\Http\Requests\UserRequest\LoginRequest;
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

    public function postLogin(LoginRequest $request)
    {
        if(
            Auth::guard('cus')->attempt(['email' => request()->email, 'password' => request()->password], request()->has('remember'))
        ){
            return redirect()->route('client.index');
        }
        return redirect()->back()->with('error','Đăng nhập thất bại, thử lại!');
    }

    public function logout()
    {
        if(auth()->guard('cus')->logout()){        
            Session::flush();
            Sessioin::put('success','Đăng Xuất thành công!');        
            return redirect(route('client.login'));
        }
        return redirect()->back()->with('error', 'Đăng xuất thất bại!');
    }
}
