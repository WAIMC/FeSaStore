<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required|string',
            'address'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Họ không được để trống !',
            'name.string' =>'Họ phải là chuỗi !',
            'address.required' =>'Địa chỉ không được để trống !',
            'phone.required' =>'Điện thoại không được để trống !',
            'email.required' =>'Email không được để trống !',
            'email.email' =>'Email không đúng định dạng !',
        ];
    }
}
