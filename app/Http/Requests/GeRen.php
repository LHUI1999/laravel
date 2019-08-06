<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeRen extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 自动验证
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
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/|unique:users',
   
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        ];
    }
    //验证提示
    public function messages(){
        return [
            'uname.unique'=>'用户名已存在',
            'uname.required'=>'用户名必填',    
            'uname.regex'=>'用户名格式错误',    
            
            'email.required'=>'邮箱必填',    
            'email.email'=>'邮箱格式错误',    
            'phone.required'=>'手机号必填',    
            'phone.regex'=>'手机号格式错误',    
        ];
    }
}
