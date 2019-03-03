<?php 
//hàm trả về danh sách sản phẩm
function listSanPhamHome($params=null){
	global $conn;

	$strWhere = '';

	if(isset($params['id_dm']) && $params['id_dm'] >0 )
		$strWhere .= ' tb_san_pham.id_danh_muc = '.$params['id_dm'];

	if(isset($params['id_in_list']))
		$strWhere .= ' tb_san_pham.id IN ('. $params['id_in_list'].') ';



	if($strWhere != '') $strWhere  = ' WHERE '. $strWhere;

	$sql = "SELECT tb_san_pham.*, tb_danh_muc.ten_danh_muc
			FROM  tb_san_pham
			INNER JOIN tb_danh_muc ON tb_san_pham.id_danh_muc = tb_danh_muc.id
			$strWhere

			ORDER BY tb_san_pham.id DESC
			LIMIT 8";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$dataRes = array();
	while($row = mysqli_fetch_assoc($res))
		$dataRes[] = $row;

	return $dataRes;
}

function listDanhMucHome(){
	global $conn ;
	$sql = "SELECT * FROM tb_danh_muc ORDER BY ten_danh_muc ASC";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$dataRes = array();
	while($row = mysqli_fetch_assoc($res))
		$dataRes[] = $row;

	return $dataRes;

}

function loadSP($id){
	global $conn ;
	$sql = "SELECT * FROM tb_san_pham WHERE id = $id";

	$res = mysqli_query($conn, $sql);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	if(mysqli_num_rows($res)==0)
		return "Không xác định sản phẩm id = $id";

	$row = mysqli_fetch_assoc($res);
	
	return $row;
}



function SaveCart($params){
	global $conn;
// $params = array();
// 			$params['dia_chi_giao_hang']  	= $dia_chi_giao_hang;
// 			$params['hinh_thuc_tt']  		= $hinh_thuc_tt;
// 			$params['time']  				= $time;
// 			$params['id_kh']  				= $id_kh;
// 			$params['arr_sp']  				= $arr_sp;
 

	//1. Ghi vào bảng đơn hàng: 
	$sql_dh = "INSERT INTO tb_don_hang (ngay_dat_hang, trang_thai, dia_chi_giao_hang,hinh_thuc_thanh_toan,id_khach_hang)
		VALUES('{$params['time']}',
				0,
				'{$params['dia_chi_giao_hang']}',
				{$params['hinh_thuc_tt']},
				{$params['id_kh']})
	";
	$res_dh = mysqli_query($conn, $sql_dh);
	if(mysqli_errno($conn) !=0)
		return 'Error query: '. mysqli_error($conn);

	$new_id_dh = mysqli_insert_id($conn);

	if($new_id_dh >0){
		// insert thành công đơn hàng ==> ghi chi tiết đơn hàng
		$sql_ctdh = "INSERT INTO tb_tg_sanpham_donhang (id_san_pham,id_don_hang,so_luong,don_gia) VALUES ";

		$str_val= '';
		foreach ($params['arr_sp'] as $item_sp){
			if($str_val != '') $str_val .= ', ';

			$str_val .= " ({$item_sp['id']},$new_id_dh,{$item_sp['soluong']}, {$item_sp['gia_ban']} ) ";
		}

		if($str_val == '')
			return "Không có sản phẩm để ghi đơn hàng.";

		$sql_ctdh .= $str_val; 
		echo "<br> Lenh chi tiet donhang: $sql_ctdh ";

		$res_ctdh = mysqli_query($conn, $sql_ctdh);
		if(mysqli_errno($conn) !=0)
			return 'Error query: '. mysqli_error($conn);
		}


		return mysqli_affected_rows($conn); // trả về số lượng bản ghi bị tác động

}