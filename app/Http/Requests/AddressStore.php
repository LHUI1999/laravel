<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStore extends FormRequest
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
            //验证规则
            // 'uname' => 'required',
            'phone' => 'regex:/^1{1}[3-9]{1}[\d]{9}$/',
            // 'addr' => 'required',
            
        ];
    }
    //验证提示
    public function messages(){
        return [
            // 'uname.required'=>'用户名必填',
            // 'phone.required'=>'手机号必填',    
            'phone.regex'=>'手机号格式错误',
            // 'addr.required'=>'地址必填',
        ];
    }
}
