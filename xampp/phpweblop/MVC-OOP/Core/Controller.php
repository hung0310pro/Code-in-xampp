<?php
class Controller{
    public $currentController;
    public $currentAction;
    protected $view;
    protected $layout;
    public function __construct()
    {
        $this->view = new stdClass();
        $this->layout = new stdClass();
    }

    /**
    Hàm load layout và view vào action. $dataView là mảng gồm các phần tử:
    $dataView = array('disable_layout','disable_layout_view', 'data')
     */
    function RenderView(){
        if(isset($this->layout->disabled) && isset($this->view->disabled)){
            // tắt cả view và layout
            return;
        }

        if(isset($this->layout->disabled) && !isset($this->view->disabled)){
            // chỉ tắt layout và không tắt view
            $file_view_path = view_path.'/'.$this->currentController.'/'.$this->currentAction.'.phtml';
            if(file_exists($file_view_path))
                require_once $file_view_path;
            else
                die("File view $file_view_path not found!");
            return;
        }

        // trường hợp mặc định còn lại thì nhúng layout vào.
        $file_layout_path = view_path.'/layout';

        if(substr($this->currentController, 0,5) == 'admin'){ //admin-user
            // nhúng layout của trang quản trị
            $file_layout_path .= '/admin.phtml'; // do đó chạy cái này
        }else
            $file_layout_path .= '/frontend.phtml';

        // nếu có custom file layout thì gán lại
        if(isset($this->layout->layout_file))
            $file_layout_path = view_path.'/layout/'. $this->layout->layout_file;


        if(file_exists($file_layout_path))
            require_once $file_layout_path;
        else
            die("File layout $file_layout_path not found!");
    }

    function ShowContent(){
        $file_view_path = view_path.'/'.$this->currentController.'/'.$this->currentAction.'.phtml';
        if(file_exists($file_view_path))  // sau khi chạy cái admin.phtml ở layout thì nó chạy hàm này
            require_once $file_view_path; // khi ấy cái currentAction chính là index.phtml,còn currentController
        else                              // là folder admin-user;
            die("File view $file_view_path not found!");
    }
}