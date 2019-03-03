<?php date_default_timezone_set("Asia/Ho_Chi_Minh");
class nguoi{
	var $ho_ten;
    protected $gioi_tinh;
	var $ngay_sinh;
    
    public function __construct(){
    	echo "<br> phương thức khởi tạo ";
    }

    public function __destruct(){
		echo "<br> Phương thức hủy đối tượng ";
	}

	public function nhap($ho_ten,$gioi_tinh,$ngay_sinh){
		echo "<br> Phương thức nhập ";
        $this->ho_ten = $ho_ten;
        $this->gioi_tinh = $gioi_tinh;
        $this->ngay_sinh = $ngay_sinh;
        $this->xuat();
	}

	protected function xuat(){
		echo "<br> Phương thức xuất ";
        echo "$this->ho_ten - $this->gioi_tinh - $this->ngay_sinh";
        echo "<br>Tuổi là : ".$this->tinhtuoi();
	}

	private function tinhtuoi(){
		echo "<br> Phương thức tính tuổi ";
		$now = time();
		$tuoi = $now - strtotime($this->ngay_sinh);
		$tuoi = ceil($tuoi/(86400*365));
		return $tuoi;
	}


}

$objN = new nguoi();
$objN->nhap("Nguyễn A","Nam","1996-10-02")."<br>";
echo time()."<br>"; //cái hàm time đáy hình như in ra giây
echo strtotime("1996-10-02");
