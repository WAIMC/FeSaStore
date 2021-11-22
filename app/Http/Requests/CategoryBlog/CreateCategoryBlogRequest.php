<?php

namespace App\Http\Requests\CategoryBlog;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryBlogRequest extends FormRequest
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
            'name'=>'required|unique:category_blog,name',
            'description'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên không được để trống !',
            'description.required' =>'Mô tả không được để trống !',
            'name.unique' =>'Tên đã tồn tại !',
            
        ];
    }
}
