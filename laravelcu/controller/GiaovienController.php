<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Modeltest;
use Validator;

class GiaovienController extends BaseController{ 
	public function themgiaovien(Request $request){
        $validate = Validator::make($request->all(),
        	[
        		'monhoc' => 'required|unique:giao_vien,mon_hoc', // không trùng dữ liệu trong cột môn học
        		'giangvien' => 'required|unique:giao_vien,giao_vien',
        		'dienthoai' => 'required|numeric',
        	],
        	[
        		'monhoc.required' => 'Vui lòng điền tên môn học',
        		'giangvien.required' => 'Vui lòng điền tên giáo viên',
        		'dienthoai.required' => 'Vui lòng điền số điện thoại',
        		'monhoc.unique' => 'Tên môn học đã bị trùng',
        		'giangvien.unique' => 'Tên giảng viên đã bị trùng',
        		'dienthoai.numeric' => 'Sai hình thức nhập',	
        	]
        );
        if($validate->fails()){
        	return redirect()->back()->withErrors($validate->errors());
        }

		$giaovien = new Modeltest();
		$giaovien->giao_vien = $request->giangvien;
		$giaovien->mon_hoc = $request->monhoc;
		$giaovien->sdt = $request->dienthoai; 
		$giaovien->save();
		return redirect('form/xemform');
	}
}