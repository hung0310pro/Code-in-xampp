<?php
class nguoi{
	var $ho_ten;
	var $gioi_tinh;
	var $ngay_sinh;

	public function nhap($ho_ten,$gioi_tinh,$ngay_sinh){
        $this->ho_ten = $ho_ten;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->xuat();
	}

	public function xuat(){
        echo "$this->ho_ten - $this->gioi_tinh - $this->ngay_sinh";
	}
}

// sử dụng đối tượng

$objN = new nguoi(); // khởi tạo đối tượng N

/*echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
	print_r($objN);
echo '</pre>';*/

$objN->nhap("Nguyễn Văn A","Nam","1/1/1996"); // gọi phương thức nhập

/*echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
	print_r($objN);
echo '</pre>';*/

?>