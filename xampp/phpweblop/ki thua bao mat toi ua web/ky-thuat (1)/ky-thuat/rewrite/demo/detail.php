<?php
echo md5('hanoi');

echo 'Chi tiet san pham <br>';

$id = $_GET['id'];

echo "ID = $id";


$bai_viet = array('ten'=>'tên bài viết',
	'noi_dung'=>'nội dung bài viêt <script>alert("hello"); window.location="http://facebook.com";</script>'
	);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<h1><?php echo $bai_viet['ten']; ?></h1>
<p><?php
// echo $bai_viet['noi_dung'];  // không bảo mật
// echo htmlentities($bai_viet['noi_dung']);  // an toàn hơn

// nếu không cần thiết hiển thị html thì xóa bỏ luôn thẻ html
echo strip_tags($bai_viet['noi_dung']);

 ?></p>
 
</body>
</html>