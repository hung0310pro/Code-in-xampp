<?php
class DanhsachController extends Controller{
	public function danhsachtaikhoanAction(){
       $objmodel = new UserModel();
       $row = array();
      
       $row = $objmodel->selectcount("tb_tai_khoan");

         $total_records = $row["total"];
       $this->views->total_record = $total_records;

       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       $this->views->current_pages = $current_page;
       $limit = 5;
       $total_page = ceil($total_records / $limit);
       $this->views->total_pages = $total_page;
       if ($this->views->current_pages > $this->views->total_pages){
            $this->views->current_pages = $this->views->total_pages;
        }
        else if ($this->views->current_pages < 1){
            $this->views->current_pages = 1;
        }
            $start = ($this->views->current_pages - 1) * $limit;
             $list_taikhoan1 = $objmodel->selectlimit("tb_tai_khoan",$start,$limit);
       $this->views->list_taikhoan = $list_taikhoan1;
       if(isset($_POST["timkiem"])){
         $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
         $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
         $search_tk = $objmodel->selecttk($username,$email);
         $this->views_tk = $search_tk;        
       }
	}

	public function deleteuserAction(){
        $this->views->disabled = 1;
        $this->layout->disabled = 1;
        $id = $_GET["id"];
        $objmodel_xoa = new UserModel();
        $res = $objmodel_xoa->delete_row($id);
        if($res === true) {
            header("location:?controller=danhsach&action=danhsachtaikhoan");
        }
        else{
            die($res);
        }
    }

	public function addtaikhoanAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_addtk = new UserModel();
        $nhomtaikhoan = $objmodel_addtk->list_nhom_tk();
        $this->views->adnhomtk = $nhomtaikhoan;
     
        if(isset($_POST["addtk"])){
            $username = $_POST["txt_username"];
            $email =  $_POST["txt_email"];
            $hoten = $_POST["txt_hoten"];
            $password = $_POST["txt_passwd"];
            $diachi = $_POST["txt_diachi"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array(); // biến này kiểm tra xem có thông tin lỗi trong quá trình kiểm tra.
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$hoten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
            $bieuthuc_username = '/^[A-Za-z0-9]{5,20}$/';
            if(!preg_match($bieuthuc_username,$username)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: username không hợp lệ";
            }
            $checktk = $objmodel_addtk->get_listuser($username,$email);
            if(count($checktk) > 0){
                $errcheck[] = "Lỗi: Username or Email đã tồn tại";
            }
          
                if(count($errcheck) == 0){
                    // không có lỗi thì gọi, ghi vào csdl
                    $datasave = array();
                    $datasave["username"] = $username;
                    $datasave["email"] = $email;
                    $datasave["hoten"] = $hoten;
                    $datasave["password"] = $password;
                    $datasave["diachi"] = $diachi;
                    $datasave["key"] = $key;
                    $add = $objmodel_addtk->add_row($datasave); // nếu ghi thành công sẽ trả về ID
                    if(!is_numeric($add)){
                        $this->views->error[] = $add;
                    }
                    else{
                    $_SESSION["themtk"] = "bạn đã thêm tài khoản thành công";
                    header("location:?controller=danhsach&action=danhsachtaikhoan");
                    }
                   
                   
                }
                else{
                    $this->views->error = $errcheck;
                }
            }
	}

	public function updatetaikhoanAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_update = new UserModel();
        $nhomtaikhoan = $objmodel_update->list_nhom_tk();
        $this->views->nhomtk = $nhomtaikhoan;
        $id = $_GET["id"];
     
