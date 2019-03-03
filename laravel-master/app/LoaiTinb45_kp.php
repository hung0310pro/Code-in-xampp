<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTinb45_kp extends Model
{
    protected $table = "loaitin";

    // nhiều loại tin có 1 thể loại,(tên modul theloai,id phụ của theloai trong bảng loaitin,id chính bảng loaitin);
    public function theloai(){
    	return $this->belongsTo('App\TheLoaib45_kp','idTheLoai','id');
    }

    // 1 loại tin có nhiều tin tức cx như bảng thể loại
    public function tintuc(){
    	return $this->hasMany('App\TinTucb45_kp','idLoaiTin','id');
    }
}
