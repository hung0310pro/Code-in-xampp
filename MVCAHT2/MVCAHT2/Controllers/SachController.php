<?php

class SachController extends Controller
{
	private $books;
	protected $rpsachmd;
	protected $sachmd;

	public function setBook($__books)
	{
		$this->books = $__books;
	}

	public function getBook()
	{
		return $this->books;
	}

	public function __construct()
	{
		$this->rpsachmd = new ReporSachModel();
		$this->sachmd = new SachModel();
	}


	/*
	 * show page Getlistsach
	 */
	public function getListsachs()
	{
		//return list of Sach
		//$listsach = $this->rpsachmd->getListbook();
		$listsach = $this->repoSach->getListbook();

		$this->setBook($listsach);

		//check add new Sach
		if (isset($_POST['themsach'])) {
			$this->addSach();
		}
	}

	public function updateSach()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->sachmd->setId($id);
			$sach = $this->rpsachmd->getSach($this->sachmd);
			$this->setBook($sach);
			if (isset($_POST['suasach'])) {
				$errors = array();
				if ($_POST['tensach'] == null) {
					$errors[] = "Xin mời bạn điền sách";
				} else {
					$tensach = trim($_POST['tensach']);
				}
				if ($_POST['tacgia'] == null) {
					$errors[] = "Xin mời bạn điền tác giả";
				} else {
					$tacgia = trim($_POST['tacgia']);
				}
				if ($_POST['namsx'] == null) {
					$errors[] = "Xin mời bạn điền năm sản xuất";
				} else {
					$namsx = trim($_POST['namsx']);
				}
				if (count($errors) == 0) {
					$this->sachmd->setNamebook($tensach);
					$this->sachmd->setAuthor($tacgia);
					$this->sachmd->setPyear($namsx);
					$updatesach = $this->rpsachmd->updateBook($this->sachmd);
					if (isset($updatesach)) {
						$_SESSION["updatesach"] = "bạn đã update thành công";
						header("location:?controller=sach&action=getlistsachs");
					}
				} else {
					$_SESSION['errorudsach'] = $errors;
				}
			}
		}
	}

	public function addSach()
	{
		if (isset($_POST['themsach'])) {
			$errors = array();
			if ($_POST['tensach'] == null) {
				$errors[] = "Xin mời bạn điền sách";
			} else {
				$tensach = trim($_POST['tensach']);
			}
			if ($_POST['tacgia'] == null) {
				$errors[] = "Xin mời bạn điền tác giả";
			} else {
				$tacgia = trim($_POST['tacgia']);
			}
			if ($_POST['namsx'] == null) {
				$errors[] = "Xin mời bạn điền năm sản xuất";
			} else {
				$namsx = trim($_POST['namsx']);
			}
			if (count($errors) == 0) {
				$this->sachmd->setNamebook($tensach);
				$this->sachmd->setAuthor($tacgia);
				$this->sachmd->setPyear($namsx);
				$this->rpsachmd->themSach($this->sachmd);
				header("location:?controller=sach&action=getlistsachs");
			} else {
				$_SESSION['erroradsach'] = $errors;
			}
		}
	}


	public function deleteSach()
	{
		if (isset($_GET['id'])) {
			$this->sachmd->setId($_GET['id']);
			$deletebook = $this->rpsachmd->deleteBook($this->sachmd);
			if (isset($deletebook)) {
				$_SESSION["deletebook"] = "bạn đã xóa thành công";
				header("location:?controller=sach&action=getlistsachs");
			} else {
				die($deletebook);
			}
		}
	}
}