<?php

namespace App\Http\Controllers\client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Contracts\UserInterface;
use App\Http\Requests\UserRequest\RegisterRequest;
use App\Http\Requests\UserRequest\LoginRequest;
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

    public function register()
    {
        return view('client.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function postRegister(RegisterRequest $request)
    {
     
      $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->thon.",".$request->xa.",".$request->huyen.",".$request->tinh,
            'password' => Hash::make($request->password),
      ]);
      return redirect()->route('client.login')->with('success','Đăng ký thành công!');

    }
}
