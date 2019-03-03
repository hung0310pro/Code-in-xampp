<?php

class Controller
{
	public $currentController;
	public $currentAction;
	protected $views;
	protected $layout;

	public function __construct()
	{
		$this->views = new stdClass();
		$this->layout = new stdClass();
	}

	public function renderviews()
	{
		// tắt cả view và layout
		if (isset($this->views->disabled) && isset($this->layout->disabled)) {
			return;
		}
		// chỉ tắt layout và không tắt view
		if (isset($this->layout->disabled) && !isset($this->view->disabled)) {
			$file_view_path = view_path . "/" . $this->currentController . "/" . $this->currentAction . ".php";
			if (file_exists($file_view_path)) {
				require_once $file_view_path;
			} else {
				die("file_view_parth not found !");
				return;
			}
		}

		$file_layout_path = view_path . "/layout";
		if (substr($this->currentController, 0, 7) == "Themuon") {
			$file_layout_path .= '/Themuon.php';
		} else if (substr($this->currentController, 0, 8) == "Sinhvien") {
			$file_layout_path .= '/Sinhvien.php';
		} else if (substr($this->currentController, 0, 4) == "Sach") {
			$file_layout_path .= '/Sach.php';
		}

		if (file_exists($file_layout_path))
			require_once $file_layout_path;
		else
			die("File layout $file_layout_path not found!");

	}

	// sau khi chạy ra file layout thì trong file layout gọi tới hàm showcontent() (ví dụ danhsach.php) thì bđ mới ra nội dung thân trang

	public function showContent()
	{
		$file_view_path = view_path . "/" . lcfirst($this->currentController) . "/" . ucfirst($this->currentAction) . ".phtml";
		if (file_exists($file_view_path)) {
			require_once $file_view_path;
		} else {
			die("file view $file_view_path not found!");
			return;
		}
	}
}