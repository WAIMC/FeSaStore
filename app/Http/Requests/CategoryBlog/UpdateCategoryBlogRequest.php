<?php

namespace App\Http\Requests\CategoryBlog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:category_blog,name,'.request()->id,
            'description'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên  không được để trống !',
            'description.required' =>'Mô tả không được để trống !',
            'name.unique' =>'Tên  đã tồn tại !',
        ];
    }
}
