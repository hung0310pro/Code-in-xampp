<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class usersb45_kp extends Model
{
	protected $table = "users";

	public function comment(){
    	return $this->hasMany('App\Commentb45_kp','idUser','id');
    }

   
}

