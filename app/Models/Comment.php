<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $table = 'comment';

    public function commentpic(){
    	return $this->hasOne('App\Models\commentpic','cmid');
    }
    
}
