<?php

class MyMVC
{
	public function Run()
	{
		$controller = isset($_GET["controller"]) ? $_GET["controller"] : "sinhvien";
		$action = isset($_GET["action"]) ? $_GET["action"] : "getlistsinhvien";

		$tmp_c = str_replace("-", " ", $controller);
		$tmp_c = ucwords($tmp_c);
		$controller_Class = str_replace(" ", "", $tmp_c) . "Controller";

		$tmp_a = str_replace("-", " ", $action);
		$tmp_a = ucwords($tmp_a);
		$action_function = str_replace(" ", "", $tmp_a);
		$action_function = lcfirst($action_function);// chuyển chữ cái đầu tiên về thường
		$objcontroller = new $controller_Class;
		$objcontroller->currentController = ucfirst($controller);
		$objcontroller->currentAction = $action;

		if (method_exists($objcontroller, $action_function)) {
			$objcontroller->$action_function(); //kiểm tra xem có hàm đó không, rồi gọi tới
		} else {
			die('Action <b>' . $controller_Class . '::' . $action_function . '</b> not found!');
		}

		$objcontroller->renderviews();

	}
}