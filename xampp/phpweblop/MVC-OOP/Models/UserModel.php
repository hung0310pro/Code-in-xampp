<?php
class UserModel extends Database{

	public function LoadList (){
		$sql = "SELECT * FROM tai_khoan ";

		return $this->ExecQuerySelect($sql);
	}

	public function  get_row($id){
	    $sql = "SELECT username, email, ho_ten, ngay_sinh, gioi_tinh, dien_thoai, dia_chi FROM tai_khoan
                WHERE id_tai_khoan = $id";


	    return $this->Query_Get_Row($sql);
    }

	public function delete_row($id){
	    $sql = "delete from tai_khoan where id_tai_khoan = $id";
	    return $this->Delete_Query($sql);
    }

    public function add_row($param){
	    $sql = "INSERT INTO tai_khoan (username,email,ho_ten,gioi_tinh,dien_thoai,dia_chi,id_nhom_tai_khoan) 
                VALUES ('{$param["username"]}','{$param["email"]}','{$param["ho_ten"]}',
                '{$param["ngay_sinh"]}','{$param["dien_thoai"]}','{$param["dia_chi"]}','{$param["key"]}')";

	    return $this->Add_Query($sql);
    }

    public function update_row($param,$id)
    {

        $sql = "UPDATE tai_khoan SET username = '{$param["username"]}',ngay_sinh = '{$param["ngay_sinh"]}',
                email = '{$param["email"]}',ho_ten = '{$param["ho_ten"]}',
                gioi_tinh = '{$param["gioi_tinh"]}',dien_thoai = '{$param["dien_thoai"]}',dia_chi = '{$param["dia_chi"]}'
                WHERE id_tai_khoan = $id";
        return $this->ExcQuery($sql);
    }

}