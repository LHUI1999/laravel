<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NodesStore extends FormRequest
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
            'desc' => 'required|unique:nodes',
            'cname' => 'required',
            'aname' => 'required',
            
        ];
    }
    //验证提示
    public function messages(){
        return [
            'desc.unique'=>'描述已存在',
            'desc.required'=>'描述必填',
            'cname.required'=>'控制器名必填',      
            'aname.required'=>'方法名必填',      
              
        ];
    }
}
