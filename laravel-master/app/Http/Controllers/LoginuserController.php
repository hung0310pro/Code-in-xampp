<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\DangkyModel;
use App\Http\Requests\LoginRequest;


class LoginuserController extends Controller
{
	public function getlogin()
	{
		return view('aucation.login');
	}

	public function postlogin(LoginRequest $chiso)
	{
		$fullname = $chiso['fullname'];
		$password1 = $chiso['password1'];
		$login = DangkyModel::whereRaw('fullname = ? and password = ?', [$fullname, $password1])->get()->toArray();
		if (isset($login) && !empty($login)) {
			Session()->put('logindn', $fullname);
			return redirect()->route('listuser')->with('dangnhap', 'Đăng nhập thành công');
		} else {
			return redirect()->back()->with('dangnhaptach', 'Đăng nhập thất bại');
		}
	}
}
