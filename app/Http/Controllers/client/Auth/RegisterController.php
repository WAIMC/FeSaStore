<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:adminAuth')->except('logout');
    }

    public function register(Request $request)
    {
        return view('dashboard.auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function postRegister(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string|max:255',
                'email'=>'required|string|max:255|email|unique:admin',
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ],
            [
                'name.required'=>'không để họ và tên trống!',
                'name.string'=>'Họ và tên khác chuỗi!',
                'name.max'=>'Họ và tên tối đa 255 kí tự',
                'email.required'=>'Không để email trống!',
                'email.email'=>'Nhập dữ liệu không phải email!',
                'email.unique'=>'Email đã tồn tại!',
                'password.min'=>'Mật khẩu ít nhất 8 kí tự',
                'password.confirmed'=>'Nhập lại mật khẩu sai!',
            ],
        );

        if(Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])){
            return redirect()->back()->with('success', 'Đăng ký thành công vui lòng đăng nhập!');
        }else{
            return redirect()->back()->with('error', "Đăng ký thất bại, thử lại!");
        }


    }
}
