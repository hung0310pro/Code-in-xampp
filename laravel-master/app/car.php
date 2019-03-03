<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    protected $table = 'car';
    protected $fillable = ['id','loaixe','hangxe'];
    protected $hidden = ['time'];

    function bang_color(){
    	return $this->hasMany('App\colorr');
    }

    function car_colormany(){
    	return $this->belongsToMany('App\color','car_color');
    }
}
