<?php
/**
 * Created by PhpStorm.
 * User: Le Hung
 * Date: 7/7/2018
 * Time: 11:18
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
class CheckController extends BaseController
{
     public function hamcheck($name){
           return view('check')->with('name',$name); // truyền biến sang trang view check-blade.php
     }
}