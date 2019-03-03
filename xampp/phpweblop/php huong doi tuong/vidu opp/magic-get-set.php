<?php

class HinhVe{
    public $chieu_dai;
    public function __get($name)
    {
       echo "<br>Ban da get: $name ";
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        echo "<br>Ban gan gia tri cho thuoc tinh $name  = $value";
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "<br>Ban da goi phuong thuc <b>$name</b> voi danh sach tham so: ";
            echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
                    print_r($arguments);
                echo '</pre>';
    }
}

$obj = new HinhVe();
$obj->chieu_dai = 5;
$obj->chieu_cao = 7; // gán giá trị cho thuộc tính không tồn tại: sẽ gọi __set()
echo '<hr>';
echo $obj->chieu_dai;
echo $obj->chieu_rong; // lấy giá trị của thuộc tính không tồn tại sẽ gọi: __get()

$obj->TinhChuVi(2,5); // gọi phương thức không tồn tại: sẽ gọi __call


?>