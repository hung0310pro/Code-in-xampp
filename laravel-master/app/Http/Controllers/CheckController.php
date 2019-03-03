<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
class CheckController extends BaseController
{
     public function hamcheck($name){
           return view('check')->with('name',$name); // truyền biến sang trang view check-blade.php
     }

     public function setcookie(){ // hàm này có tác dụng khỏi tạo cookie
     	$responsive = new Response();
     	$responsive->withCookie('tencookie','Giá trị của cookie',0.1); // cái cuối là thời gian sống
     	return $responsive;
     }

     public function getcookie($ok){
     	return $ok->cookie('tencookie');
     }
}