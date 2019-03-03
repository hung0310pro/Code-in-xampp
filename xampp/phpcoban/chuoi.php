<?php
//echo "Anh ấy nói \" Toidicode.com dạy lập trình online! \"";

//echo addcslashes("Tôi là Lê Mạnh Hùng",'a..zA..Z'); // thêm dấu gạch chéo; (các chữ từ a đến z kể cả in hoa)

//echo addcslashes("toilalemanhhung",'a'); // thêm dấu chéo sau chữ a


//echo addslashes("To'id'ic\od'e.com"); //-Hàm này sẽ thêm ký tự \ vào trước các ký tự ', ", \ trong chuỗi $str nếu có.

/*
+ strlen đếm số ký tự có trong chuỗi bắt đầu từ 1, đếm cả khoảng trắng nếu có trong chuỗi
$data = "toidico de.com";
echo strlen($data);
kq = 14*/

/*
+ explode($separator, $string, $limit) Hàm này có tác dụng tách chuỗi $string thành nhiều chuỗi khác với điều kiện $separator, và giới hạn $limit.

$data = explode('o', "Toidicode.com");
print_r($data);
output: Array ( [0] => T [1] => idic [2] => de.c [3] => m )
$data = explode('o', "Toidicode.com", 2);
print_r($data);
output: Array ( [0] => T [1] => idicode.com ))*/


/*
+implode($separator, $array) */


/*
+str_replace($find, $replace, $string) hàm này có tác dụng tìm và thay thế phần tử nếu có
trong chuỗi
$data = "toidicode.com";
echo str_replace("t","T",$data);
output: Toidicode.com*/


/*
+trim($string, $charlist) hàm có tác dụng loại bỏ khoảng trắng hoặc các ký tự $charlist trong chuỗi $string.
echo trim(" vũ thanh tài ");
output: Vũ thanh tài
echo trim("Vvũ Thanh Tài", 'V');
output: vũ Thanh Tài*/


/*
+substr(string,start,length)
echo substr("Hello world", 1) . "<br>"; nếu là số dương ở start thì nó sẽ đếm từ bên phải, còn length mà là âm thì nó sẽ đếm từ bên trái. lấy ra những cái chuỗi còn lại
nếu không có length thì lấy từ vị trí start đến hết*/

/*echo substr("Hello world", 1,-3);
kq ello wo */

echo "Anh ấy nói ' Toidicode.com dạy lập trình online!'";