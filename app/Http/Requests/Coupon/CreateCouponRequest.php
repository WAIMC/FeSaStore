<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponRequest extends FormRequest
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
            'coupon_name'=>'required|unique:coupon',
            'coupon_code'=>'required|unique:coupon',
            'coupon_number'=>'required|numeric',
            'quantity_coupon'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'coupon_name.required' =>'Tên mã giảm giá không được để trống !',
            'coupon_name.unique' =>'Tên mã giảm giá đã tồn tại !',
            'coupon_code.required' =>'Mã không được để trống !',
            'coupon_code.unique' =>'Mã giảm giá đã tồn tại !',
            'coupon_number.required' =>'Số tiền hoặc số phần trăm không được để trống !',
            'coupon_number.numeric' =>'Số tiền hoặc số phần trăm phải là số !',
            'quantity_coupon.required' =>'Số lượng không được để trống !',
            'quantity_coupon.numeric' =>'Số lượng phải là số !',

            
        ];
    }
}