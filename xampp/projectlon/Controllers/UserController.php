<?php
class UserController extends Controller{
	/*public function danhsachtaikhoanAction(){
      
	}*/

	public function registerAction(){

        $this->views->error = array();
        $this->views->success = array();
        if(isset($_POST["dangky"])){
        $errcheck = array();
        $key = 3;
        $hoten = isset($_POST["hoten"]) ? trim($_POST["hoten"]) : "";
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
        $password_confirm = isset($_POST["password_confirm"]) ? trim($_POST["password_confirm"]) : "";
        $diachi = isset($_POST["diachi"]) ? trim($_POST["diachi"]) : "";
            
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
            if(!preg_match($bieuthuc_hoten,$hoten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
            // kiểm tra tiếp với username
            $bieuthuc_username = '/^[A-Za-z0-9]{5,20}$/';
            $dienthoaicheck = '/^(84|0)(1\d{9}|9\d{8})$/';
            if(!preg_match($bieuthuc_hoten,$username)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: username không hợp lệ";
            }
            if(!preg_match($partten, $email)){
            	$errcheck[] = "Lỗi: email không đúng định dạng";
            }

            $username1 = addslashes($username);
            $email1 = addslashes($email);
            $objmodel = new UserModel();
            $get_rowuser = $objmodel->get_listuser($username1,$email1);
            if(count($get_rowuser) > 0){
                $errcheck[] = "Lỗi : Username or Email đã tồn tại";
            } 

            if($password_confirm != $password){
            	$errcheck[] = "Lỗi: bạn phải nhập password trùng với password";
            }

                if(count($errcheck) == 0){
                    // không có lỗi thì gọi, ghi vào csdl
                    $datasave = array();
                    $datasave["hoten"] = ($hoten);
                    $datasave["username"] = ($username);
                    $datasave["email"] = ($email);
                    $datasave["password"] = md5(site_key . $password );
                    $datasave["diachi"] = $diachi;
                    $datasave["key"] = $key;
          
                    $objmodel = new UserModel();
                    $add = $objmodel->add_row($datasave); // nếu ghi thành công sẽ trả về ID


                    if(!is_numeric($add)){
                        $this->views->error[] = $add;
                    }
                    else{
                        $_SESSION["thanhcong"] = "Bạn đã đăng ký thành công";
                        header("location:?controller=user&action=login");
                    }

                }
                else{
                    $this->views->error = $errcheck;
                }
    }
    }

    public function loginAction(){
        $this->views->error = array();
        $this->views->success = array();
        if(isset($_POST["dangnhap"])){
           $errcheck = array();
           $username = isset($_POST["userlogin"]) ? trim($_POST["userlogin"]) : "";
           $password = isset($_POST["passwordlogin"]) ? trim($_POST["passwordlogin"]) : "";
           $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
           if(!preg_match($bieuthuc_hoten,$username)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: username không hợp lệ";
            }
            $username1 = addslashes($username);
            $password1 = addslashes($password);
           $objmodel1 = new UserModel(); 
           $check_login = $objmodel1->check_user($username1,$password1);
           if (count($check_login) > 0 && count($errcheck) == 0) {
               $_SESSION["level"] = $check_login["id_nhom_tai_khoan"];
               $_SESSION["username"] = $check_login["username"];
               if($_SESSION["level"] == 1){
                 header("location:?controller=danhsach&action=danhsachtaikhoan");
               }
               else if( $_SESSION["level"] == 2){
                 header("location:?controller=danhsach&action=listsanpham");
               }
               else{
                  header("location:?controller=index");
               }
           }
           else{
            $this->views->error = $errcheck;
            echo "<div style='color:red;text-align:center;font-size:20px;'>tài khoản này không tồn tại chuyển sang trang <a href='?controller=user&action=register'>Đăng ký</a></div>";
           }

        }
    }

    public function dangnhapgiohangAction(){
      $this->views->error = array();
      $this->views->success = array();
      $ok = new UserModel();
      if(isset($_POST["xemhang"])){
        $errcheck = array();
        $email = isset($_POST["emailgiohang"]) ? trim($_POST["emailgiohang"]) : "";
        $dienthoai = isset($_POST["dtgiohang"]) ? trim($_POST["dtgiohang"]) : "";
        $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
        $dienthoaicheck = '/^(84|0)(1\d{9}|9\d{8})$/';
        if(!preg_match($partten, $email)){
            $errcheck[] = "Lỗi: email không đúng định dạng";
        } 
        if(!preg_match($dienthoaicheck,$dienthoai)){
            $errcheck[] = "Lỗi: điện thoại không đúng định dạng";
        }

        if(count($errcheck) == 0){
           $giohang = $ok->checkgiohang($email,$dienthoai);
           if(count($giohang) > 0){
            $_SESSION["email"] = $email;
            $_SESSION["dienthoai"] = $dienthoai;
         
             header("location:?controller=trangphu-sanpham&action=xemgiohang");
           }
           else{
             echo "<div style='color:red;text-align:center;font-size:20px;'>Email hoặc số điện thoại không tồn tại</div>";
           }
        }
        else{
            $this->views->error = $errcheck;
            
        }
      }
    }


}