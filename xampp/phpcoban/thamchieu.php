<?php
$a = 3;
$b = &$a;

$b = 10;

echo $a."<br>";
echo $b."<br>";
//Như các bạn thấy rồi đấy khi $so2 tham khai báo tham chiều đến $so1 thì khi nào $so2 thay đổi $so1 cũng thay đổi theo. 10 10;
