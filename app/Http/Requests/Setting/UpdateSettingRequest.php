<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'config_key'=>'required|unique:setting_link,config_key,'.request()->id,
            'config_value'=>'required',
           
        ];
    }
    public function messages()
    {
        return [
            'config_key.required' =>'Tên liên kết không được để trống !',
            'config_value.required' =>'Giá trị không được để trống !',
            'config_key.unique' =>'Tên liên kết đã tồn tại !',
            
        ];
    }
}
