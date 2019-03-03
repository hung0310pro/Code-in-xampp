<?php
//- chỉ là 1 mẫu kp là 1 lớp;
//- không thể khởi tạo vì nó không phải 1 lớp
//- các hàm ở trong đây chỉ viết chứ cx k định nghĩa như là lớp abstract
//- nếu 1 đối tượng implement cái interface này thì phải viết lại hết các hàm của nó
//- biến và hàm không cần chữ interface
//- chỉ khai báo đc hằng nhưng k thể khai báo biến
interface A{

	const a = "hùng";
	public function hamcuainterfacea();

}

interface B extends A{

	public function hamcuainterfaceb();

}

class C implements B{
	public function hamcuainterfacea(){
		echo "Hàm hamcuainterfacea của interface A"."<br>";
	}

	public function hamcuainterfaceb(){
		echo "Hàm hamcuainterfaceb của interface B"."<br>";
	}
}

$khoitaointerface = new C();
$khoitaointerface->hamcuainterfacea();
$khoitaointerface->hamcuainterfaceb();