<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'required|string|max:35',
            'email'=>'required|string|max:255|email|unique:customer',
            'password' => ['required', 'string', 'min:8'],
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pwd_confirm' => ['same:password'],
            'tinh'=>'required',
            'huyen'=>'required',
            'xa'=>'required',
            'thon'=>'required',
        ];
    }

    public function messages()
    {
        return [
             
                'name.required'=>'Không để họ và tên trống!',
                'tinh.required'=>'Vui lòng chọn tỉnh!',
                'huyen.required'=>'Vui lòng chọn huyện!',
                'xa.required'=>'Vui lòng chọn xã/phường!',
                'thon.required'=>'Vui lòng nhập địa chỉ của bạn!',
                'name.string'=>'Họ và tên khác chuỗi!',
                'name.max'=>'Họ và tên tối đa 35 kí tự',
                'email.required'=>'Không để email trống!',
                'email.email'=>'Nhập dữ liệu không phải email!',
                'email.unique'=>'Email đã tồn tại!',
                'password.required'=>'Mật khẩu không được bỏ trống!',
                'password.min'=>'Mật khẩu ít nhất 8 kí tự',
                'pwd_confirm.same'=>'Nhập lại mật khẩu sai!',
                'phone.required'=>'Số điện thoại không được  trống!',
                'phone.regex'=>'Số điện thoại không đúng cú pháp!',
                'phone.min'=>'Số điện thoại phải là 10 số!',
        ];
    }
}
