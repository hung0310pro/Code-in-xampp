<?php

/*
+ array_map();
function listthongtin($name,$namsinh){
	echo "Đây là : ".$name." sinh năm : ".$namsinh."<br>";
}

$mang1 = array("Hùng","Tuấn","Long","Đạo","Hoan","Hoàng");
$mang2 = array("96","95","90","96","96","96");

array_map('listthongtin', $mang1,$mang2);
+ kq
Đây là : Hùng sinh năm : 96
Đây là : Tuấn sinh năm : 95
Đây là : Long sinh năm : 90
Đây là : Đạo sinh năm : 96
Đây là : Hoan sinh năm : 96
Đây là : Hoàng sinh năm : 96
*/


/*array_unique();  loại bỏ các phần tử trùng trong mảng kể cả KHÁC KEY
$mang2 = array("96","95","90","96","96","96");
$mang3 = array("a" => "Hùng","b" => "Hùng","c"=> "Tuấn");
$result = array_unique($mang3);
echo "<pre>";
    print_r($result);
echo "</pre>";

$array = array(
    "a" => "php",
    "js",
    "b" => "python",
    "C#",
    "php",
    "abv" => "php",
);
$result = array_unique($array);
echo "<pre>";
    print_r($result);
echo "</pre>";
*/

/* Hàm usort() dùng để sặp xếp một mảng dựa vào hàm so sánh do người dùng định nghĩa. hàm so sánh này sẽ quyết định có đổi vị trí giữa hai phần tử hay không. Nếu hàm so sánh trả về TRUE thì hai phần tử đổi vị trí, ngược lại sẽ giữ nguyên vị trí.

https://freetuts.net/php-function/usort.html

function cmp($a, $b)
{
    if ($a == $b) {
        return 1;
    }
    return ($a > $b) ? 1 : -1;
}
 
$a = array(
    3,
    2,
    5,
    3,
    1
);
 
usort($a, "cmp");
 
foreach ($a as $key => $value) {
    echo "$key: $value<br />";
}

0: 1
1: 2
2: 3
3: 3
4: 5*/

/*+ uksort() dùng để sắp xếp một mảng dựa vào hàm so sánh do người dùng định nghĩa. hàm so sánh này sẽ so sánh hai khóa(key) của hai phần tử liền kề và quyết định có đổi vị trí giữa hai phần tử hay không. Nếu hàm so sánh trả về TRUE thì hai phần tử đổi vị trí, ngược lại sẽ giữ nguyên vị trí.*/

/*+ sort($array, $sort_flag) sẽ sắp xếp TĂNG DẦN các phần tử của một mảng theo thứ tự từ thấp đến cao, nếu sắp xếp theo chữ
thì nếu có chữ hoa và chữ thường thì chữ hoa bh cx đc ưu tiên, nếu 2 chữ đầu giống nhau thì lại so 
sánh chữ đằng sau ví dụ ja... và js.

$array là mảng cần sắp xếp.
$sort_flag là tham số không bắt buộc, quy định kiểu sắp xếp.
SORT_REGULAR :  kiểu mặc định, so sánh bình thường.
SORT_NUMERIC : so sánh dựa vào số.
SORT_STRING :  so sánh dựa vào  chuỗi.
SORT_NATURAL: so sanh theo thứ tự alphabet.
SORT_FLAG_CASE : sử dụng kết hợp với SORT_STRING hoặc SORT_NATURAL để sắp xếp chuỗi mà không phân biệt chữ hoa chư thường.

$subject = array(
    "Php",
    "java",
    "js", 
    "html",
    "jb",
    "ha",
);
sort($subject);
foreach ($subject as $key => $val) {
    echo "subject[" . $key . "] = " . $val . "<br />";
}*/


/*+ array_sum() tính tổng tất cả các phần tử trong mảng. Hàm trả về kết quả là tổng giá trị của các phần tử trong mảng truyền vào.
- Nếu trong các tồn tại các phần tử không phải là số, hàm sẽ bỏ qua các phần tử đó và chỉ cộng các phần tử số.
- nếu mà số ngay đầu chuỗi thì vẫn cộng

$array = array(4,5,24,52,"freetuts.net",'111hung','hung123',"123hu12ng123");
echo "sum = " . array_sum($array);
(4+5+24+52+111+123)
kq = 319*/


/*+Hàm ksort() sẽ sắp xếp TĂNG DẦN các phần tử của mảng dựa vào khóa(key). Các cặp key => value được giữ nguyên và chúng chỉ được sắp xếp lại theo thứ tự alphabet. 
- key là số thì chỉnh bt rồi.
- nếu có chữ hoa thì chữ hoa lại đc sắp xếp lên đầu

$subject = array(
    "php"=>"1",
    "css"=>"2",
    "Js"=>"3",
    "html"=>"4"
);
ksort($subject);
foreach ($subject as $key => $val) {
    echo "$key = $val<br />";
}*/

/*+ krsort ngược lại của ksort
$subject = array(
    "Php"=>"1",
    "css"=>"2",
    "js"=>"3",
    "html"=>"4"
);
krsort($subject);
foreach ($subject as $key => $val) {
    echo "$key = $val<br />";
}
kq là 
js = 3
html = 4
css = 2
Php = 1*/

/*Hàm range() trong php sẽ tạo ra một mảng, các phần tử của mảng là một dãy kí tự do người dùng truyền vào kí tự đầu và cuối.
$start : là phần tử đầu tiên.
$end : là phần tử cuối cùng.
$step : độ chênh lệch của các phần tử liên tiếp, mặc định nếu không chuyền thì $step = 1.

$arr = range('a', 'h' , 2);
echo "<pre>";
   print_r($arr);
echo "</pre>";

KQ Array
(
    [0] => a
    [1] => c
    [2] => e
    [3] => g
)*/

//+ array_push thêm 1 or nhiều phần tử vào CUỐI mảng

//+ array_pop() loại bỏ phần tử CUỐI cùng cua mảng VÀ trả về nó

//+ array_unshift() sẽ thêm một hoặc nhiều phần tử vào ĐẦU mảng.Hàm trả về số nguyên là số phần tử của mảng mới được thêm.

//+ array_shift() loại bỏ phần tử ĐẦU TIÊN của mảng, hàm trả về phần tử ĐẦU TIÊN đã bị loại bỏ.




