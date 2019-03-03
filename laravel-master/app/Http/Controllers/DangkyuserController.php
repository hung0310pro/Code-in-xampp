<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DangkyModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Hash;
use Illuminate\Routing\Controller as BaseController;

class DangkyuserController extends Controller
{
    public function getregister(){
        return view('aucation.register');
    }

    public function postregister(Request $chiso){
        $dangky = new DangkyModel();
        $dangky->fullname = $chiso['fullname'];
        $dangky->email = $chiso['email'];
        $dangky->password = Hash::make($chiso['password1']);
        $dangky->passwordlai = Hash::make($chiso['retype_password']);
        $dangky->save();
        return redirect()->route('tranglogin')->with('thongbao','Thêm thành công');
    }
}
