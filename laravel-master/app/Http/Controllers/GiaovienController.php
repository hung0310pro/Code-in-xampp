<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Modeltest;
use App\Http\Requests\FormtestRequest;

class GiaovienController extends BaseController{ 
	public function themgiaovien(FormtestRequest $request){ // class FormtestRequest
   
        // đoạn này thực hiện lấy giữ liệu từ form rồi insert vào bảng giao_vien
        // xong quay về route form/xemform
		$giaovien = new Modeltest();
		$giaovien->giao_vien = $request->giangvien;
		$giaovien->mon_hoc = $request->monhoc;
		$giaovien->sdt = $request->dienthoai; 
		$giaovien->save();
		return redirect('form/viewform');
	}

	
}