<?php
/*$array = array(
    "css",
    "html",
    "php",
    "js"
);
$result = array_pop($array); // loại bỏ phần tử cuối của mảng và trả về nó
echo $result;
echo "<pre>";
   print_r($array);
echo "</pre>";*/

// array_push thêm 1 phần tử vào cuối mảng
// array_shift($array) loại bỏ phần tử đầu tiên của mảng, hàm trả về phần tử đầu tiên đã bị loại bỏ.
// array_unshift() sẽ thêm một hoặc nhiều phần tử vào đầu mảng.Hàm trả về số nguyên là số phần tử của mảng mới được thêm.
// sort($array) -Hàm có tác dụng sắp xếp lại mảng theo chiều tăng dần và trả về giá trị TRUE nếu thành công và ngược lại FALSE nếu không thành công.

//Hàm ksort() sẽ sắp xếp các phần tử của mảng dựa vào khóa(key). Các cặp key => value được giữ nguyên và chúng chỉ được sắp xếp lại theo thứ tự alphabet.

/*$subject = array(
    "php"=>"1",
    "css"=>"2",
    "js"=>"3",
    "html"=>"4"
);
ksort($subject);
foreach ($subject as $key => $val) {
    echo "$key = $val<br />";
}

kq 

css = 2
html = 4
js = 3
php = 1*/

//Hàm natsort() trong php dùng để sắp xếp các phần tử trong mảng. Các phần tử sẽ được sắp xếp dựa theo giá trị của phần tử dựa vào trật tự alphabet.