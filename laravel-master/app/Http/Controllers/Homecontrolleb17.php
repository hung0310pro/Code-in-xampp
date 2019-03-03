<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Homecontrolleb17 extends BaseController{  //Homecontrolleb17 trùng như bên web.php
     function showfunction(){
     	return "Hello anh Hùng cái này là của controller bài 17";
     }

     function viewfunction(){  // bài 21
        return view('bai21hello'); // cái này để hiện ra view của b21hell.blade.php,như cái wellcome nhưu bên web.php
     }

     function checkfunction($tham_so){
     	return "Đây là tham số của bài 19 truyền vào ở bên trang web.php aihihi ".$tham_so;
     } //b19
}