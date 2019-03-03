<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colorr extends Model
{
	protected $table = 'colorr';
    protected $fillable = ['id','id_car','mau'];
    protected $hidden = ['time'];

    public function bang_car(){
    	return $this->belongsTo('App\car');
    }
}
