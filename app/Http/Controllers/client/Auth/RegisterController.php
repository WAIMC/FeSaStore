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
                'first_name'=>'required|string|max:10',
                'last_name'=>'required|string|max:10',
                'email'=>'required|string|max:255|email|unique:customer',
                'password' => ['required', 'string', 'min:8'],
                'pwd_confirm' => ['same:password'],
            ],
            [
                'first_name.required'=>'không để họ và tên trống!',
                'first_name.string'=>'Họ và tên khác chuỗi!',
                'first_name.max'=>'Họ và tên tối đa 10 kí tự',
                'last_name.required'=>'không để họ và tên trống!',
                'last_name.string'=>'Họ và tên khác chuỗi!',
                'last_name.max'=>'Họ và tên tối đa 10 kí tự',
                'email.required'=>'Không để email trống!',
                'email.email'=>'Nhập dữ liệu không phải email!',
                'email.unique'=>'Email đã tồn tại!',
                'password.required'=>'Mật khẩu không được bỏ trống!',
                'password.min'=>'Mật khẩu ít nhất 8 kí tự',
                'pwd_confirm.same'=>'Nhập lại mật khẩu sai!',
            ],
        );
        if($this->users->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
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
