<?php session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

define('app_path', __DIR__);
define('ctrl_path', app_path.'/Controllers');
define('view_path', app_path.'/Views');
define('model_path', app_path.'/Models');

define('base_path', '/php0118e2/QLBH/code');
define('template_admin_url', base_path. '/public/admin-template');
define('template_frontend_url', base_path. '/public/frontend');

define('limit_row_per_page', 10);

 

require_once app_path.'/libs/functions.php';
require_once app_path.'/Config/DB.php';

$controller = @$_GET['controller'];
$action 	= @$_GET['action'];

// echo "Controller: $controller  -- Action: $action";




if(empty($controller)) $controller = 'index';
if(empty($action)) $action = 'index';

if(!CheckACL($controller,$action)){
	die('Ban chua duoc cap quyen su dung chuc nang nay!');
}

// Nhúng controller: ?controller = index, ?controller =admin-user
$tmp_c = str_replace('-', ' ', $controller); // admin user 
$tmp_c =  ucwords($tmp_c);    // Admin User 
$controller_filename = str_replace(' ','', $tmp_c) . 'Controller.php';
$controller_file_path = ctrl_path .'/'.$controller_filename;

if(file_exists($controller_file_path))
	require_once $controller_file_path;
else
	die("Controller $controller_filename not found!");
// kiểm tra action
$tmp_a = str_replace('-', ' ', $action); 
$tmp_a =  ucwords($tmp_a); 
$action_name = str_replace(' ','', $tmp_a) .'Action';

if(function_exists($action_name)) // kiểm tra tồn tại hàm 
	$action_name(); // chạy hàm action
else
	die("Action $action_name not found!");




