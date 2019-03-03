<?php
//khởi tạo hàm readName và thiết lập tham số mặc định
function readName($name = 'world')
{
    echo 'hello' . $name;
}

//gọi hàm không truyền tham số
readName(); // kết quả: hello world
echo "<br>";
//gọi hàm có truyền tham số, sẽ thế $name = Tài
readName('Tài'); //kết quả: hello Tài
echo "<br>";
//khởi tạo biến a, và tương tự ở trên
$a = 'Toidicode';
//gọi hàm
readName($a);//kết quả: hello toidicode

echo "<br>";

function tinhtong($b = 3){
	$a = $b + 1;
	echo $a;
}

tinhtong(6);

echo "<br>";

$c = 25;

while($c <= 10){
	$c--;
}

echo $c;  // ra 25 vì k thỏa mãn cái kia