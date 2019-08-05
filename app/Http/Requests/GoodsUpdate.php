<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsUpdate extends FormRequest
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
            'price' => 'regex:/^[\d]{1,9}$/',
            'num' => 'regex:/^[\d]{1,9}$/',
            
        ];
    }
    //验证提示
    public function messages(){
        return [  
            'price.regex'=>'价格格式错误',      
            'num.regex'=>'数量格式错误',       
        ];
    }
}
