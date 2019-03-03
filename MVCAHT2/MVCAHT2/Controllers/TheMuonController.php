<?php

class TheMuonController extends Controller
{
	private $muons;
	private $sachs;
	private $hocsinhs;
	protected $themuonmodel;
	protected $reportm;

	public function __construct()
	{
		$this->themuonmodel = new TheMuonModel();
		$this->reportm = new ReporTheMuonModel();
	}

	public function setMuons($__muons)
	{
		$this->muons = $__muons;
	}

	public function getMuons()
	{
		return $this->muons;
	}

	public function setSachs($__sachs)
	{
		$this->sachs = $__sachs;
	}

	public function getSachs()
	{
		return $this->sachs;
	}

	public function setHocsinhs($__hocsinhs)
	{
		$this->hocsinhs = $__hocsinhs;
	}

	public function getHocsinhs()
	{
		return $this->hocsinhs;
	}

	public function addMuon()
	{
		$listhocsinh = $this->reportm->getListsinhvien();
		$this->setHocsinhs($listhocsinh);
		$listsach = $this->reportm->getListsach();
		$this->setSachs($listsach);
		if (isset($_POST['addmuon'])) {
			$errors = array();
			if ($_POST['ngaymuon'] == null) {
				$errors[] = "Bạn chưa điền ngày mượn";
			} else {
				$ngaymuon = $_POST['ngaymuon'];
			}
			if ($_POST['ngaytra'] == null) {
				$errors[] = "Bạn chưa điền ngày trả";
			} else {
				$ngaytra = $_POST['ngaytra'];
			}
			if (!isset($_POST['tensach']) || empty($_POST['tensach'])) {
				$errors[] = "Bạn chưa chọn sách";
			} else {
				$sach = $_POST['tensach'];
			}
			if ($_POST['sinhvien'] == 0) {
				$errors[] = "Bạn chưa chọn sinh viên";
			} else {
				$sinhvien = $_POST['sinhvien'];
			}
			if (count($errors) == 0) {
				$this->themuonmodel->setIdsinhvien($sinhvien);
				$this->themuonmodel->setPaydate($ngaytra);
				$this->themuonmodel->setBorrowdate($ngaymuon);
				$addm = $this->reportm->addMuons($this->themuonmodel, $sach);
				if (isset($addm)) {
					$_SESSION['themtm'] = "Bạn đã thêm thành công";
					header("location:?controller=themuon&action=getlistmuon");
				}
			} else {
				$_SESSION['erroraddmuon'] = $errors;
			}
		}
	}

	public function getListmuon()
	{
		$muon = $this->reportm->getListmuons();
		$mang = [];
		$a = 0;
		foreach ($muon as $value) { //lấy name sinh viên
			$a++;
			$tensv = $this->reportm->getRowsinhvien($value->id_sinhvien);
			$mang[$a]['id'] = $value->id;
			$mang[$a]['id_sinhvien'] = $tensv[0]->name;
			$mang[$a]['borrow_date'] = $value->borrow_date;
			$mang[$a]['pay_date'] = $value->pay_date;
			$mang[$a]['state'] = $value->state;
		}

		$mang1 = array();
		foreach ($mang as $key => $value) {
			$mang1[] = (object)$value;
		}
		$this->setMuons($mang1);
	}

	public function updateMuon()
	{
		if (isset($_GET['id'])) {
			$this->themuonmodel->setId($_GET['id']);
			$muon = $this->reportm->getRowmuon($this->themuonmodel);
			$this->setMuons($muon);
			if (isset($_POST['suathemuon'])) {
				$errors = array();
				if ($_POST['ngaymuon'] == null) {
					$errors[] = "Bạn chưa điền ngày mượn";
				} else {
					$ngaymuon = $_POST['ngaymuon'];
				}
				if ($_POST['ngaytra'] == null) {
					$errors[] = "Bạn chưa điền ngày trả";
				} else {
					$ngaytra = $_POST['ngaytra'];
				}
				if ($_POST['trangthai'] == 0) {
					$errors[] = "Bạn chưa chọn trạng thái";
				} else {
					$trangthai = $_POST['trangthai'];
				}

				if (count($errors) == 0) {
					$this->themuonmodel->setBorrowdate($ngaymuon);
					$this->themuonmodel->setPaydate($ngaytra);
					$this->themuonmodel->setState($trangthai);
					$updatemuon = $this->reportm->updateMuons($this->themuonmodel, $this->themuonmodel);
					if (isset($updatemuon)) {
						$_SESSION['updatetm'] = "Bạn đã update thành công";
						header("location:?controller=themuon&action=getlistmuon");
					}
				} else {
					$_SESSION['errortm'] = $errors;
				}
			}
		}
	}

	public function deleteMuon()
	{
		if (isset($_GET['id'])) {
			$this->themuonmodel->setId($_GET['id']);
			$deletemuon = $this->reportm->deleteMuons($this->themuonmodel);
			if (isset($deletemuon)) {
				$_SESSION["deletemuon"] = "bạn đã xóa thành công";
				header("location:?controller=themuon&action=getlistmuon");
			} else {
				die($deletemuon);
			}

		}
	}
}