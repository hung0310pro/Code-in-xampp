<?php
// các phương thức bắt buộc ở dạng public or protected
// các thuộc tính thì được nhưng k có cái chữ abstract ở trước
// không khởi tạo được lớp abstract
// lớp kế thừa phải ghi lại tất cả các hàm abstract của lớp abstract
// khai báo lớp trừu tượng
abstract class LopA{
	public function PhuongThuc1(){
	    echo "Phương thức 1";
	}

	public abstract function PT2();
	abstract public function PT3($tham_so_1,$tham_so_2);
}

// sử dụng
class B extends LopA{          // muốn kế thừa phải có hàm abstract PT2
    public function PT2(){
       echo "<br>PT2 ";
    }

    public function PT3($a, $b) // không nhất thiết phải cùng biến trong cái kia
    {
       echo "<br>PT3 $a,$b";
    }
}

$objB = new B();
$objB->PhuongThuc1();
$objB->PT2();
$objB->PT3(5,6);

