<?php

class SinhVienController extends Controller
{
	protected $_rpsvmodel;
	protected $_sinhvienmd;
	private $students;
	private $listhesvs;
	private $listsachsv;
	private $sumpaid;
	private $sumunpaid;
	private $sumbook;

	public function setStudents($__students)
	{
		$this->students = $__students;
	}

	public function getStudents()
	{
		return $this->students;
	}

	public function setListhesvs($__listhesvs)
	{
		$this->listhesvs = $__listhesvs;
	}

	public function getListthesv()
	{
		return $this->listhesvs;
	}

	public function setListsachsv($__listsachsv)
	{
		$this->listsachsv = $__listsachsv;
	}

	public function getListsachsv()
	{
		return $this->listsachsv;
	}

	public function setSumpaid($__sumpaid)
	{
		$this->sumpaid = $__sumpaid;
	}

	public function getSumpaid()
	{
		return $this->sumpaid;
	}

	public function setSumunpaid($__sumunpaid)
	{
		$this->sumunpaid = $__sumunpaid;
	}

	public function getSumunpaid()
	{
		return $this->sumunpaid;
	}

	public function setSumbook($__sumbook)
	{
		$this->sumbook = $__sumbook;
	}

	public function getSumbook()
	{
		return $this->sumbook;
	}

	public function __construct()
	{
		$this->_rpsvmodel = new ReporSinhVienModel();
		$this->_sinhvienmd = new SinhVienModel();
	}

	public function getListsinhvien()
	{
		$student = $this->_rpsvmodel->getListsv();
		$this->setStudents($student);
		if (isset($_POST['themsv'])) {
			$this->addSinhvien();
		}
	}

	public function addSinhvien()
	{
		if (isset($_POST['themsv'])) {
			$errors = array();
			if ($_POST['tensv'] == null) {
				$errors[] = "Xin mời bạn điền tên sinh viên";
			} else {
				$name = trim($_POST['tensv']);
			}
			if ($_POST['ngaysinh'] == null || $_POST['ngaysinh'] == "") {
				$errors[] = "Xin mời bạn điền ngày sinh";
			} else {
				$ngaysinh = trim($_POST['ngaysinh']);
			}
			if ($_POST['tuoi'] == null) {
				$errors[] = "Xin mời bạn điền tuổi";
			} else {
				$tuoi = trim($_POST['tuoi']);
			}
			if ($_POST['lop'] == null) {
				$errors[] = "Xin mời bạn điền lớp học";
			} else {
				$lop = trim($_POST['lop']);
			}

			if (count($errors) == 0) {

				$this->_sinhvienmd->setName($name);
				$this->_sinhvienmd->setAge($tuoi);
				$this->_sinhvienmd->setBirthday($ngaysinh);
				$this->_sinhvienmd->setClass($lop);
				$addsv = $this->_rpsvmodel->addSv($this->_sinhvienmd);

				if (isset($addsv)) {
					header("location:?controller=sinhvien&action=getlistsinhvien");
				}

			} else {
				$_SESSION["erroraddsv"] = $errors;
			}
		}
	}

	public function updateSinhvien()
	{
		if (isset($_GET['id'])) {
			$this->_sinhvienmd->setId($_GET['id']);
			$rowsv = $this->_rpsvmodel->getRowsv($this->_sinhvienmd);
			$this->setStudents($rowsv);
			if (isset($_POST['suasv'])) {
				$errors = array();
				if ($_POST['tensv'] == null) {
					$errors[] = "Xin mời bạn điền tên sinh viên";
				} else {
					$name = trim($_POST['tensv']);
				}
				if ($_POST['ngaysinh'] == null || $_POST['ngaysinh'] == "") {
					$errors[] = "Xin mời bạn điền ngày sinh";
				} else {
					$ngaysinh = trim($_POST['ngaysinh']);
				}
				if ($_POST['tuoi'] == null) {
					$errors[] = "Xin mời bạn điền tuổi";
				} else {
					$tuoi = trim($_POST['tuoi']);
				}
				if ($_POST['lop'] == null) {
					$errors[] = "Xin mời bạn điền lớp học";
				} else {
					$lop = trim($_POST['lop']);
				}

				if (count($errors) == 0) {
					$this->_sinhvienmd->setName($name);
					$this->_sinhvienmd->setBirthday($ngaysinh);
					$this->_sinhvienmd->setClass($lop);
					$this->_sinhvienmd->setAge($tuoi);
					$updatesv1 = $this->_rpsvmodel->updateSv($this->_sinhvienmd);
					if (isset($updatesv1)) {
						$_SESSION["updatesv"] = "bạn đã update sinh viên thành công";
						header("location:?controller=sinhvien&action=getlistsinhvien");
					}

				} else {
					$_SESSION['error'] = $errors;
				}
			}
		}
	}

	public function deleteSinhvien()
	{
		if (isset($_GET['id'])) {
			$this->_sinhvienmd->setId($_GET['id']);
			$deletesv = $this->_rpsvmodel->deleteSv($this->_sinhvienmd);
			if (isset($deletesv)) {
				$_SESSION["deletesv"] = "bạn đã xóa sinh viên thành công";
				header("location:?controller=sinhvien&action=getlistsinhvien");
			} else {
				die($deletesv);
			}
		}
	}

	public function watchDetail()
	{
		if (isset($_GET['id'])) {
			$this->_sinhvienmd->setId($_GET['id']);
			$getrowsv = $this->_rpsvmodel->getRowsv($this->_sinhvienmd);
			$this->setStudents($getrowsv);
			$getlistthesv = $this->_rpsvmodel->getListthe($this->_sinhvienmd);
			$this->setListhesvs($getlistthesv);
			$mangsach = array();
			foreach ($this->listhesvs as $value) {
				$listsachst = $this->_rpsvmodel->getListsach($value->id);
				if (isset($listsachst) && !empty($listsachst)) {
					$mangsach[$value->id] = $listsachst;
				}
			}
			$this->setListsachsv($mangsach);
			$tongsach = $this->_rpsvmodel->countSach($this->_sinhvienmd);
			$this->setSumbook($tongsach[0]->soluong);

			$bookunpaid = $this->_rpsvmodel->countSachstate($this->_sinhvienmd, 1);
			$this->setSumunpaid($bookunpaid[0]->soluong);

			$bookpaid = $this->_rpsvmodel->countSachstate($this->_sinhvienmd, 2);
			$this->setSumpaid($bookpaid[0]->soluong);
		}
	}
}