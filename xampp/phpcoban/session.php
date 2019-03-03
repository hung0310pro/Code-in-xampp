<?php
session_start();

$_SESSION['test'] = 'abcd';

$array = [5, 8, 6, 4, 7, 5];
$_SESSION['user'] = $array;

foreach ($_SESSION['user'] as $key => $value) {
	echo $value;
}

// sửa giá trị

$_SESSION['test'] = 'Giá trị mới';

echo $_SESSION['test'];

//xóa 1 session unset($_SESSION['test']);
//xóa hết session unset($_SESSION), session_destroy();