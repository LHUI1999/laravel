<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsStore extends FormRequest
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
            'title' => 'required|',
            'price' => 'required|regex:/^[\w]{1,9}[\.][\w]{1,9}$/',
            'num' => 'required|regex:/^[\d]{1,9}$/'
            
        ];
    }
    //验证提示
    public function messages(){
        return [
                
            'title.required'=>'标题必填',    
            'price.regex'=>'价格错误',    
            'price.required'=>'价格格式必填',    
            'num.regex'=>'数量格式错误',    
            'num.required'=>'数量必填',     
        ];
    }
}
