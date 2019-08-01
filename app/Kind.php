<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $table = "kinds";
    protected $fillable = ['category_id','title','thumbnail'];

    public function Category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }

    public function Post(){
    	return $this->hasMany('App\Post','kind_id','id');
    }
    public static function storeData($data){
    	$kind = Kind::create($data);
        
        return $kind;
    }
    public function del($id){
        return Kind::find($id)->delete();
    }
    public static function updateData($id, $data){
        $kind = Kind::find($id);
        $kind->update($data);

        return true;
    }
}
