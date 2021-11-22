<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
            'title'=>'required|unique:blog,title',
            'description'=>'required',
         
        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Tiêu đề không được để trống !',
            'description.required' =>'Mô tả không được để trống !',
            'title.unique' =>'Tiêu đề đã tồn tại !',
            
        ];
    }
}
