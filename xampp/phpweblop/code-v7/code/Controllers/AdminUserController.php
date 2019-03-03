<?php
// hàm hiển thị danh sách tài khoản
///?controller=admin-user
require_once model_path.'/UserModel.php';

function indexAction(){

	$dataView = array();

	$search_hoten = @$_GET['search_hoten'];
	$search_username = @$_GET['search_username'];
	$search_email = @$_GET['search_email'];
	$order = @$_GET['order'];
	$col = @$_GET['col'];
	// biến page dùng để phân trang
	$page = isset($_GET['page'])?intval($_GET['page']):1; 
	// Kiểm tra hợp lệ của các tham số trước khi truyền vào model



	$params = array();
	$params['search_hoten'] = trim($search_hoten);
	$params['search_username'] = trim($search_username);
	$params['search_email'] = trim($search_email);
	$params['col'] = trim($col);
	$params['order'] = trim($order);
	// $params['page'] = $page; 

	// tính toán 
	// 1. đếm tổng số bản ghi thỏa mãn điều kiện lọc
	$tong_so_ban_ghi = countUser($params);
	if(!is_numeric($tong_so_ban_ghi)){
		// Lỗi SQL 
		die("Loi truy van CSDL: " . $tong_so_ban_ghi);
	}

	//2. Tính ra tổng số trang
	$tong_so_trang = ceil($tong_so_ban_ghi/limit_row_per_page);
	// giới hạn lại chỉ số trang hiện tại trong phạm vi hợp lệ.
	if($page <=0) 
			$page = 1;

	if($page>$tong_so_trang)
	  $page = $tong_so_trang;

	//3. Tìm vị trí sẽ lấy dữ liệu theo số trang hiện tại. 
	$offset = ($page-1) * limit_row_per_page;
  	$params['offset'] = $offset;
  	$params['limit'] = limit_row_per_page;

	// load danh sách tài khoản
	$dataView['listUser'] = listUser($params);
	$dataView['listNhomTK'] = loadListNhomTK();
	$dataView['tong_so_trang'] = $tong_so_trang;
	$dataView['page']= $page;	

 
	RenderView($dataView);
}

function addAction(){
	$dataView = array();

	$dataView['errors'] = array();
	$dataView['success'] = array();

	$dataView['listNhomTK'] = loadListNhomTK();
 

 	if(isset($_POST['txt_ho_ten'])){
 			
 		//1. lấy giá trị post form lên  cho vào mảng
		$hoten = $_POST['txt_ho_ten'];
		$username = $_POST['txt_username'];
		$email = $_POST['txt_email'];
		$passwd = $_POST['txt_passwd'];
		$nhomtk = $_POST['slx_nhomtk'];

	//2. Kiểm tra hợp lệ của dữ liệu
		$errCheck = array();// biến này để lưu thông tin lỗi trong quá trình kiểm tra. 
		$bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,50}$/';

		if(!preg_match($bieuthuc_hoten, $hoten)){
			// họ tên không hợp lệ, 
			$errCheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự.";
		}
		//kiểm tra tiếp với username
		$bieuthuc_username = '/^[A-Za-z0-9_]{5,20}$/';

		if(!preg_match($bieuthuc_username, $username)){
			// họ tên không hợp lệ, 
			$errCheck[] = "Lỗi: Tên đăng nhập không hợp lệ!";
		}
		// làm tương tự với các phần khác.... 

	//3. Gọi hàm trong model để ghi vào CSDL.
		if(count($errCheck)==0){
			// không có lỗi, gọi model ghi vào CSDL
			$dataSave = array();
			$dataSave['hoten'] = $hoten;
			$dataSave['username'] = $username;
			$dataSave['email'] = $email;
			$dataSave['passwd'] = md5($passwd);
			$dataSave['nhomtk'] = $nhomtk;

			$res = saveNewUser($dataSave); // nếu ghi thành công sẽ trả về ID 
			
			if(!is_numeric($res))
				$dataView['errors'][] = $res;
			else
				$dataView['success'][] = "Thêm tài khoản mới thành công. ID=".$res;
		}else{
			// có lỗi
			$dataView['errors'] = $errCheck;
		}
 

 	}
	

	RenderView($dataView);
}