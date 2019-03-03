<html>
<head>
<title></title>
<?php
$image = "";
if(isset($_POST["ok"]))
{
$image=$_FILES["image"]["name"];

if($image)
{
require("csdl.php");
mysql_query("insert into (hinhanh)
		           value('$image')");
					
mysql_close($con);
move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$_FILES["image"]["name"]);  
}
}    // upload 1 hinh anh.
?>
</head>
<body>
<form action="postcsdl.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Hinh anh</td>
<td><input type="file" size="25" name="image" /></td>
</tr>
<tr>
<td>tensp</td>
<td><input type="text" size="25" name="namesp"/></td>
</tr>
<tr>
<td>gia</td>
<td><input type="text" size="25" name="giasp"/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Add" name="ok"/></td>
</tr>
</table>
</form>
</body>
</html>