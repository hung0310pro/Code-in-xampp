<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\car;

class TruyvanController extends Controller
{
    public function laydulieu(){
    	$truyvan1 = car::leftjoin('colorr','colorr.car_id','=','car.id')->take();
    	print_r($truyvan1);
    }
}
