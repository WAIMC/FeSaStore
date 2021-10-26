<?php

namespace App\Http\Requests\VariantProduct;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariantProductRequest extends FormRequest
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
            'variant_attribute'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'gallery'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'variant_attribute.required'=>'Thuộc tính không được bỏ trống!',
            'quantity.required'=>'Số lượng không được bỏ trống!',
            'price.required'=>'Giá sản phẩm không được bỏ trống!',
            'discount.required'=>'Giảm giá sản phẩm không được bỏ trống!',
            'gallery.required'=>'Danh sách ảnh không được bỏ trống!'
        ];
    }
}
