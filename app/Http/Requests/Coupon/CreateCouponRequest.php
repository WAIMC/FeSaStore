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
            'coupon_name'=>'required',
            'coupon_code'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'coupon_name.required' =>'Tên mã giảm giá không được để trống !',
            'coupon_code.required' =>'Mã không được để trống !',
            
        ];
    }
}