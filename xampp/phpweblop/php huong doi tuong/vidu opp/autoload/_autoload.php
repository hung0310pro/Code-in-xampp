<?php

// hàm magic __autoload()được gọi tự động khi khởi tạo mới đối tượng mà đối tượng đó không tồn tại
function __autoload($classname){

    echo"class name: ".$classname;

    $file_full_path = __DIR__.'/'.$classname.'.php';
    if(file_exists($file_full_path))
        require_once $file_full_path;
    else
        die("không tồn tại file $file_full_path");
}

$objA = new hinhve();

