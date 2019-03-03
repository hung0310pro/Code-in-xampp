<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $table = 'color';
    protected $fillable = ['id','mau'];
    protected $hidden = ['time'];

    function color_carmany(){
    	return $this->belongsToMany('App\car','car_color');
    }
}
