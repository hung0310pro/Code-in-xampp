<?php
session_start();
$soluongmoi = $_POST["so_luong_moi"];
$id_sach = intval($_POST["id_sach"]);
$_SESSION["giohang"][$id_sach] = $soluongmoi;
?>