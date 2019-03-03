<?php

namespace App\Http\Controllers;

use App\Reporthemuon;
use App\Themuon;
use Illuminate\Http\Request;
use App\Http\Requests\AddThemuonRequest;
use App\Http\Requests\UpdateTheRequest;

class TheMuonController extends Controller
{
	protected $rptmModel;
	protected $tmModel;

	public function __construct()
	{
		$this->rptmModel = new Reporthemuon();
		$this->tmModel = new Themuon();
	}

	public function showThemuon()
	{
		$themuon = $this->rptmModel->getListtm();
		$mang = [];
		$a = 0;
		foreach ($themuon as $value) { //lấy name sinh viên
			$a++;
			$this->tmModel->setId($value['id_sinhvien']);
			$tensv = $this->rptmModel->getSinhvien($this->tmModel);
			$mang[$a]['id'] = $value['id'];
			$mang[$a]['id_sinhvien'] = $tensv['name'];
			$mang[$a]['borrow_date'] = $value['borrow_date'];
			$mang[$a]['pay_date'] = $value['pay_date'];
			$mang[$a]['state'] = $value['state'];
		}

		return view('themuon.Indexthemuon', compact('mang'));
	}


	public function showAddtm()
	{
		$listSach = $this->rptmModel->getListsach();
		$listSinhvien = $this->rptmModel->getListsinhvien();
		return view('themuon.Addthemuon', ['listSach' => $listSach, 'listSinhvien' => $listSinhvien]);
	}


	public function addThemuon(AddThemuonRequest $request)
	{
		if (isset($_POST['addmuon'])) {
			$this->tmModel->setNgaymuon($request['ngaymuon']);
			$this->tmModel->setNgaytra($request['ngaytra']);
			$this->tmModel->setSach($request['tensach']);
			$this->tmModel->setIdsinhvien($request['sinhvien']);
			$this->tmModel->setTrangthai(1);
			$this->rptmModel->addThe($this->tmModel);
			return redirect()->route('showthemuon')->with('themtm', 'Bạn đã thêm thành công');
		}
	}


	public function editThemuon($id)
	{
		$this->tmModel->setId($id);
		$themuon = $this->rptmModel->getThemuon($this->tmModel);
		return view('themuon.Updatethemuon', compact('themuon'));
	}


	public function updateThemuon(UpdateTheRequest $request, $id)
	{
		if (isset($_POST['suathemuon'])) {
			$this->tmModel->setNgaymuon($request['ngaymuon']);
			$this->tmModel->setNgaytra($request['ngaytra']);
			$this->tmModel->setTrangthai($request['trangthai']);
			$this->tmModel->setId($id);
			$this->rptmModel->updateThe($this->tmModel);
			return redirect()->route('showthemuon')->with('updatetm', 'Bạn đã chỉnh sửa thành công');
		}
	}

	public function deleteThemuon($id)
	{
		$this->tmModel->setId($id);
		$this->rptmModel->deleteThemuon($this->tmModel);
		return redirect()->route('showthemuon')->with('deletetm', 'Bạn đã xóa thành công');
	}
}
