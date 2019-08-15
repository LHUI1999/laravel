<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    // 设置模型表名
    public $table = 'orders';

    public function orderinfo(){
    	return $this->hasOne('App\Models\orderinfo','oid');
    }
}
