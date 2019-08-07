<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	//设置模型表明
    public $table = 'goods';
    //
    public function goodspic(){
    	return $this->hasOne('App\Models\goodspic','gid');
    }
   
}
