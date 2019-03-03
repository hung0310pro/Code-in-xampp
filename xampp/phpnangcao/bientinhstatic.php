<?php

// Lớp động vật
class Animal 
{
    protected  $_name = 'Chưa có tên';
     
    function setName($name){
        $this->_name = $name;
    }
     
    function getName(){
        return $this->_name;
    }
}
 
// Phần 1: Con Vịt
$con_vit = new Animal();
$con_vit->setName('Con Vịt');
echo $con_vit->getName(); 
// Kết quả: Con Vịt
 
// Phần 2: Con Heo
$con_heo = new Animal();
echo $con_heo->getName();
// Kết quả: Chưa có tên
