<?php

class Controller{
	public $currentController;
	public $currentAction;
	protected $views;
	protected $layout;

	public function __construct(){
		$this->views = new stdClass();
		$this->layout = new stdClass();
	}

	public function renderviews(){
		 // tắt cả view và layout
		if(isset($this->views->disabled) && isset($this->layout->disabled)){
			return;
		}
        // chỉ tắt layout và không tắt view
		if(isset($this->layout->disabled) && !isset($this->view->disabled)){
			$file_view_path = view_path."/".$this->$currentController."/".$this->currentAction.".phtml";
			if(file_exists($file_view_path)){
				require_once $file_view_path;
			}
			else{
                die("file_view_parth not found !");
                return;
			}
		}

		//mặc định cho link của nó là:
		$file_layout_path = view_path."/layout";
		if(substr($this->currentController,0,4) == "user"){
           $file_layout_path .= '/user.php'; 
		}  
		else if(substr($this->currentController,0,8) == "trangphu"){
		   $file_layout_path .= "/trangphu.php";
		}
		else if(substr($this->currentController,0,8) == "danhsach"){
			$file_layout_path .= "/danhsach.php";
		}
		else{
			$file_layout_path .= '/sanpham.php';
		}
         
         // nếu có custom file layout thì gán lại
        if(isset($this->layout->layout_file))
            $file_layout_path = view_path.'/layout/'. $this->layout->layout_file;

        if(file_exists($file_layout_path))
            require_once $file_layout_path;
        else
            die("File layout $file_layout_path not found!"); 
	}

	public function showcontent(){
		$file_view_path = view_path."/".$this->currentController."/".$this->currentAction.".phtml";
		if(file_exists($file_view_path)){
			require_once $file_view_path;
		}
		else{
			die("file view $file_view_path not found!");
			return;
		}
	}

	public function showcontent1(){
		$file_view_path = view_path."/admin-sanpham/".$this->currentAction.".phtml";
		if(file_exists($file_view_path)){
			require_once $file_view_path;
		}
		else{
			die("file view $file_view_path not found!");
			return;
		}
	}
}