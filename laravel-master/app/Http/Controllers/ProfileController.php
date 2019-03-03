<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController{ //b22
	public function showprofile($name){
          return view("b22")->with('name',$name);// cai nay la bien truyen vao ma
	}
}