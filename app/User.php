<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','level','conmment_id','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Comment(){
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function del($id){
        return User::find($id)->delete();
    }
    public static function updateData($id, $data){
        $user = User::find($id);
        $user->update($data);

        return true;
    }
}
