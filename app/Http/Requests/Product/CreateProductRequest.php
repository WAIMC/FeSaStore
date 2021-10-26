<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'status'=>'required',
            'variant'=>'required',
            'name_att'=>'required',
            'attri'=>'required',
            'variant_attribute'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'gallery'=>'required',
            'quantity'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Tên sản phẩm không được để trống !',
            'short_description.required'=>'Mô tả ngắn không được bỏ trống!',
            'image.required'=>'Ảnh đại diện không được bỏ trống!',
            'description.required'=>'Mô tả không được bỏ trống!',
            'status.required'=>'Trạng thái không được bỏ trống!',
            'variant.required'=>'Tên thuộc tính không được bỏ trống!',
            'name_att.required'=>'Tên Thuộc tính không được bỏ trống!',
            'attri.required'=>'Thuộc tính không được bỏ trống!',
            'variant_attribute.required'=>'Thuộc tính không được bỏ trống!',
            'price.required'=>'Giá sản phẩm không được bỏ trống!',
            'discount.required'=>'Giảm giá sản phẩm không được bỏ trống!',
            'gallery.required'=>'Danh sách ảnh không được bỏ trống!',
            'quantity.required'=>'Số lượng không được bỏ trống!',
            
        ];
    }
}
