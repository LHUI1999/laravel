<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //
     //获取用户头像
    public function goods(){
    	return $this->hasOne('App\Models\Goods','cid');
    }
}
