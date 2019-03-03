<?php
$arrHinhThucThanhToan = array(0=>'Tiền mặt',1=>'Chuyển khoản', 2=>'Thanh toán online');

define('hinh_thuc_thanh_toan', serialize($arrHinhThucThanhToan));
// hàm serialize: chuyển mảng thành chuỗi. 


/**
	Hàm load layout và view vào action. $dataView là mảng gồm các phần tử:
	$dataView = array('disable_layout','disable_layout_view', 'data')
*/
function RenderView($dataView){
	global $controller;
	global $action;

 
	if(isset($dataView['disable_layout_view'])){
		// tắt cả layout và view 
		return;
	}
	if(isset($dataView['disable_layout'])){
		// chỉ tắt layout và không tắt view
		$file_view_path = view_path.'/'.$controller.'/'.$action.'.phtml';
		if(file_exists($file_view_path))
			require_once $file_view_path;
		else
			die("File view $file_view_path not found!");
		return;
	}
	// trường hợp mặc định còn lại thì nhúng layout vào.
	$file_layout_path = view_path.'/layout';

	if(substr($controller, 0,5) == 'admin'){
		// nhúng layout của trang quản trị
		$file_layout_path .= '/admin.phtml';
	}else
		$file_layout_path .= '/frontend.phtml';
 
 	// nếu có custom file layout thì gán lại
	if(isset($dataView['layout_file']))
		$file_layout_path = view_path.'/layout/'. $dataView['layout_file'];


		if(file_exists($file_layout_path))
			require_once $file_layout_path;
		else
			die("File layout $file_layout_path not found!");
}

function ShowContent($dataView){
	global $controller;
	global $action;
	 

	$file_view_path = view_path.'/'.$controller.'/'.$action.'.phtml';
		if(file_exists($file_view_path))
			require_once $file_view_path;
		else
			die("File view $file_view_path not found!");

}

// col=abc&order=asc
function CreateLinkSortTable($column){
	$params = $_GET;

	if(isset($params['col']) && $params['col'] == $column)
	{
		// cột hiện tại là cột đã được sắp xếp 1 lần
		if($params['order'] =='asc')
			$params['order'] = 'desc';
		else
			$params['order'] = 'asc';
	}else
	{
		// cột hiện tại chưa được sắp xếp
		$params['order'] = 'asc';
	}
	// kiểm tra kiểu sắp xếp trước khi gán tên cột
	$params['col'] = $column;

	// tạo chuỗi url
	$url = '?';
	foreach($params as $name =>$val){
		if($url !='?')
			$url .='&';
		$url .= $name .'='.$val;
	}

	return $url;
}
// hàm kiểm tra phân quyền.Hàm trả về true hoặc false
function CheckACL($currentController, $currentAction){
	global $conn;
// 	admin-user_index Danh sách
// admin-user_add  thêm tài khoản
// index_index
// index_login
// index_logout
// index_reg
		
		$link_check = $currentController.'_'.$currentAction;
		$arr_default_allow = array('index_index',
			'index_login','index_logout','index_reg',
			'index_danh-sach-san-pham',
			'index_chi-tiet-san-pham',
			'index_add-cart', 'index_show-cart' 
			);

		if(in_array($link_check, $arr_default_allow))
			return true;

		if(empty($_SESSION['auth']))
		{
			// chưa đăng nhập ==> chuyển về trang đăng nhập
			header('Location: '.base_path.'?action=login');
			return false;
		}
		// đến đây thì đã đăng nhập rồi
		if(empty($_SESSION['auth']['permission_allow'])){
			// chưa load quyền trong DB lên session thì load lên 
			$id_nhom_TK = $_SESSION['auth']['id_nhom_TK'];
			$sql = "SELECT tb_phan_quyen.*, tb_chuc_nang_website.url
					FROM  tb_chuc_nang_website
					INNER JOIN tb_phan_quyen ON tb_phan_quyen.id_chuc_nang = tb_chuc_nang_website.id
					WHERE id_nhom_TK = $id_nhom_TK AND trang_thai =1";

			$resCheck = mysqli_query($conn, $sql);
			if(mysqli_errno($conn) !=0)
				die('Error query: '. mysqli_error($conn));

			$tmp = array();
			while($row = mysqli_fetch_assoc($resCheck)){
				$tmp[] = $row['url'];
			}
			$_SESSION['auth']['permission_allow'] = $tmp;
			mysqli_free_result($resCheck);
		}
		if(in_array($link_check, $_SESSION['auth']['permission_allow']))
			return true;
		else
			return false;
}