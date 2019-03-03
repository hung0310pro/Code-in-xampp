<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Auth;
use App\AuthenticationsModel;
use App\Http\Requests\DangkythanhvienRequest;
use App\Http\Requests\ThanhvienRequest;


class DangkythanhvienController extends Controller
{
	public function getRegistertv()
	{
		return view('formvalidate2.dangkythanhvien');
	}

	public function postRegistertv(Request $request)
	{
		$thanhvien = new AuthenticationsModel();
		$thanhvien->user = $request->txtuser;
		$thanhvien->password = $request->txtpass;
    	$thanhvien->level = $request->txtlevel;
    	$thanhvien->remember_token = $request->_token;
    	$thanhvien->save();
    	return redirect('authen1/login');
    }

	public function getLogintv()
	{
		return view('formvalidate2.loginthanhvien');
	}

	public function postLogintv(Request $Request)
	{
		//Auth::check() check xem có đang đănh nhập k?

		$username = $Request['txtuser'];
		$password1 = $Request['txtpass'];

		if (Auth::attempt(['name' => $username, 'password' => $password1])) { // check tài khoản
			echo "Đăng nhập thành công";
			$user = Auth::user();  // lấy đc user
			return view('viewdntc', compact('user'));
		} else {
			echo "Đăng nhập thất bại";
			//echo return view('viewdnthatbai',['error'=>'Đăng nhập thất bại']);
		}
	}

	public function logout()
	{
		Auth::logout(); // để logout
		return view('formvalidate2.loginthanhvien');
	}
}
