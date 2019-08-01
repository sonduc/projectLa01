<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function Post(){
    	return $this->belongsTo('App\Post','post_id','id');
    }
    public function User(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
