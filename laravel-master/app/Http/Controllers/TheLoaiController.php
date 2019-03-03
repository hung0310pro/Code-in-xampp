<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\TheLoaib45_kp;
use App\LoaiTinb45_kp;
use App\Http\Requests;
use App\Http\Requests\ThemRequestb45_kp;
use App\Http\Requests\TheloaiSuab45Request;



class TheLoaiController extends Controller
{

    

    public function getdanhsach(){
    	$theloai = TheLoaib45_kp::all();
        $loaitin = LoaiTinb45_kp::all();
        /*$mang = [];
        foreach ($theloai as $value) {
            $theloaileftjoin = LoaiTinb45_kp::where('idTheLoai',$value["id"])->get()->toArray();
            $mang[] = $theloaileftjoin;
        }*/
        return view('laravel_demo.theloai.danhsach',compact('theloai','loaitin'));
    }

    public function getthem(){

    	return view('laravel_demo.theloai.them');
    	
    }

    public function postthem(ThemRequestb45_kp $request){
    	$theloai = new TheLoaib45_kp;
    	$theloai->Ten = $request['theloai'];
    	$theloai->TenKhongDau = $request['theloaikd'];
    	$theloai->save();
    	return redirect()->route('listtheloai')->with('thongbao','Thêm thành công');
    }

    public function getsua($id){
    	$suatheloai = TheLoaib45_kp::find($id);
    	return view('laravel_demo.theloai.sua',compact('suatheloai'));
    }

    public function postsua(TheloaiSuab45Request $request,$id){
    	$suatheloai = TheLoaib45_kp::find($id);
    	$suatheloai->Ten = $request['theloai'];
    	$suatheloai->TenKhongDau = $request['theloai'];
    	$suatheloai->save();
    	return redirect()->route('listtheloai')->with('thongbao2','Thêm thành công');
    }

    public function getxoa($id){
        $xoatheloai = TheLoaib45_kp::find($id);
        $xoatheloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao1','Bạn xóa thành công');
    }

    public function getloatintheoajax($id){
        $loaitinajax = LoaiTinb45_kp::where('idTheLoai',$id)->get()->toArray();
       /* foreach ($loaitinajax as $value) {
            echo "<option value='<?= $value->id ?>'><?= $value->Ten ?></option>";
        }*/
        echo json_encode($loaitinajax);
    }


    
}
