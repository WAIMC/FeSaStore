<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|max:13',
            'conscious' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'street' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không để Trống Tên',
            'email.required' => 'không Để Trống email',
            'email.email' => 'không Đúng Định Dạng Email',
            'password.required' => 'Không Để Trống Mật khẩu',
            'password.min' => 'Ít Nhất 8 Ký Tự',
            'password.confirmed' => 'Nhập Lại Mật Khẩu Không Đúng',
            'phone.required' => 'Không Để Trống Số Điện Thoại',
            'phone.max' => 'Không Quá 13 Số',
            'conscious.required' => 'Không Để Trống',
            'district.required' => 'Không Để Trống',
            'ward.required' => 'Không Để Trống',
            'street.required' => 'Không Để Trống',
        ];
    }
}
