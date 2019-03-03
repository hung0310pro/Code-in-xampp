<?php

/*class Foo
{
    public static $so = 10;
    var $so1 = 30;

    function tinh(){
    	self::$so = 20;
    	$this->so1 = 20*self::$so;
    	echo self::$so."<br>";
    	echo $this->so1."<br>";
    }
}

$khoitao = new Foo();

$khoitao->tinh(); //20,400

echo Foo::$so."<br>"; //20
echo $khoitao->so1."<br>"; //400*/

class ConNguoi
{
	static $name = 'Vũ Thanh Tài';

    public static function getName()
    {
       echo ConNguoi::$name;
    }
}

class NguoiLon extends ConNguoi
{
	public function __construct(){
		$this->getName1();
    }

    public function getName1()
    {
        $this->getName();
        echo self::$name;
    }
}

$aaaaa = new NguoiLon();

$aaaaa->hihi = "abc";
echo $aaaaa->hihi;

