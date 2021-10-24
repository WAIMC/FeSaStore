<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
            'name'=>'required|unique:brand,name',
            'image'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên thương hiệu không được để trống !',
            'image.required' =>'Hình ảnh  không được để trống !',
            'name.unique' =>'Tên thương hiệu đã tồn tại !',
            
        ];
    }
}
