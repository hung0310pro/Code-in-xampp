<?php
// tạo chữ ký hash của chuỗi
//b1. Website định nghĩa 1 chuỗi key bí mật

$chuoi_key_pirvate ="sdfjasdkfa93824n@fdjs6P#!sdfh@!#2";

$user_password = '123456';

$save_db_pass_string = hash_hmac('sha256',$user_password, $chuoi_key_pirvate);

echo "password ghi DB la: $save_db_pass_string <br>";


