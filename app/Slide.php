<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $table = "slides";
	
	protected $fillable = ['name','avatar','content','link'];

	public function del($id){
		return Slide::find($id)->delete();
	}
	public static function updateData($id, $data){
        $slide = Slide::find($id);
        $slide->update($data);

        return true;
    }
}
