<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_color extends Model
{
    protected $table = 'car_color';
    protected $fillable = ['car_id','color_id'];
    protected $hidden = ['time'];
}