        if(isset($_POST["update"])){
            $username = $_POST["txt_username"];
            $email =  $_POST["txt_email"];
            $hoten = $_POST["txt_hoten"];
            $password = $_POST["txt_passwd"];
            $diachi = $_POST["txt_diachi"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array(); // biến này kiểm tra xem có thông tin lỗi trong quá trình kiểm tra.
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$hoten)){
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
                    $datasave["hoten"] = $hoten;
                    $datasave["password"] = $password;
                    $datasave["diachi"] = $diachi;
                    $datasave["key"] = $key;
                    $update = $objmodel_update->update_row($datasave,$id); // nếu ghi thành công sẽ trả về ID
                     if(isset($update)){
            
                 $_SESSION["suatk"] = "bạn đã chỉnh sửa tài khoản thành công";
                 header("location:?controller=danhsach&action=danhsachtaikhoan");
             }
                    
                }
                else{
                    $this->views->error = $errcheck;
                }
            }
               $this->views->row = $objmodel_update->get_row($id);

        }
	

    public function listsanphamAction(){
       $objmodel_sach = new UserModel();
      
              $row = array();
      
       $row = $objmodel_sach->selectcount("tb_sach");

         $total_records = $row["total"];
       $this->views->total_record = $total_records;

       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       $this->views->current_pages = $current_page;
       $limit = 4;
       $total_page = ceil($total_records / $limit);
       $this->views->total_pages = $total_page;
       if ($this->views->current_pages > $this->views->total_pages){
            $this->views->current_pages = $this->views->total_pages;
        }
        else if ($this->views->current_pages < 1){
            $this->views->current_pages = 1;
        }
 
            $start = ($this->views->current_pages - 1) * $limit;
             $list_sach = $objmodel_sach->selectlimit("tb_sach",$start,$limit);
       $this->views->list_sach = $list_sach;

       if(isset($_POST["timkiem"])){
        $tensach = isset($_POST["tensach"]) ? trim($_POST["tensach"]) : "";
        $tacgia = isset($_POST["tacgia"]) ? trim($_POST["tacgia"]) : "";
         $search_sp = $objmodel_sach->selecttg($tensach,$tacgia);
         $this->views_sp = $search_sp;   
       }
    }

    public function deletesanphamAction(){
        $this->views->disabled = 1;
        $this->layout->disabled = 1;
        $id = $_GET["id"];
        $objmodel_xoa2 = new UserModel();
        $res = $objmodel_xoa2->delete_rowsp($id);
        if($res === true) {
            header("location:?controller=danhsach&action=listsanpham");
        }
        else{
            die($res);
        }
    }


    public function themsanphamAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_addsp = new UserModel();
        $list_idnv = $objmodel_addsp->list_nv();
        $list_idtk = $objmodel_addsp->list_tk();
        $this->views->list_idnv1 = $list_idnv;
        $this->views->list_idtk1 = $list_idtk;
        $target_dir1 = base_path."Public/image/";
        $target_file1 = $target_dir1 . basename(@$_FILES["txt_hinhanh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        if(isset($_POST["add"])){
            $errcheck = array();
            $tensach = $_POST["txt_tensach"];
            $namxuatban = $_POST["txt_namxuatban"];
            $trongluong = $_POST["txt_trongluong"];
            $kichthuoc = $_POST["txt_kichthuoc"];
            $sotrang = $_POST["txt_sotrang"];
            $hinhthuc = $_POST["txt_hinhthuc"];
            $ngonngu = $_POST["txt_ngonngu"];
            $gioithieu = $_POST["txt_gioithieu"];
            $giagoc = $_POST["txt_giagoc"];
            $giaban = $_POST["txt_giaban"];
            $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
            if($check !== false){
            // Nếu file upload  bị lỗi,
            // Tức là thuộc tính error > 0
                    $hinhanh = $_FILES["txt_hinhanh"]["name"];
                   
                }
                else{
                    $hinhanh = "none";    
            }
            
            $trangthai = $_POST["txt_trangthai"];
            $khuyenmai = $_POST["txt_khuyenmai"];
            $danhgia = $_POST["txt_danhgia"];
            $tacgia = $_POST["txt_tacgia"];
            $nhacungcap = $_POST["txt_nhacungcap"];
            $nhaxuatban = $_POST["txt_nhaxuatban"];
            $manhanvien = $_POST["slx_manv"];
            $mataikhoan = $_POST["slx_mataikhoan"];
            $soluong = $_POST["txt_soluong"];
            $tenkhongdau = $_POST["txt_khongdau"];
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$tensach)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Tên sách không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            } 
            if(count($errcheck) == 0){
                $datasave["tensach"] = $tensach;
                $datasave["namxuatban"] = $namxuatban;
                $datasave["trongluong"] = $trongluong;
                $datasave["kichthuoc"] = $kichthuoc;
                $datasave["sotrang"] = $sotrang;
                $datasave["hinhthuc"] = $hinhthuc;
                $datasave["ngonngu"] = $ngonngu;
                $datasave["gioithieu"] = $gioithieu; 
                $datasave["giagoc"] = $giagoc;
                $datasave["giaban"] = $giaban;
                $datasave["hinhanh"] = $hinhanh;
                $datasave["trangthai"] = $trangthai;
                $datasave["khuyenmai"] = $khuyenmai;
                $datasave["danhgia"] = $danhgia;
                $datasave["tacgia"] = $tacgia;
                $datasave["nhacungcap"] = $nhacungcap; 
                $datasave["nhaxuatban"] = $nhaxuatban;
                $datasave["manhanvien"] = $manhanvien;
                $datasave["mataikhoan"] = $mataikhoan;
                $datasave["soluong"] = $soluong;
                $datasave["tenkhongdau"] = $tenkhongdau;
               
                $add = $objmodel_addsp->add_sp_img($datasave);
                move_uploaded_file($_FILES['txt_hinhanh']['tmp_name'], './Public/image/'.$_FILES['txt_hinhanh']['name']);
                 if(!is_numeric($add)){
                        $this->views->error[] = $add;
                    }
                    else{
                    $_SESSION["themsp"] = "bạn đã thêm sản phẩm thành công";
                    header("location:?controller=danhsach&action=listsanpham");
                    }
                   
                   
                }
                else{
                    $this->views->error = $errcheck;
                } 
            }
    }

    public function updatesanphamAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_updatesp = new UserModel();
        $list_idnv = $objmodel_updatesp->list_nv();
        $list_idtk = $objmodel_updatesp->list_tk();
        $this->views->list_idnv1 = $list_idnv;
        $this->views->list_idtk1 = $list_idtk;
        $id = $_GET["id"];
        $this->views->row = $objmodel_updatesp->get_rowsp($id);
        // upload
        $target_dir = base_path."Public/image/";
        $target_file = $target_dir . basename(@$_FILES["txt_hinhanhmoi"]["name"]); 
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["update"])){
            $errcheck = array();
            $tensach = $_POST["txt_tensach"];
            $namxuatban = $_POST["txt_namxuatban"];
            $trongluong = $_POST["txt_trongluong"];
            $kichthuoc = $_POST["txt_kichthuoc"];
            $sotrang = $_POST["txt_sotrang"];
            $hinhthuc = $_POST["txt_hinhthuc"];
            $ngonngu = $_POST["txt_ngonngu"];
            $gioithieu = $_POST["txt_gioithieu"];
            $giagoc = $_POST["txt_giagoc"];
            $giaban = $_POST["txt_giaban"];
            $check = getimagesize($_FILES["txt_hinhanhmoi"]["tmp_name"]);
            if($check !== false){
            // Nếu file upload  bị lỗi,
            // Tức là thuộc tính error > 0
                    $hinhanhmoi = $_FILES["txt_hinhanhmoi"]["name"];
                   
                }
                else{
                    $hinhanhmoi = "none";    
            }
            
            $trangthai = $_POST["txt_trangthai"];
            $khuyenmai = $_POST["txt_khuyenmai"];
            $danhgia = $_POST["txt_danhgia"];
            $tacgia = $_POST["txt_tacgia"];
            $nhacungcap = $_POST["txt_nhacungcap"];
            $nhaxuatban = $_POST["txt_nhaxuatban"];
            $manhanvien = $_POST["slx_manv"];
            $mataikhoan = $_POST["slx_mataikhoan"];
            $soluong = $_POST["txt_soluong"];
            $tenkhongdau = $_POST["txt_khongdau"];
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$tensach)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Tên sách không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            } 
            
            if(count($errcheck) == 0){
            $datasave = array();
            if($hinhanhmoi == "none"){
                $datasave["tensach"] = $tensach;
                $datasave["namxuatban"] = $namxuatban;
                $datasave["trongluong"] = $trongluong;
                $datasave["kichthuoc"] = $kichthuoc;
                $datasave["sotrang"] = $sotrang;
                $datasave["hinhthuc"] = $hinhthuc;
                $datasave["ngonngu"] = $ngonngu;
                $datasave["gioithieu"] = $gioithieu; 
                $datasave["giagoc"] = $giagoc;
                $datasave["giaban"] = $giaban;
               /* $datasave["hinhanhmoi"] = $hinhanhmoi;*/
                $datasave["trangthai"] = $trangthai;
                $datasave["khuyenmai"] = $khuyenmai;
                $datasave["danhgia"] = $danhgia;
                $datasave["tacgia"] = $tacgia;
                $datasave["nhacungcap"] = $nhacungcap; 
                $datasave["nhaxuatban"] = $nhaxuatban;
                $datasave["manhanvien"] = $manhanvien;
                $datasave["mataikhoan"] = $mataikhoan;
                $datasave["soluong"] = $soluong;
                $datasave["tenkhongdau"] = $tenkhongdau;
                $update = $objmodel_updatesp->update_sp($datasave,$id);
           }else{
                $datasave["tensach"] = $tensach;
                $datasave["namxuatban"] = $namxuatban;
                $datasave["trongluong"] = $trongluong;
                $datasave["kichthuoc"] = $kichthuoc;
                $datasave["sotrang"] = $sotrang;
                $datasave["hinhthuc"] = $hinhthuc;
                $datasave["ngonngu"] = $ngonngu;
                $datasave["gioithieu"] = $gioithieu; 
                $datasave["giagoc"] = $giagoc;
                $datasave["giaban"] = $giaban;
                $datasave["hinhanhmoi"] = $hinhanhmoi;
                $datasave["trangthai"] = $trangthai;
                $datasave["khuyenmai"] = $khuyenmai;
                $datasave["danhgia"] = $danhgia;
                $datasave["tacgia"] = $tacgia;
                $datasave["nhacungcap"] = $nhacungcap; 
                $datasave["nhaxuatban"] = $nhaxuatban;
                $datasave["manhanvien"] = $manhanvien;
                $datasave["mataikhoan"] = $mataikhoan;
                $datasave["soluong"] = $soluong;
                $datasave["tenkhongdau"] = $tenkhongdau;
               
                $update = $objmodel_updatesp->update_sp_img($datasave,$id);
                move_uploaded_file($_FILES['txt_hinhanhmoi']['tmp_name'], './Public/image/'.$_FILES['txt_hinhanhmoi']['name']);  
           }
           
            if(isset($update)){
            
                 $_SESSION["sanpham"] = "bạn đã chỉnh sửa sản phẩm thành công";
                 header("location:?controller=danhsach&action=listsanpham");
             }
            }     
                    
            else{
                $this->views->error = $errcheck;
            }


        }
    }

    public function danhsachnhanvienAction(){
       $objmodel_nv = new UserModel();
    

        $row = array();
      
       $row = $objmodel_nv->selectcount("tb_nhan_vien");

         $total_records = $row["total"];
       $this->views->total_record = $total_records;

       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       $this->views->current_pages = $current_page;
       $limit = 2;
       $total_page = ceil($total_records / $limit);
       $this->views->total_pages = $total_page;
       if ($this->views->current_pages > $this->views->total_pages){
            $this->views->current_pages = $this->views->total_pages;
        }
        else if ($this->views->current_pages < 1){
            $this->views->current_pages = 1;
        }
 
// Tìm Start
            $start = ($this->views->current_pages - 1) * $limit;
             $list_danhsachnv = $objmodel_nv->selectlimit("tb_nhan_vien",$start,$limit);
       $this->views->list_taikhoan_nv  = $list_danhsachnv;   
       if(isset($_POST["timkiem"])){
        $hoten = isset($_POST["hoten"]) ? trim($_POST["hoten"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $search_nv = $objmodel_nv->selectnv($hoten,$email);
         $this->views_nv = $search_nv;   
       
       } 
   }

    public function suanhanvienAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_updatenv = new UserModel();
        $nhomtaikhoan = $objmodel_updatenv->list_nhom_tk();
        $this->views->nhomtk = $nhomtaikhoan;
        $id = $_GET["id"];
        $this->views->row = $objmodel_updatenv->get_row2("tb_nhan_vien",$id);
        if(isset($_POST["update"])){
            $hoten = $_POST["txt_hoten"];
            $ngaysinh = $_POST["txt_ngaysinh"];
            $gioitinh = $_POST["txt_gioitinh"];
            $diachi = $_POST["txt_diachi"];
            $dienthoai = $_POST["txt_dienthoai"];
            $email =  $_POST["txt_email"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array();
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$hoten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
        if(count($errcheck) == 0){
            $datasave["hoten"] = $hoten;
            $datasave["ngaysinh"] = $ngaysinh;
            $datasave["gioitinh"] = $gioitinh;
            $datasave["diachi"] = $diachi;
            $datasave["dienthoai"] = $dienthoai;
            $datasave["email"] = $email;
            $datasave["key"] = $key;
            $update_nv = $objmodel_updatenv->update_nv($datasave,$id); 
            if(isset($update_nv)){
            
                 $_SESSION["suanv"] = "bạn đã chỉnh sửa nhân viên thành công";
                 header("location:?controller=danhsach&action=danhsachnhanvien");
             }
       
           
               
        }
          else{
                $this->views->error = $errcheck;
        } 
    }
    }

    public function deletenvAction(){
        $this->views->disabled = 1;
        $this->layout->disabled = 1;
        $id = $_GET["id"];
        $objmodel_xoa1 = new UserModel();
        $res = $objmodel_xoa1->delete_row1("tb_nhan_vien",$id);
        if($res === true) {
            header("location:?controller=danhsach&action=danhsachnhanvien");
        }
        else{
            die($res);
        }
    }

    public function themnhanvienAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_addnv = new UserModel();
        $nhomtaikhoan = $objmodel_addnv->list_nhom_tk();
        $this->views->adnhomtk = $nhomtaikhoan;
        if(isset($_POST["addnv"])){
            $hoten = $_POST["txt_hoten"];
            $ngaysinh = $_POST["txt_ngaysinh"];
            $gioitinh = $_POST["txt_gioitinh"];
            $diachi = $_POST["txt_diachi"];
            $dienthoai = $_POST["txt_dienthoai"];
            $email =  $_POST["txt_email"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array();
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$hoten)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
        if(count($errcheck) == 0){
            $datasave["hoten"] = $hoten;
            $datasave["ngaysinh"] = $ngaysinh;
            $datasave["gioitinh"] = $gioitinh;
            $datasave["diachi"] = $diachi;
            $datasave["dienthoai"] = $dienthoai;
            $datasave["email"] = $email;
            $datasave["key"] = $key;
            $add = $objmodel_addnv->add_nv($datasave); // nếu ghi thành công sẽ trả về ID
            if(!is_numeric($add)){
                $this->views->error[] = $add;
            }
            else{
                $_SESSION["themnv"] = "bạn đã thêm nhân viên thành công";
                header("location:?controller=danhsach&action=danhsachnhanvien");
            }
        }
        else{
                $this->views->error = $errcheck;
        }
        }
    }
    
    public function danhmucsachAction(){
       $objmodel_dm = new UserModel();
       $row = array();
      
       $row = $objmodel_dm->selectcount("tb_theloai");

       $total_records = $row["total"];
       $this->views->total_record = $total_records;

       $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       $this->views->current_pages = $current_page;
       $limit = 5;
       $total_page = ceil($total_records / $limit);
       $this->views->total_pages = $total_page;
       if ($this->views->current_pages > $this->views->total_pages){
            $this->views->current_pages = $this->views->total_pages;
        }
        else if ($this->views->current_pages < 1){
            $this->views->current_pages = 1;
        }
 
// Tìm Start
            $start = ($this->views->current_pages - 1) * $limit;
             $list_danhsachdm = $objmodel_dm->selectlimit("tb_theloai",$start,$limit);
       $this->views->list_danhmuc = $list_danhsachdm;
         if(isset($_POST["timkiem"])){
            $tendanhmuc = isset($_POST["danhmuc"]) ? trim($_POST["danhmuc"]) : "";
             $search_dm = $objmodel_dm->selectdm($tendanhmuc);
         $this->views_dm = $search_dm; 
         }
        }

    public function suadanhmucAction(){
        $id = $_GET["id"];
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_updatedm = new UserModel();
        $nhomtaikhoan = $objmodel_updatedm->list_nhom_tk();
        $this->views->adnhomtk = $nhomtaikhoan;
        $nhomnv = $objmodel_updatedm->list_nv();
        $this->views->addnhomnv = $nhomnv;
        $this->views->danhmucrow = $objmodel_updatedm->get_row2("tb_theloai",$id);
        if(isset($_POST["updatedm"])){
            $danhmuc = $_POST["txt_danhmuc"];
            $key1 =  $_POST["txt_nv"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array();
        if(count($errcheck) == 0){
            $datasave["danhmuc"] = $danhmuc;
            $datasave["key1"] = $key1;
            $datasave["key"] = $key;
            $updatedm = $objmodel_updatedm->update_dm($datasave,$id); // nếu ghi thành công sẽ trả về ID
            if(isset($updatedm)){
            
                 $_SESSION["suadm"] = "bạn đã chỉnh danh mục viên thành công";
                 header("location:?controller=danhsach&action=danhmucsach");
             }
        }
        else{
                $this->views->error = $errcheck;
        }
        }
    }

    public function themdanhmucAction(){
        $this->views->error = array();
        $this->views->success = array();
        $objmodel_adddm = new UserModel();
        $nhomtaikhoan = $objmodel_adddm->list_nhom_tk();
        $this->views->adnhomtk = $nhomtaikhoan;
        $nhomnv = $objmodel_adddm->list_nv();
        $this->views->addnhomnv = $nhomnv;
        if(isset($_POST["adddm"])){
            $danhmuc = $_POST["txt_danhmuc"];
            $key1 =  $_POST["txt_nv"];
            $key = $_POST["slx_nhomtk"];
            $errcheck = array();
            $bieuthuc_hoten = '/^[ A-Za-z0-9òóọỏõơờớợởỡôồốộổỗÒÓỌỎÕƠỜỚỢỞỠÔỐỔỘỒỖàáạảãăằắặẳẵâầấậẩẫÀÁẠẢÃĂẰẮẶẲẴÂẤẦẬẨẪềếệểêễéèẻẽẹỂẾỆỂÊỄÉÈẺẼẸừứựửữùúụủũỪỨỰỬƯỮÙÚỤỦŨìíịỉĩÌÍỊỈĨỳýỵỷỹỲÝỴỶỸđĐ]{3,100}$/';
            if(!preg_match($bieuthuc_hoten,$danhmuc)){
                // họ tên không hợp lệ
                $errcheck[] = "Lỗi: Họ tên không hợp lệ. Cần nhập chuỗi tiếng Việt từ 3 đến 50 ký tự";
            }
        if(count($errcheck) == 0){
            $datasave["danhmuc"] = $danhmuc;
            $datasave["key1"] = $key1;
            $datasave["key"] = $key;
            $add = $objmodel_adddm->add_dm($datasave); // nếu ghi thành công sẽ trả về ID
            if(!is_numeric($add)){
                $this->views->error[] = $add;
            }
            else{
                $_SESSION["themdm"] = "bạn đã thêm danh mục thành công";
                header("location:?controller=danhsach&action=danhmucsach");
            }
        }
        else{
                $this->views->error = $errcheck;
        }
        }
    }

    public function deletedmAction(){
        $this->views->disabled = 1;
        $this->layout->disabled = 1;
        $id = $_GET["id"];
        $objmodel_xoa2 = new UserModel();
        $res = $objmodel_xoa2->delete_row1("tb_theloai",$id);
        if($res === true) {
            header("location:?controller=danhsach&action=danhmucsach");
        }
        else{
            die($res);
        }        
    }

    public function logoutAction(){
    session_destroy();
    header("location:?controller=index");
    exit();
   }
}

