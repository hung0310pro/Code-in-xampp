<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('error_reporting', 1);
error_reporting(E_ALL);// in ra hết các lỗi

define('app_path', __DIR__);


define('controller_path', app_path . '/Controllers');
define('view_path', app_path . '/Views');
define('model_path', app_path . '/Models');

require_once app_path . '/Core/autoload.php';
$objMVC = new MyMVC();
$objMVC->Run();

