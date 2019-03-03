<?php
function __autoload($className){ 
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