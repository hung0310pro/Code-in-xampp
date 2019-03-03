<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTucb45_kp extends Model
{
    protected $table = "tintuc";
    
    // xem model loaitin và model theloai
    public function loaitin(){
    	return $this->belongsTo('App\LoaiTinb45_kp','idLoaiTin','id');
    }

    public function comment(){
    	return $this->hasMany('App\Commentb45_kp','idTinTuc','id');
    }
}
