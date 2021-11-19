<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name'=>'required|string|max:30|unique:role'
        ];
    }

    /**
     * Get the message rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' =>'Tên vai trò không được để trống !',
            'name.string' =>'Tên vai trò là một chuôi !',
            'name.max' =>'Tên vai trò tối đa 30 kí tự !',
            'name.unique' =>'Tên vai trò đã tồn tại. thử tên khác !',
            
        ];
    }

}
