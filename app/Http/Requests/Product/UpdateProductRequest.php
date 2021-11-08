<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'required',
            'short_description'=>'required',
            'image'=>'required',
            'description'=>'required',
            'variant'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Tên sản phẩm không được để trống !',
            'short_description.required'=>'Mô tả ngắn không được bỏ trống!',
            'image.required'=>'Ảnh đại diện không được bỏ trống!',
            'description.required'=>'Mô tả không được bỏ trống!',
            'variant.required'=>'Tên thuộc tính không được bỏ trống!'
        ];
    }
}
