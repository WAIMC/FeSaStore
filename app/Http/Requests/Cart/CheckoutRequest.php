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
            'xa'=>'required',
            'huyen'=>'required',
            'tinh'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Họ không được để trống !',
            'name.string' =>'Họ phải là chuỗi !',
            'xa.required' =>'Xã không được để trống !',
            'huyen.required' =>'Huyện không được để trống !',
            'tinh.required' =>'Tỉnh không được để trống !',
            'phone.required' =>'Điện thoại không được để trống !',
            'email.required' =>'Email không được để trống !',
            'email.email' =>'Email không đúng định dạng !',
        ];
    }
}
