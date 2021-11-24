<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'email'=>'required|string|max:255|email',
            'password' => 'required|string|min:8'
        ];
    }
    public function messages()
    {
        return  [
            'email.required'=>'Email không được để trống1',
            'email.email'=>'Email không đúng định dạng!',
            'password.min'=>'Mật khẩu phải nhiều hơn 8 ký tự!' ,
            'password.required'=>'Mật khẩu phải là kiều chuỗi!',
            'password.string'=>'Mật khẩu không được bỏ trống!'
        ];
    }
}
