<?php

class dongvat{
	var $conbo;
	var $concho;

	public function FunctionName()
	{
		echo "test hướng đối tượng";
	}
}

class concho extends dongvat {
	public function FunctionName()
	{
		echo "test hướng đối tượng trong lớp con chó";
	}
}

$khoitao = new dongvat();
$khoitao->FunctionName();

echo  "<br>";

$khoitaoconcho = new concho();
$khoitaoconcho->FunctionName();