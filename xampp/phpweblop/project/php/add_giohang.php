<?php
session_start();
$id_sach = intval($_GET["id"]);
if(isset($_SESSION['giohang'][$id_sach]))
{
	$soluong = $_SESSION['giohang'][$id_sach]; // nếu ng dùng đã chọn mua sp a  vs số lượng là 6 mà lại ấn nhầm mua tiếp thì nó vẫn giữ số lượng mua là 6 ban đầu chứ k bị auto về 1 nữa
}
else
{
	$soluong = 1;
}
$_SESSION['giohang'][$id_sach] = $soluong;
header("location:giohang.php");
exit();
//$cart = array("masp1"=>"soluong1","masp2"=>"soluong2"...);
//trc đó là dùng mảng k có thứ tự là $cart[$masp] = $soluong($masp có thể là masp1,masp2...)
//nhưng phải dùng $_SESSION vì nó còn lưu trên server
//$_SESSION["cart"] = array();
?>