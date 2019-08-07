<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //
    //设置模型表明
    public $table = 'cates';

     //获取用户头像
    public function goods(){
    	return $this->hasOne('App\Models\Goods','cid');
    }
}
