<?php
require_once model_path.'/SanPhamModel.php';
require_once model_path.'/UserModel.php';

function indexAction(){
 
	$dataView = array();

	// echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
	// 	print_r($_SESSION);
	// echo '</pre>';




	$dataView['ds_sp']= listSanPhamHome();
	RenderView($dataView);
}

function loginAction(){
	$dataView = array('err'=>array());
	$dataView['layout_file'] = 'login_layout.phtml';

	// echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
	// 	print_r($_POST);
	// echo '</pre>';

	if(isset($_POST['txt_username']))
	{
		$username = $_POST['txt_username'];
	$passwd = $_POST['txt_pass'];
	// kiểm tra hợp lệ của username

	$bieuthuc = '/^[A-Za-z0-9_]{5,30}$/';
	if(!preg_match($bieuthuc, $username)){
		$dataView['err'][] = 'Tên đăng nhập không hợp lệ';
	}

	if(strlen($passwd) <6){
		$dataView['err'][] = 'Password cần nhập ít nhất 6 ký tự';
	}

	if(count($dataView['err'])==0){
		// không có lỗi
		// kiểm tra trong csdl user có hợp lệ không

		$resLogin = CheckLogin($username, $passwd);
		if(is_array($resLogin)){

			unset($resLogin['password']);

			$_SESSION['auth'] = $resLogin;
			header('Location:'.base_path);
		}
		else
		{
			// không phải mảng =+> không đăng nhập được
			$dataView['err'][] =$resLogin; 
		}
	}
	}
	



	RenderView($dataView);
}
function logoutAction(){
	session_unset();
	header('Location:'.base_path);
}
function regAction(){

}

function danhSachSanPhamAction(){
		// lấy danh sách sản phẩm theo danh mục
	$dataView = array();

	$id_danh_muc = intval($_GET['id_dm']);
	// kiểm tra hợp lệ của ID

	$dataView['ds_sp']= listSanPhamHome(array('id_dm'=>$id_danh_muc));
	RenderView($dataView);
}

function chiTietSanPhamAction(){
	// lấy sản phẩm theo ID 
	$dataView = array( 'err'=>array() );


	$id = intval($_GET['id']);


	$dataView['sanpham'] = loadSP($id);
 
	RenderView($dataView);
}

function addCartAction(){
	$id = intval($_GET['id']);
	if($id <1){
		header('Location: '. base_path);
		return;
	}
	

	if(!isset($_SESSION['cart']))
		$_SESSION['cart'] = array();

	if(isset($_SESSION['cart'][$id]))
		$_SESSION['cart'][$id] ++;
	else
		$_SESSION['cart'][$id] = 1;
 
 	header('Location: '. base_path);
}

function showCartAction(){

	$dataView = array( 'err'=>array() );
	if(empty($_SESSION['cart']))
		{
			$dataView['err'][] = 'Bạn chưa chọn sản phẩm để mua';
			return RenderView($dataView);
		}
		// xử lý cập nhật giỏ hàng
	if(isset($_POST['btn_update']))	{

		// [sl_3] => 2
  //   [sl_2] => 1
  //   [sl_1] => 1

		foreach($_POST as $k=>$val){
			if(strpos($k, 'sl_')!== false)
			{
				$id_sp = intval(str_replace('sl_', '', $k));

				if(isset($_SESSION['cart'][$id_sp]))
				{
					if($val <1) 
						unset($_SESSION['cart'][$id_sp]);
					else
						$_SESSION['cart'][$id_sp] = $val;
				}

			}
		}

	}
 

	// đến đây là có sản phẩm trong giỏ hàng

		// lấy danh sách sản phẩm trong CSDL theo các id có trong giỏ hàng
		$arr_id = array_keys($_SESSION['cart']);
		$str_id = implode(',' , $arr_id); // ghép mảng thành chuỗi 

		$lis_san_pham = listSanPhamHome(array('id_in_list'=>$str_id));

		if(!is_array($lis_san_pham))
		{
			$dataView['err'][] = 'Bạn chưa chọn sản phẩm để mua';
			return RenderView($dataView);
		}

		$dataView['list_san_pham'] = $lis_san_pham;
		
		RenderView($dataView); 
}

/**
Hàm gửi đơn hàng 
*/
function submitCartAction(){

	$dataView = array( 'err'=>array() );
	if(empty($_SESSION['cart']))
		{
			$dataView['err'][] = 'Bạn chưa chọn sản phẩm để mua';
			return RenderView($dataView);
		}
	


	// đến đây là có sản phẩm trong giỏ hàng

		// lấy danh sách sản phẩm trong CSDL theo các id có trong giỏ hàng
		$arr_id = array_keys($_SESSION['cart']);
		$str_id = implode(',' , $arr_id); // ghép mảng thành chuỗi 

		$lis_san_pham = listSanPhamHome(array('id_in_list'=>$str_id));

		if(!is_array($lis_san_pham))
		{
			$dataView['err'][] = 'Bạn chưa chọn sản phẩm để mua';
			return RenderView($dataView);
		}

		$dataView['list_san_pham'] = $lis_san_pham;



		if(isset($_POST['btn_submit'])){
			$dia_chi_giao_hang = $_POST['txt_diachi_giao_hang'];
			$hinh_thuc_tt = $_POST['slx_hinh_thuc_tt'];

			$time = date('Y-m-d H:i:s');
			$id_kh = $_SESSION['auth']['id'];

			// tạo mảng danh sách sản phẩm mua:
			$arr_sp = array();
			foreach($_SESSION['cart'] as $id =>$soLuong){

				$thong_tin_sp = array();
				$thong_tin_sp['id'] = $id;
				$thong_tin_sp['soluong'] = $soLuong;
 
				foreach($lis_san_pham  as $row ){

					if($row['id'] == $id){

						$thong_tin_sp['gia_ban'] = $row['gia_ban'];
 
						break;
					}
				}

				$arr_sp [] = $thong_tin_sp;
			}

			echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
				print_r($arr_sp);
			echo '</pre>';

//	gọi model xử lý ghi CSDL

			$params = array();
			$params['dia_chi_giao_hang']  	= $dia_chi_giao_hang;
			$params['hinh_thuc_tt']  		= $hinh_thuc_tt;
			$params['time']  				= $time;
			$params['id_kh']  				= $id_kh;
			$params['arr_sp']  				= $arr_sp;

			$res = SaveCart($params);

			if(!is_numeric($res)){
				$dataView['err'][] = $res;
			}
			else{
				unset($_SESSION['cart']);
				$_SESSION['msg'][] =  'Đơn hàng đã được gửi thành công!'; 
				header("Location:". base_path);
			}

		} 



		
		RenderView($dataView); 
}
