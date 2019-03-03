<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class DangkyModel extends Model
{
    protected $table = 'user';
    protected $fillable = ['id','fullname','password'];
    protected $hidden = ['passwordlai','updated_at','created_at'];

     public function listuser(){
    	$sql = DB::select("select * from user");
    	return $sql;
    }

    public function lay1dong($id){ //ListuserController
    	$fullname = DB::select("select * from user where Id = ".$id);
    	return $fullname;
    }

}
