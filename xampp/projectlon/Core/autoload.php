<?php
function __autoload($className){ 
    // classname chính là cái tên được gọi tới mà thực chất k có or k require được ví dụ đoạn  $objController = new $controllerClass() thì $className = $controllerClass = str_replace(' ','', $tmp_c) . 'Controller'; // $className = AdminUserController (bên  MyMVC)
    // Các thư mục code sẽ tự động load:
    $arrFolderAutoload = array(
        'Core',
        'Controllers',
        'Models'
    );

    $folderPath = app_path;

    foreach ($arrFolderAutoload as $itemFolder){

        $file_full_path = $folderPath.'/'.$itemFolder.'/'.$className.'.php';

        if(file_exists($file_full_path)){
            require_once $file_full_path;
            return; // nếu có tồn tại thì chỉ require rồi return thoát khỏi hàm
        }
    }
    // nếu không tồn tại thì sẽ xuống dưới này
    die('Class '. $className. ' not found autoload!');
}