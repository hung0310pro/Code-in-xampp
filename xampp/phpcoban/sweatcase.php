<?php
$so = 2;
switch ($so) {
    case 1:   // check điều kiện
        echo "một";  // đây chỉ là ví dụ chứ bt có thể là 1 công việc nào đó
        break;
    case 2:
        echo "hai";
        break;
    case 3:
        echo "ba";
        break;
    case 4:
        echo "bốn";
        break;
    case 5:
        echo "năm";
        break;
    default:  // nếu không có cái nào thỏa mãn
        echo "Số nằm ngoài phạm vi";
        break;
}
