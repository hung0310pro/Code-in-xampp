<?php
class SanphamModel extends Database{
	public function SpxRemoveCircuflex($str) {

    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = str_replace(' ', '-', $str); // dung cho url
   $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str); // Removes special chars.
   return preg_replace('/-+/', '-', $str); // Replaces multiple hyphens with single one.
   }


	public function loadlist($table){
		$sql = "select * from ".$table;
		return $this->ExecQuerySelect($sql);
	}

	public function loadlistlimit($table){
		$sql = "select * from ".$table." limit 0,4";
		return $this->ExecQuerySelect($sql);
	}

	public function load_get_row($table,$id){
		$sql = "select * from ".$table." where id = ".$id;
		return $this->Query_Get_Row1($sql);
	}

	public function load_get_rown($id){
		$sql = "select * from tb_binh_luan where id_sach = ".$id." and trang_thai = 'Y'";
		return $this->ExecQuerySelect($sql);
	}

	/*public function load_get_thanhtoan($sql){
		return $this->ExecQuerySelect($sql);
	}*/

	public function loadlistsach_theloai($id){
		$sql = "select a.* from tb_sach as a, tb_theloai_sach as b where a.id = b.id_sach and b.id_theloai = ".$id;
		return $this->ExecQuerySelect($sql);
	}

	public function loadlistsach_theloai1($id){
		$sql = "select a.* from tb_sach as a, tb_theloai_sach as b where a.id = b.id_sach and b.id_theloai = ".$id." limit 0,4";
		return $this->ExecQuerySelect($sql);
	}

		public function loadlistsach_theloaihihi($id){
		$sql = "select count(*) as total from tb_theloai left join tb_theloai_sach on tb_theloai.id = tb_theloai_sach.id_theloai left join tb_sach on tb_sach.id = tb_theloai_sach.id_sach where tb_theloai.id = $id";
		return $this->Query_Get_Row1($sql);
	}

	public function loadlistsach_theloaihaha($id,$start,$limit){
		$sql = "select * from tb_theloai left join tb_theloai_sach on tb_theloai.id = tb_theloai_sach.id_theloai left join tb_sach on tb_sach.id = tb_theloai_sach.id_sach where tb_theloai.id = $id limit $start,$limit";
		return $this->ExecQuerySelect($sql);
	}

	public function listhome($param = null){
		$where = "";
		if(isset($param["in_list_thanhtoan"])){
			$where .= " tb_sach.id IN (".$param["in_list_thanhtoan"].")";
		}

		if($where != ""){
			$where = " where ".$where;
		}

		$sql = "select tb_sach.* from tb_sach ".$where;
		return $this->ExecQuerySelect($sql);
	}
		public function search($search_khongdau){
		$sql = "select * from tb_sach where ten_sach_khong_dau like '%$search_khongdau%'";
		return $this->ExecQuerySelect($sql);
	}

/*	public function search($search_khongdau,$start,$limit){
		$sql = "select * from tb_sach where ten_sach_khong_dau like '%$search_khongdau%' limit $start,$limit";
		return $this->ExecQuerySelect($sql);
	}*/
	public function search1($search_khongdau){
		$sql = "select count(id) as total from tb_sach where ten_sach_khong_dau like '%$search_khongdau%'";
		return $this->Query_Get_Row1($sql);
	}

	public function insert_khachhang($param){
		$sql = "INSERT INTO tb_khach_hang (ho_ten,dien_thoai,dia_chi,email) 
                VALUES ('{$param["hoten"]}','{$param["dienthoai"]}','{$param["diachi"]}','{$param["email"]}')";

	    return $this->Add_Query($sql);
	}

	public function insert_donhang($param){
		$sql = "INSERT INTO tb_don_hang (ngay_mua,trang_thai,id_khach_hang,id_nv,dia_chi_giao_hang,id_tai_khoan,hinh_thuc_thanh_toan) 
                VALUES ('{$param["ngaymua"]}','{$param["trangthai"]}','{$param["idkhach"]}','{$param["nhanvien"]}','{$param["diachi"]}','{$param["taikhoan"]}','{$param["hinhthucthanhtoan"]}')";

	    return $this->Add_Query($sql);
	}

	public function insert_ctdh($param){
		$sql = "INSERT INTO tb_chitiet_donhang (id_don_hang,id_sach,so_luong,gia_ban,triet_khau,ten_sach,hinh_anh) 
                VALUES ('{$param["iddonhang"]}','{$param["idsach"]}','{$param["soluong"]}','{$param["giaban"]}','{$param["trietkhau"]}','{$param["tensach"]}','{$param["hinhanh"]}')";

	    return $this->Add_Query($sql);
	}

	public function updatechinhdonhang($param,$id){
		 $sql = "UPDATE tb_don_hang SET trang_thai = '{$param["trangthai"]}' WHERE id = ".$id;
        return $this->ExcQuery($sql);
	}

	public function donhang($start,$limit){
		$sql = "SELECT * FROM tb_khach_hang LEFT JOIN tb_don_hang ON tb_khach_hang.id = tb_don_hang.id_khach_hang LEFT JOIN tb_chitiet_donhang ON tb_don_hang.id = tb_chitiet_donhang.id_don_hang ORDER BY tb_don_hang.id DESC limit $start,$limit";
		return $this->ExecQuerySelect($sql);
	}

	public function donhang1(){
		$sql = "SELECT count(*) as total FROM tb_khach_hang LEFT JOIN tb_don_hang ON tb_khach_hang.id = tb_don_hang.id_khach_hang LEFT JOIN tb_chitiet_donhang ON tb_don_hang.id = tb_chitiet_donhang.id_don_hang ORDER BY tb_don_hang.id DESC";
		
		return $this->Query_Get_Row1($sql);
	}

	public function insert_cmt($param){
       $sql = "INSERT INTO tb_binh_luan (username,tieu_de,comment,id_sach,thoi_gian_bl,trang_thai) 
                VALUES ('{$param["username"]}','{$param["tieude"]}','{$param["comment"]}','{$param["idsach"]}','{$param["thoigianbl"]}','N')";

	    return $this->Add_Query($sql);
	}

	public function updatecmt($param,$id){
		 $sql = "UPDATE tb_binh_luan SET trang_thai = '{$param["trangthai"]}' WHERE id = ".$id;
        return $this->ExcQuery($sql);
	}

	public function laygiohang($email,$dienthoai){
        $sql = "SELECT * FROM tb_chitiet_donhang LEFT JOIN tb_don_hang ON tb_chitiet_donhang.id_don_hang = tb_don_hang.id LEFT JOIN tb_khach_hang ON tb_don_hang.id_khach_hang = tb_khach_hang.id WHERE email = '".$email."' AND dien_thoai = '".$dienthoai."'";
         return $this->ExecQuerySelect($sql);
	}

	 public function selectcount($table){
        $sql = "SELECT count(id) as total FROM ".$table;
        return $this->Query_Get_Row1($sql);
    }

    public function selectlimit($table,$start,$limit){
        $sql = "SELECT * FROM $table order by id desc LIMIT $start, $limit";
        return $this->ExecQuerySelect($sql);
    }

	

}