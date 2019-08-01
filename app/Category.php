<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['title','thumbnail'];

    public function Kind(){
    	return $this->hasMany('App\Kind','category_id','id');
    }
    
    public function Post(){
    	return $this->hasManyThrough('App\Post','App\Kind','category_id','kind_id','id');
    }

    public static function storeData($data){
    	$category = Category::create($data);
        
        return $category;
    }
    public function del($id){
        return Category::find($id)->delete();
    }
    public static function updateData($id, $data){
        $category = Category::find($id);
        $category->update($data);

        return true;
    }
}
