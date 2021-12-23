<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'title'=>'required|unique:banner,title,'.request()->id,
            'image'=>'required',
            'link'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Tên hình ảnh không được để trống !',
            'image.required' =>'Hình ảnh  không được để trống !',
            'link.required' =>'Liên kết không được để trống !',
            'name.unique' =>'Tên hình ảnh đã tồn tại !',
            
        ];
    }
}
