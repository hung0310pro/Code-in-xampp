<?php

class SinhVien
{
    function __construct($message) {
        echo $message;
    }
}
  
// khởi tạo lớp SinhVien
$sinhvien = new SinhVien('Lớp Sinh Viên vừa được khởi tạo');

//phần khác
class dongvat{

	function __construct(){
		echo "đây là hàm khởi tạo của lớp động vật";
	}

}
class concho extends dongvat{
  
   function __construct(){
   		echo "đây là hàm khởi tạo của lớp con chó";
   }

}  // nếu gọi tới lớp con chó thì sẽ chạy hàm khởi tạo của lớp con chó

$khoitao = new concho();


