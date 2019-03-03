<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\DangkyModel;
use App\TheLoaib45_kp;
use App\Tickets;

class ListuserController extends Controller
{

	public function listuseromodeltheloai45()
	{
		$theloai = new TheLoaib45_kp;
		$listtheloai = $theloai->listuseromodeltheloai45(); // test xem 1 controller dùng 2 model đc k
		return view('aucation.checkcontrollervs2model', compact('listtheloai'));
	}

	public function hamlistuser()
	{
		if (session('logindn')) {
			$usermodel = new DangkyModel;
			$listuser1 = $usermodel->listuser(); // hàm listuser
			$listuser = [];
			foreach ($listuser1 as $value) {
				$listuser2 = json_encode($value);
				$listuser[] = json_decode($listuser2, true);
			}
			return view('aucation.danhsachuser', compact('listuser'));
		} else {
			return view('aucation.login');
		}
	}

	function getthemuser()
	{
		return view('aucation.themuser');
	}

	public function postthemuser(Request $chiso)
	{
		$themuser = new DangkyModel;
		$themuser->fullname = $chiso['fullname'];
		$themuser->email = $chiso['email'];
		$themuser->password = $chiso['Password'];
		$themuser->passwordlai = $chiso['re_password'];
		$themuser->save();
		return redirect()->route('listuser')->with('themuser', 'Thêm thành công');
	}

	public function getsuauser($id)
	{
		$suauser = DangkyModel::find($id);
		return view('aucation.suauseraaa', compact('suauser'));
	}

	public function postsuauser(Request $chiso, $id)
	{
		$updateuser = DangkyModel::find($id);
		$updateuser->fullname = $chiso['fullname'];
		$updateuser->email = $chiso['email'];
		$updateuser->save();
		return redirect()->route('listuser')->with('thongbaoupdate', 'Bạn đã chỉnh sửa thành công');
	}

	public function xoauser($id)
	{
		$xoauser = DangkyModel::find($id);
		$xoauser->delete();
		return redirect()->route('listuser')->with('xoauser', 'Bạn đã xóa xong');
	}

	public function hamlogoutlogin()
	{
		session()->forget('logindn');
		return redirect()->route('tranglogin');
	}

	public function postchonuser1(Request $chiso)
	{
		$cities = DangkyModel::where('id', $chiso->user)->get();
		echo json_encode($cities);
	}

	public function postthemdulieumoi(Request $chiso)
	{
		$themdulieuajax = new DangkyModel;
		$themdulieuajax->fullname = $chiso['fullnameajax'];
		$themdulieuajax->email = $chiso['emailajax'];
		$themdulieuajax->password = $chiso['password'];
		$themdulieuajax->passwordlai = $chiso['re_password'];
		$themdulieuajax->save();
		echo 1;
	}

	public function getfilechayajax()
	{
		$listuser = DangkyModel::all();
		return view('aucation.filechayajax', compact('listuser'));
	}


	public function postfilechayajax()
	{
		$dulieu = $_POST['mang'];
		$mang = [];
		if (isset($dulieu) && !empty($dulieu)) {
			foreach ($dulieu as $value) {
				$laydulieuajax = DangkyModel::where('id', $value)->get()->toArray();
				$mang[] = $laydulieuajax;
			}
		}
		echo '<table id="example2" class="table table-bordered table-striped table-hover text-center" >';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Id</th>';
		echo '<th>Fullname</th>';
		echo '<th>Email</th>';
		echo '<th>Xóa</td>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$a = -1;
		foreach ($mang as $value) {
			$a++;
			foreach ($value as $val) {
				echo '<tr>';
				echo '<td>  ' . $val["id"] . ' </td>';
				echo '<td>  ' . $val["fullname"] . '</td>';
				echo '<td> ' . $val["email"] . ' </td>';
				echo '<td><a class="btn btn-danger" onclick="xoauser(' . $a . ')" >Xóa</a></td>';
				echo '</tr>';
			}
		}
		echo '</tbody>';
		echo '</table>';
	}

	public function getfilechayajax2()
	{
		$listuser2 = DangkyModel::all();
		return view('aucation.filechayajax2', compact('listuser2'));
	}


	public function postfilechayajax2()
	{
		if (isset($_POST['mang1'])) {
			$dulieu = $_POST['mang1'];
			if (isset($dulieu) && !empty($dulieu)) {

				echo '<table id="example2" class="table table-bordered table-striped table-hover text-center" >';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Tên</th>';
				echo '<th>Số tiền phải đóng</th>';
				echo '<th>Số tiền đã đóng</th>';
				echo '<th>Còn lại</td>';
				echo '<th>Xóa</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				$a = -1;
				foreach ($dulieu as $value) {
					$a++;
					$fullname2 = DangkyModel::find($value['user2']);
					echo '<tr>';
					echo '<td>  ' . $fullname2['fullname'] . ' </td>';
					echo '<td>  ' . number_format($value["tienphaidong"]) . '</td>';
					echo '<td> ' . number_format($value["tiendadong"]) . ' </td>';
					echo '<td> ' . number_format($value["conlai"]) . ' </td>';
					echo '<td> ' . $value["ngaydong"] . ' </td>';
					echo '<td><a class="btn btn-danger" onclick="xoaaa(' . $a . ')" >Xóa</a></td>';
					echo '</tr>';

				}
				echo '</tbody>';
				echo '</table>';
			}
		}
	}
}
