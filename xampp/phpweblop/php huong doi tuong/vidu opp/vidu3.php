<?php
class hinhve{
	public $canhA;
	public $canhB;
	const sai_so = 0.5;
	public function nhap($a,$b){
		$this->canhA = $a;
		$this->canhB = $b;
	}

	public function xuat(){
		echo "<br> canhA = ".$this->canhA." - canhB = ".$this->canhB." - Sai so: ".self::sai_so;

		// self này là trỏ tới hằng trong đối tượng
	}

	protected function tinhtong(){
		return $this->canhA + $this->canhB;
	}

	private function tinhhieu(){
		return $this->canhA - $this->canhB;
	}
}

$objN = new hinhve();
$objN->nhap(3,5);
$objN->xuat();

echo "<br> thông tin sai số = ".hinhve::sai_so;

// ví dụ về kế thừa
// 
class hinhchunhat extends hinhve{
      function tinhtong(){
      	/*echo "<br> tong = ".$this->tinhtong();*/
      	$tong = $this->canhA + $this->canhB + self::sai_so;
      	echo "Tong = ".$tong;
      }
}

$objHCN = new hinhchunhat();
$objHCN -> nhap(111,222);
$objHCN -> xuat();
$objHCN -> tinhtong();

// in ra cái hằng số
echo $objHCN::sai_so;
//hoặc tạo 1 cái hàm trong class như là public function getIP(){
//return "IP = ".self::IP;}  xong ở ngoài thì là echo $objHCN->getIP();
//

?>