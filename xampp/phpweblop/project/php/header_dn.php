<?php
session_start();
$flag = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../web-fonts-with-css/css/fontawesome-all.css">
	<script type="text/javascript" src="../jquery-3.2.1.js"></script>
	<script type="text/javascript" src="giohang.js"></script>
	<style type="text/css">
		table{
			margin-top:70px;
		}
		h2{
			color: #ed7372;
			text-align: center;
		}
		p{
			background-color: red;
			color:white;
			padding: 3px;
			border-radius: 4px;
			font-size: 14px;
			float: right;
		}
		#left{
			z-index: 1;
			position: absolute;
		}
	    #left ul li{
		    padding: 10px;
		    border: 1px solid white;
		    background: white;
		}
		input{
			border-radius: 5px;
		}
	</style>
	<script>
	$(document).ready(function(){
		$("#left ul li").hover(function(){
			$(this).find("ul:eq(0)").show();
			},function(){
		$(this).find("ul:eq(0)").hide();
		});
		$("#left ul li:eq(2)").append("<p>Mới</p>");
	});
</script>
</head>
<body>
	<div id="wrapper">
		<div id="banner">
				<h1>HỘI SÁCH ONLINE</h1>
		</div>
		<div id="top2">
			<ul>
				<li><a href="dangki.php">Đăng kí</a></li>
				<li>|</li>
				<li><a href="dangnhap.php">Đăng nhập</a></li>
			</ul>
		</div>
		<div style="clear: right;"></div>
	   <form action="searchsp.php" method="get">
		<div id="top">
			<a href="index.php"><span style="color: #c92127;font-weight: bold;font-size: 38px; font-style: italic;position: relative;top:5px;left: -57px;">Hà Nội sách</span></a>
					<input type="text" name="keyword" size="90px" style="padding: 11px; border: 2px solid #f7941e;" placeholder="Sản phẩm bạn cần tìm...">
		    
			<i class="fa fa-search" style="position: relative; color: #f7941e;font-size: 20px;position: relative; left: -40px;top:3px;"></i> 
			<?php
               if(!isset($_SESSION["giohang"]))
               {
				echo"<i class='fa fa-shopping-bag' style='position: relative;color:#f7941e; font-size: 35px;left: 45px;top:5px;'><a href='giohang.php'><span style='color: #f7941e;position:relative;left:10px;font-size: 18px;top:-2px;'>Giỏ hàng</span></a></i>";
			   }
			   else
			   {
			   	echo"<i class='fa fa-shopping-bag' style='position: relative;color:#f7941e; font-size: 35px;left: 45px;top:5px;'><a href='giohang.php'><span style='color: #f7941e;position:relative;left:10px;font-size: 18px;top:-2px;'>Giỏ hàng có ".count($_SESSION["giohang"])." Sản phẩm</span></a></i>";
			   }
			?>
		</form>
		</div>
		<div id="body">
			<div id="left" class="left_dn">
				<?php
				/*	require("database.php");
					$header_dn = new database();
					$header_dn->connect();
					$sql = "select tb_theloai_id,the_loai_sach from tb_the_loai";
					$data_dn = $header_dn->get_list($sql);
					echo"<ul>";
						echo"<li style='background-color: #555555;color: white;font-size: 19px;'>Danh Mục";
							echo"<ul>";
							foreach ($data_dn as $key_dn => $value_dn) {
								echo"<li><a href='danhmucsp.php?id=$value_dn[tb_theloai_id]'>$value_dn[the_loai_sach]</a></li>";
							}
					        echo"</ul>";
						echo"</li>";
				    echo"</ul>";*/
			    ?>
			</div>
	 <div style="clear: left;"></div>