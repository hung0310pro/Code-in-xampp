<?php
function buildWhereStr($params = null){
	$strWhere = '';

	if(isset($params['search_hoten']) && strlen($params['search_hoten'])>0)
		$strWhere = " WHERE ho_ten like '%{$params['search_hoten']}%' ";

	if(isset($params['search_username']) && strlen($params['search_username'])>0)
		if($strWhere != '')
			$strWhere .= " AND username ='{$params['search_username']}' ";
		else
			$strWhere = " WHERE username ='{$params['search_username']}' ";


	if(isset($params['search_email']) && strlen($params['search_email'])>0)
		if($strWhere != '')
			$strWhere .= " AND email ='{$params['search_email']}' ";
		else
			$strWhere = " WHERE email ='{$params['search_email']}' ";

	return $strWhere;	
}

// đếm tổng số bản ghi có trong CSDL tùy theo điều kiện lọc
// nếu có lỗi thì trả về chuỗi, nếu không có lỗi thì trả về số.
function countUser($params = null){
	global $conn;
	$strWhere = buildWhereStr($params);

	$sql = "SELECT count(*) FROM tb_tai_khoan as tb1
			INNER JOIN tb_nhom_tai_khoan as tb2 
			ON tb1.id_nhom_TK = tb2.id
			{$strWhere} ";
	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$row = mysqli_fetch_row($res);
	return $row[0]; 
}


// hàm lấy danh sách tài khoản.
// Hàm trả về kiểu chuỗi nếu có lỗi, trả kiểu mảng nếu không lỗi.
function listUser($params = null){
	global $conn;
	
 	$strWhere = buildWhereStr($params);

	$order = 'ORDER BY tb1.id DESC';

	if(isset($params['col']) && isset($params['order']) && $params['col'] !='' ) {
		$order = " ORDER BY tb1.{$params['col']}  {$params['order']}";
	}

	if(isset($params['limit'])  && isset($params['offset'])){
		$limit = ' LIMIT '. $params['offset'].', '.$params['limit'];
	}else
		$limit ='';

	// $sql = "SELECT * FROM tb_tai_khoan  {$strWhere} {$order}";
	$sql = "SELECT tb1.id, ho_ten,username, email, tb2.ten_nhom FROM tb_tai_khoan as tb1
			INNER JOIN tb_nhom_tai_khoan as tb2 
			ON tb1.id_nhom_TK = tb2.id
			{$strWhere} {$order} {$limit}";

			// echo $sql;

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$dataRes = array();
	while($row = mysqli_fetch_assoc($res))
		$dataRes[] = $row;

	return $dataRes;
}


function loadListNhomTK(){
	global $conn;
	$sql = "SELECT * FROM tb_nhom_tai_khoan ORDER BY ten_nhom ASC";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$dataRes = array();
	while($row = mysqli_fetch_assoc($res))
		$dataRes[$row['id']] = $row['ten_nhom'];

	return $dataRes;
}

function saveNewUser($params){
  	global $conn;
	$sql = "INSERT INTO tb_tai_khoan(ho_ten,email,username,password, id_nhom_TK) 
			VALUES ('{$params['hoten']}','{$params['email']}','{$params['username']}','{$params['passwd']}',{$params['nhomtk']})";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$new_id = mysqli_insert_id($conn);
	return $new_id;
}


function CheckLogin($username, $passwd){
	global $conn;
	$pass = md5($passwd);

	$sql = "SELECT * FROM tb_tai_khoan WHERE username = '$username' AND password = '$pass' ";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	if(mysqli_num_rows($res) >0 ){ 

		$row = mysqli_fetch_assoc($res);
		mysqli_free_result($res);
		
		return $row;
	}else
		return 'Không tồn tại tài khoản '. $username;
}

