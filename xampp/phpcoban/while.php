<?php
$i1 = 0; // khởi tạo biến  (nếu nó lớn hơn 10 thì k chạy gì trong while nữa)
while ($i1 <= 10 /* điều kiện dừng*/) {
     // echo $i1 . "<br>"; nếu ở đây thì từ 0 -> 10;
    $i1++; //sau mỗi lần lặp biến $i tăng thêm 1 đơn vị
    echo $i1 . "<br>";// in ra số 1 -> 11
    
}

//echo $i1; // ra kết quả là 11 vì nó chạy hết trong while rồi ms ra đây

/*$i = 0;
while ($i <= 10) {
    $j = $i;
    while ($j <= 10) {
        echo "*";
        $j++;
    }
    echo "<br>";
    $i++;
}
?>*/