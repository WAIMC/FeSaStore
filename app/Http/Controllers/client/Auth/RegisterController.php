<?php

namespace App\Http\Controllers\client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Contracts\UserInterface;
class RegisterController extends Controller
{
    protected $users;
    public function __construct(UserInterface $users)
    {
        $this->users=$users;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest:adminAuth')->except('logout');
    // }

    public function register(Request $request)
    {
        return view('client.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function postRegister(Request $request)
    {
       
        $request->validate(
            [
                'name'=>'required|string|max:35',
                'email'=>'required|string|max:255|email|unique:customer',
                'password' => ['required', 'string', 'min:8'],
                'pwd_confirm' => ['same:password'],
            ],
            [
                
                'name.required'=>'không để họ và tên trống!',
                'name.string'=>'Họ và tên khác chuỗi!',
                'name.max'=>'Họ và tên tối đa 35 kí tự',
                'email.required'=>'Không để email trống!',
                'email.email'=>'Nhập dữ liệu không phải email!',
                'email.unique'=>'Email đã tồn tại!',
                'password.required'=>'Mật khẩu không được bỏ trống!',
                'password.min'=>'Mật khẩu ít nhất 8 kí tự',
                'pwd_confirm.same'=>'Nhập lại mật khẩu sai!',
            ],
        );
        if($this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ])){
            return redirect()->back()->with('success', 'Đăng ký thành công vui lòng đăng nhập!');
        }else{
         
            return redirect()->back()->with('error', "Đăng ký thất bại, thử lại!");

        }


    }
}
