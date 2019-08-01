<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title','thumbnail','summary','content','image','important','amount','kind_id'];

    public function Kind(){
    	return $this->belongsTo('App\Kind','kind_id','id');
    }

    public function Comment(){
    	return $this->hasMany('App\Comment','post_id','id');
    }

    public static function storeData($data){
    	$post = Post::create($data);
        
        return $post;
    }
    
    public function del($id){
        return Post::find($id)->delete();
    }
    public static function updateData($id, $data){
        $post = Post::find($id);
        $post->update($data);

        return true;
    }
}
