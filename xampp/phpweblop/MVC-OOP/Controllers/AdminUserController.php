<?php
class AdminUserController extends Controller{
// không cần require Usermodel vì có hàm auto load rồi
    function indexAction(){

        $objModel = new UserModel();
        $danh_sach = $objModel->LoadList();
        $this->view->danh_sach = $danh_sach; //view này là 1 đối tượng

    }

    function addAction(){

        $this->view->error = array();
        $this->view->success = array();

        if(isset($_POST["ok"])){
            $username = $_POST["username"];
            $email =  $_POST["email"];
            $ho_ten = $_POST["ho_ten"];
            $ngay_sinh = $_POST["ngay_sinh"];
            $gioi_tinh = $_POST["gioi_tinh"];
            $dien_thoai = $_POST["dien_thoai"];
            $dia_chi = $_POST["dia_chi"];
            $key = $_POST["key"];
            $errcheck = array(); // biến này kiểm tra xem có thông tin lỗi trong quá trình kiểm tra.
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$ho_ten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
            // kiểm tra tiếp với username
            $bieuthuc_username = '/^[A-Za-z0-9]{5,20}$/';
            if(!preg_match($bieuthuc_username,$username)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: username không hợp lệ";
            }

                if(count($errcheck) == 0){
                    // không có lỗi thì gọi, ghi vào csdl
                    $datasave = array();
                    $datasave["username"] = $username;
                    $datasave["email"] = $email;
                    $datasave["ho_ten"] = $ho_ten;
                    $datasave["ngay_sinh"] = $ngay_sinh;
                    $datasave["gioi_tinh"] = $gioi_tinh;
                    $datasave["dien_thoai"] = $dien_thoai;
                    $datasave["dia_chi"] = $dia_chi;
                    $datasave["key"] = $key;

                    $objmodel = new UserModel();
                    $add = $objmodel->add_row($datasave); // nếu ghi thành công sẽ trả về ID


                    if(!is_numeric($add)){
                        $this->view->error[] = $add;
                    }
                    else{
                        $this->view->success[] = "Thêm tài khoản mới thành công. ID=".$add;
                    }

                }
                else{
                    $this->view->error = $errcheck;
                }
            }
    }

    function deleteAction(){
        $this->view->disabled = 1;
        $this->layout->disabled = 1;
        $id = $_GET["id"];
        $objmodel_xoa = new UserModel();
        $res = $objmodel_xoa->delete_row($id);
        if($res === true) {
            header("location:?controller=admin-user");
        }
        else{
            die($res);
        }
    }

   /* function get_rows(){
        $objmodel_get = new UserModel();
        $id = $_GET["id"];
        $lay_cot = $objmodel_get->get_row($id);
        return $lay_cot;
    }*/

    function updateAction(){

        $this->view->error = array();
        $this->view->success = array();
        $id = $_GET["id"];
      /*  $this->view->get_row = $this->get_rows($id);
        var_dump($this->view->get_row);
        die();*/
        if(isset($_POST["upnow"])){
            $username = $_POST["username"];
            $email =  $_POST["email"];
            $ho_ten = $_POST["ho_ten"];
            $ngay_sinh = $_POST["ngay_sinh"];
            $gioi_tinh = $_POST["gioi_tinh"];
            $dien_thoai = $_POST["dien_thoai"];
            $dia_chi = $_POST["dia_chi"];
            $errcheck = array(); // biến này kiểm tra xem có thông tin lỗi trong quá trình kiểm tra.
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$ho_ten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
            // kiểm tra tiếp với username
            $bieuthuc_username = '/^[A-Za-z0-9]{5,20}$/';
            if(!preg_match($bieuthuc_username,$username)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: username không hợp lệ";
            }

                if(count($errcheck) == 0){
                    // không có lỗi thì gọi, ghi vào csdl
                    $datasave = array();
                    $datasave["username"] = $username;
                    $datasave["email"] = $email;
                    $datasave["ho_ten"] = $ho_ten;
                    $datasave["ngay_sinh"] = $ngay_sinh;
                    $datasave["gioi_tinh"] = $gioi_tinh;
                    $datasave["dien_thoai"] = $dien_thoai;
                    $datasave["dia_chi"] = $dia_chi;
                    $objmodel_update = new UserModel();
                    $update = $objmodel_update->update_row($datasave,$id); // nếu ghi thành công sẽ trả về ID

                    if(!is_numeric($update)){
                        $this->view->error[] = $update;
                    }
                    else{
                        $this->view->success[] = "bạn đã thêm tài khoản thành công";
                    }

                    header("location:?controller=admin-user");

                }
                else{
                    $this->view->error = $errcheck;
                }
            }

               $objmodel_get = new UserModel();
               $this->view->row = $objmodel_get->get_row($id);

        }

}