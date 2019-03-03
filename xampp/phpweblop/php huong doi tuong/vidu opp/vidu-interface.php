<?php
/*Interface là một Template (khuôn mẫu), nó không phải là một lớp đối tượng mà chỉ là một bề nhìn bên ngoài mà nhìn vào đó ta có thể biết được tất cả các hàm của đối tượng implement nó.*/
//Để khai báo một Interface ta dùng từ khóa interface để thay cho từ khóa class. 
//Nếu một đối tượng implement một interface thì nó phải khai báo và định nghĩa tất cả các hàm trong Interface.
// Đối với hằng số ở lớp implement không được định nghĩa lại.
interface HinhVe{
   /* public function PhuongThuc1(){
        echo "Phương thức 1";
    }*/ // không thể viết nhưu ở trên mà chỉ định nghĩa như ở dưới thôi
    public function TinhDienTich();
    public function TinhChuVi();
    public function ABC($thamso);
}

class HinhChuNhat implements HinhVe{  // muốn kế thừa thì dùng cái imolement, ấn alt+enter

    public function TinhDienTich()
    {
        // TODO: Implement TinhDienTich() method.
    }

    public function TinhChuVi()
    {
        // TODO: Implement TinhChuVi() method.
    }

    public function ABC($thamso)
    {
        // TODO: Implement ABC() method.
    }
}

// Interface trong php tuy không phải là một lớp chính hiệu nhưng nó cũng có một tính chất đó là tính kế thừa, nghĩa là một Interface A có thể kế thừa một Interface B thì lúc này đối tượng nào implement lớp A thì nó phải định nghĩa tất cả các hàm mà cả hai lớp A và B đã khai báo.
// ví dụ

interface A {
    public function funcA();
}
  
interface B extends A
{
    public function funcB();
}
  
// Lớp này đúng vì nó khai báo đầy
// đủ các hàm trong A và B
class C implements B
{
    public function funcA()
    {
  
    }
  
    public function funcB()
    {
  
    }
}
  
// Lớp này sai vì nó khai báo mỗi hàm funcA
class D implements B
{
    public function funcA()
    {
  
    }
}
