<?php
session_start();
$id_sach = intval($_GET["id"]);
if(isset($_SESSION["giohang"][$id_sach]))
{
	session_destroy();
}
header("location:giohang.php");
exit();
?>