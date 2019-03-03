<?php
session_start();
$id_sach = intval($_GET["id"]);
if(isset($_SESSION["giohang"][$id_sach]))
{
	unset($_SESSION["giohang"][$id_sach]);
}
header("location:giohang.php");
exit();
?>