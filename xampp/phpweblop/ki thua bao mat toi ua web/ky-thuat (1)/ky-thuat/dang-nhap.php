<?php
// password lấy trong DB ra
$db_pass = 'b181f9e395de42427c8d9f1ee5965d20935d2de841f811011da99e2ace788214';

// lấy pass người dùng nhập
$passUser = $_GET['pass'];

// Tạo mã hash để so sánh với DB
$chuoi_key_pirvate ="sdfjasdkfa93824n@fdjs6P#!sdfh@!#2";

$new_hash = hash_hmac('sha256',$passUser, $chuoi_key_pirvate);

if($db_pass == $new_hash){
	echo "Dang nhap thanh cong!";
}else
	echo "Sai pass";
