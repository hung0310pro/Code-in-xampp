<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruyenbienController extends Controller
{
    public function showfunction($bientruyen){
    	return $bientruyen;
    }
}
