<?php 
$conn = mysqli_connect('127.0.0.1:33067', 'root','') or die('error connect db');
mysqli_select_db($conn, 'test_injection') or die('error select db');


	if(isset($_POST['username'])){
		// $user = $_POST['username'];
		// $pw = $_POST['passwd'];
		
		//sửa
		$user = mysqli_real_escape_string($conn,$_POST['username']);
		$pw = mysqli_real_escape_string($conn,$_POST['passwd']);


		$sql = "SELECT * FROM user where username ='$user' and passwd = '$pw' ";

		echo $sql .'<br>';
		
		$res = mysqli_query($conn, $sql);

		echo "<br>Row found: ". mysqli_num_rows($res);

		while ($row = mysqli_fetch_assoc($res) ){

			echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')';
				print_r($row);
			echo '</pre>';

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>

</head>
<body>
 <form action="" method="post">
 	<input type="text" name="username">
 	<input type="text" name="passwd">
 	<input type="submit" name="">
 </form>

</body>
</html>