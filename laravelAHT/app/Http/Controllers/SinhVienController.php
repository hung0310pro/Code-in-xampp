<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSinhvienRequest;
use App\Reporsinhvien;
use App\Sinhvien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
	protected $sinhvienModel;
	protected $rpsinhvienModel;

	public function __construct()
	{
		$this->rpsinhvienModel = new Reporsinhvien();
		$this->sinhvienModel = new Sinhvien();
	}

	public function showListsv()
	{
		$listSv = $this->rpsinhvienModel->getListsv();
		return view('sinhvien.Indexsinhvien', compact('listSv'));
	}

	public function addSinhvien(AddSinhvienRequest $request)
	{
		if (isset($_POST['themsv'])) {
			$this->sinhvienModel->setTen($request['tensv']);
			$this->sinhvienModel->setNgaysinh($request['ngaysinh']);
			$this->sinhvienModel->setTuoi($request['tuoi']);
			$this->sinhvienModel->setLop($request['lop']);
			$this->rpsinhvienModel->addSinhvien($this->sinhvienModel);
			return redirect()->route('showsinhvien')->with('themsv', 'Bạn đã thêm thành công');
		}
	}


	public function editSinhvien($id)
	{
		$this->sinhvienModel->setId($id);
		$sinhvien = $this->rpsinhvienModel->getSinhvien($this->sinhvienModel);
		return view('sinhvien.Updatesinhvien', compact('sinhvien'));
	}

	public function updateSinhvien(AddSinhvienRequest $request, $id)
	{
		if (isset($_POST['suasv'])) {
			$this->sinhvienModel->setTen($request['tensv']);
			$this->sinhvienModel->setNgaysinh($request['ngaysinh']);
			$this->sinhvienModel->setTuoi($request['tuoi']);
			$this->sinhvienModel->setLop($request['lop']);
			$this->sinhvienModel->setId($id);
			$this->rpsinhvienModel->updateSV($this->sinhvienModel);
			return redirect()->route('showsinhvien')->with('suasv', 'Bạn đã sửa thành công');
		}
	}


	public function deleteSinhvien($id)
	{
		$this->sinhvienModel->setId($id);
		$this->rpsinhvienModel->deleteSv($this->sinhvienModel);
		return redirect()->route('showsinhvien')->with('deletesv', 'Bạn đã xóa thành công');
	}

	public function watchSinhvien($id)
	{
		$this->sinhvienModel->setId($id);
		$sinhvien = $this->rpsinhvienModel->getSinhvien($this->sinhvienModel);
		$listThe = $this->rpsinhvienModel->getListthe($this->sinhvienModel);

		$mangsach = array();
		foreach ($listThe as $value) {
			$listsachst = $this->rpsinhvienModel->getListsachid($value->id);
			if (isset($listsachst) && !empty($listsachst)) {
				$mangsach[$value->id] = $listsachst;
			}
		}
		$tongsos = $this->rpsinhvienModel->demSach($this->sinhvienModel);
		$tongsosach = $tongsos;
		$tongsosct = $this->rpsinhvienModel->trangthaiSach($this->sinhvienModel, 1);
		$tongsosachct = $tongsosct;
		$tongsosdt = $this->rpsinhvienModel->trangthaiSach($this->sinhvienModel, 2);
		$tongsossachdt = $tongsosdt;
		return view('sinhvien.Watchsinhvien', ['sinhvien' => $sinhvien, 'listThe' => $listThe, 'tongsosach' => $tongsosach, 'tongsosachct' => $tongsosachct, 'tongsossachdt' => $tongsossachdt, 'mangsach' => $mangsach]);
	}
}
