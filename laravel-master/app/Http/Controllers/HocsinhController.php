<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocsinhModel;
class HocsinhController extends Controller
{
    

    public function index(){
    	$list_hocsinh = HocsinhModel::all();
        $buidmang = array();
        foreach ($list_hocsinh as $value){
            $buidmang[] = $value;
        }
    	return view('restful.list',compact('buidmang')); // trang list

        // if(isset($_GET['xem'])){
       
        //     $id = $_POST['hocsinh'];
        //     echo $id;
        //     // $thongtin = HocsinhModel::find($id);
        //     // echo json_encode($thongtin);
        // }
    }

    
    public function create(){
    	return view('restful.add'); // trang add
    }

    

    public function store(Request $request){ // thực hiện add
    	$hocsinh = new HocsinhModel;
    	$hocsinh->hoten = $request->txtHoTen;
    	$hocsinh->toan = $request->txtToan;
    	$hocsinh->ly = $request->txtLy;
    	$hocsinh->hoa = $request->txtHoa;
    	$hocsinh->save();
    	return redirect()->route('hocsinh');
    }

    public function show($id){ // xem dữ liệu vs id = $id
    	echo "Đây là tên phần có địa chỉ là ".$id;
    }


    public function edit($id){
    	$data = HocsinhModel::find($id);
    	return view('restful.edit',compact('data')); // tìm các dữ liệu của dòng cần sửa	
    }

    public function update($id){  // thực hiện chỉnh sửa
    	$hocsinh = HocsinhModel::find($id);
    	$hocsinh->hoten = $request->txtHoTen;
    	$hocsinh->toan = $request->txtToan;
    	$hocsinh->ly = $request->txtLy;
    	$hocsinh->hoa = $request->txtHoa;
    	$hocsinh->save();
    	return redirect()->route('hocsinh');
    }

    public function destroy($id){
    	$hocsinh = HocsinhModel::find($id);
    	$hocsinh->delete();
    	return redirect()->route('hocsinh');
    }
}
