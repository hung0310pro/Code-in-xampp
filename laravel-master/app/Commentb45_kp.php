<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentb45_kp extends Model
{
    protected $table = "comment";

    public function tintuc(){
    	return $this->hasMany('App\TinTucb45_kp','idTinTuc','id');
    }

    public function users(){
    	return $this->hasMany('App\usersb45_kp','idUser','id');
    }
}
