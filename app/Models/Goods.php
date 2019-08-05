<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    public function goodspic(){
    	return $this->hasOne('App\Models\Goodspic','gid');
    }
    //  //获取用户头像
    // public function cates(){
    // 	return $this->hasOne('App\Models\Cates','id');
    // }
}
