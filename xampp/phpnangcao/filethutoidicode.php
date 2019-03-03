<?php

class ParentClass
{
    public static $bienhung = "hùng đại ca";

    function getClass()
    {
        return 'ParentClass';
    }
}

class ChildClass extends ParentClass
{
    var $name = 'ChildClass';

    function getclass()
    {
        return 'ChildClass';
    }

    function getMethod()
    {
        echo 'Đây là phương thức ăn của lớp ' . $this->getclass();
    }

    function getMethodParent()
    {
    	echo 'Đây là thuộc tính của lớp cha với tên ' . parent::$bienhung;
    	// parent::$bienhung; chỉ hoạt động khi $bienhung ở lớp cha là ở dạng tĩnh
        echo 'Đây là phương thức ăn của lớp ' . parent::getclass();
    }
}

$class = new ChildClass();
//$class->getMethod();
//kết quả: Đây là phương thức ăn của lớp Trẻ con
$class->getMethodParent();
//kết quả: Đây là phương thức ăn của lớp Người lớn