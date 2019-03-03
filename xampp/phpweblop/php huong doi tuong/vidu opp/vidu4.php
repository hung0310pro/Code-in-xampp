<?php
class hinhve{
	public $canhA;
	public $canhB;
	public function nhap($a,$b){
		echo __METHOD__;
		$this->canhA = $a;
		$this->canhB = $b;
	}

	public function xuat(){
		echo "<br> canhA = ".$this->canhA." - canhB = ".$this->canhB." - Sai so: ".self::sai_so;

		// self này là trỏ tới hằng trong đối tượng
	}

	protected function dientich(){
		return $this->canhA * $this->canhB;
	}
}

class hinhcn extends hinhve{
	
}

class hinhvuong extends hinhve{
     public function dientich(){
     	return pow($this->canhA,2);
     }
}


/*$objHCN = new hinhcn(); 
$objHCN->nhap(5,7);*/
$objhinhvuong = new hinhvuong(); 
$objhinhvuong->nhap(6,6);

/*echo "<br> Dien tich HCN = ".$objHCN->dientich()*/;
echo "<br> Dien tich hinh vuông = ".$objhinhvuong->dientich();
