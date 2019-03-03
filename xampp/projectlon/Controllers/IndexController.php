<?php
class IndexController extends Controller{
   public function indexAction(){
        $objModel = new SanphamModel();
        $listsach = $objModel->loadlist("tb_sach");
        $this->views->sach = $listsach;

        $the_loai1 = $objModel->load_get_row("tb_theloai","1");
        $this->views->theloai_sach1 = $the_loai1;

        $the_loai2 = $objModel->load_get_row("tb_theloai","2");
        $this->views->theloai_sach2 = $the_loai2;

        $the_loai3 = $objModel->load_get_row("tb_theloai","3");
        $this->views->theloai_sach3 = $the_loai3;

        $the_loai9 = $objModel->load_get_row("tb_theloai","9");
        $this->views->theloai_sach9 = $the_loai9;

        $sach_loai1 = $objModel->loadlistsach_theloai1("1");
        $this->views->sach1 = $sach_loai1;

        $sach_loai2 = $objModel->loadlistsach_theloai1("2");
        $this->views->sach2 = $sach_loai2;

        $sach_loai3 = $objModel->loadlistsach_theloai1("3");
        $this->views->sach3 = $sach_loai3;

        $sach_loai9 = $objModel->loadlistsach_theloai1("9");
        $this->views->sach9 = $sach_loai9;

     
    }

   public function add_cartAction(){
    if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    if($id < 1){
        header("location: ".base_path);
        return;
    }
    if(!isset($_SESSION["giohang"]))
    {
        $_SESSION["giohang"] = array(); //xem bài 7 2school  $_SESSION["cart"] = ("id_sp"=>"soluong1",...)
    }

    if(isset($_SESSION["giohang"][$id])) // ấn addcart nhiều lần thì cái số lượng của quyển sách đó tự tăng
        $_SESSION["giohang"][$id]++; // xem bài 7 2school $_SESSION["cart"][$id] = $soluong
    // tức là cả cái đó chính là số lượng của sản phẩm thôi
    else
        $_SESSION["giohang"][$id] = 1; // cho số lượng bằng 1
    header("location:".base_path);
    }
   }

   public function logoutAction(){
    session_destroy();
    header("location:?controller=index");
    exit();
   }

}