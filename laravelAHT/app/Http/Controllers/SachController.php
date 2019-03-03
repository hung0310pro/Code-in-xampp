<?php

namespace App\Http\Controllers;

use App\Reporsach;
use App\Sach;
use Illuminate\Http\Request;
use App\Http\Requests\AddSachRequest;

class SachController extends Controller
{

	protected $sachModel;
	protected $rpsachModel;

	public function __construct()
	{
		$this->rpsachModel = new Reporsach();
		$this->sachModel = new Sach();
	}

	public function showListsach()
	{
		$sachs = $this->rpsachModel->getListsach();
		return view('sach.Indexsach', compact('sachs'));
	}

	public function addSach(AddSachRequest $request)
	{
		if (isset($_POST['themsach'])) {
			$this->sachModel->setTensach($request['tensach']);
			$this->sachModel->setTacgia($request['tacgia']);
			$this->sachModel->setNamsx($request['namsx']);
			$this->rpsachModel->addSach($this->sachModel);
			return redirect()->route('showsach')->with('themsach', 'Bạn đã thêm thành công');
		}
	}

	public function editSach($id)
	{
		$this->sachModel->setId($id);
		$sach = $this->rpsachModel->getSach($this->sachModel);
		return view('sach.Updatesach', compact('sach'));
	}

	public function updateSach(AddSachRequest $request, $id)
	{
		if (isset($_POST['suasach'])) {
			$this->sachModel->setTensach($request['tensach']);
			$this->sachModel->setTacgia($request['tacgia']);
			$this->sachModel->setNamsx($request['namsx']);
			$this->sachModel->setId($id);
			$this->rpsachModel->updateSach($this->sachModel);
			return redirect()->route('showsach')->with('update', 'Bạn đã chỉnh sửa thành công');
		}
	}

	public function deleteSach($id)
	{
		$this->sachModel->setId($id);
		$this->rpsachModel->deleteSach($this->sachModel);
		return redirect()->route('showsach')->with('delete', 'Bạn đã xóa thành công');
	}
}
