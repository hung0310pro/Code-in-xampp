<?php

//- Không định nghĩa hàm trong lớp,
//- Chỉ sử dung protected và public
//- khi kế thừa thì phải review lại hết các hàm có trong lớp
//- biến thì k có abstract, nhưng hàm thì phải có
//- không thể khởi tạo tới lớp abstract, ví dụ $aaa = new lopabstract() 
abstract class lopabstract
{

	public $name = "";

	abstract public function hamcuaabstract1();

	abstract protected function hamcuaabstract11();

}

abstract class lopabstract1 extends lopabstract
{

	abstract public function hamcuaabstract2();

	abstract protected function hamcuaabstract22();

}

class dongvat extends lopabstract1
{

	public function hamcuaabstract1()
	{
		echo "hamcuaabstract1" . "<br>";
	}

	protected function hamcuaabstract11()
	{
		echo "hamcuaabstract11" . "<br>";
	}

	public function hamcuaabstract2()
	{
		echo "hamcuaabstract2" . "<br>";
	}

	protected function hamcuaabstract22()
	{
		echo "hamcuaabstract22" . "<br>";
	}

}

$khoitaolopdv = new dongvat();
$khoitaolopdv->hamcuaabstract1();
$khoitaolopdv->hamcuaabstract2();





