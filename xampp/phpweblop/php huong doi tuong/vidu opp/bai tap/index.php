<?php
define("_app_path",__DIR__);
require_once _app_path.'/config/database.php';
require_once _app_path.'/model/usermodel.php';

$objmodel = new usermodel();
$danhsach = $objmodel->loadlist();

echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
	print_r($danhsach);
echo '</pre>';