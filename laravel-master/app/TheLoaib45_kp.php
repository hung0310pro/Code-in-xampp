<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class TheLoaib45_kp extends Model
{
    protected $table = "theloai";
    
    // 1 thể loại thì có nhiều loại tin(tên model,khóa phụ ở bảng loaitin,khóa chính ở bảng theloai)
    public function loaitin(){
    	return $this->hasMany('App\LoaiTinb45_kp','idTheLoai','id');
    }

     // 1 thể loại thì có nhiều loại tin, xong 1 loại tin thì có nhiều tin tức(tên model,khóa phụ ở bảng tintuc,khóa phụ ở bảng loaitin,khóa chính ở bảng theloai)
    public function tintuc(){
    	return $this->hasManyThrough('App\TinTucb45_kp','App\LoaiTinb45_kp','idLoaiTin','idTheLoai','id');
    }


     public function listuseromodeltheloai45(){
      $sql = DB::select("select * from theloai");
      return $sql;
    }
}
