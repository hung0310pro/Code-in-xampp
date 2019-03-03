<?php

$array = ['Tài','Tuấn','Hà'];
foreach ($array as $key => $value) {
	echo $value."<br>";
}

$array[0] = 'Long';
foreach ($array as $key => $value) {
	echo $value."<br>";
}
