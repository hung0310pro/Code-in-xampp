<?php
require("header_dn.php");
$id_sach = intval($_GET["id"]); 
$sql2 = "select ten_sach,gia_ban,gia_goc,gioi_text,ngon_ngu,hinh_thuc,so_trang,kich_thuoc,trong_luong,nam_xuat_ban,hinh_anh from tb_sach where id_sach = $id_sach";
$sql3 = "select a.ma_xb,a.ho_ten,a.id_tg,b.id_sach,b.id_tg from tb_tg as a,tb_viet_sach as b where b.id_sach = $id_sach and a.id_tg = b.id_tg";
$sql4 = "select c.ten_nxb,a.ten_ncc,b.id_ncc,b.id_sach from tb_nxb as c,tb_ncc as a,tb_sach as b where b.id_sach = $id_sach and a.id_ncc = b.id_ncc and b.id_sach = $id_sach and c.id_nxb = b.id_nxb";
$data2 = $header_dn->get_row($sql2);
$data3 = $header_dn->get_row($sql3);
$data4 = $header_dn->get_row($sql4);
?>
<div style="clear: left;"></div>
<div id="chitietsp">
	<div id="bodysp">
		<div id="leftsp">
			<div id="giasp">
				<?php
					echo"<span>".number_format($data2['gia_ban'])."</span><br>";
					echo"<del><span style='background: white;color: #828282;'>".number_format($data2['gia_goc'])."</span></del>";
					echo"<span style='left: -100px;border-radius:200px;top:10px;font-size: 25px;'>25%</span>";
				?>
			</div>
			<?php
				echo"<img src='../image/$data2[hinh_anh]' width='300px'>";
			?>
		</div>
		<div id="rightsp">
			<img src="../image/anh5.jpg" width="700px"  height="170px" style="position: relative;top:-10px;">
			<div id="muasp">
			<?php
				echo"<a href='add_giohang.php?id=$id_sach'>Mua Hàng</a>";
				echo"<a href='index.php' style='margin-left:5px;'>Trở về trang chủ</a>";
			?>
			</div><br><hr>
			<div id="gioithieu">
		    <?php
				echo"<h2>Giới thiệu sản phẩm</h2><br>";
				echo"<h3 style='color: #262657;'>$data2[ten_sach]</h3>";
				echo"<span style='color:  #828282;'>$data2[gioi_text]</span>";
			?>
		</div>
	   </div>
	</div>
	<div style="clear: left;"></div>
	<div id="bottomsp">
		<h2>Thông tin sản phẩm</h2>
		<form>
			<table cellspacing="0">
			<?php	
			    echo"<tr>";
					echo"<td style='width: 300px;'>Mã hàng</td>";
					echo"<td>$data3[ma_xb]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Mã NCC</td>";
					echo"<td>$data4[ten_ncc]</td>";
				echo"</tr>";
			 	echo"<tr>";
					echo"<td>Tác giả</td>";
					echo"<td>$data3[ho_ten]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>NXB</td>";
					echo"<td>$data4[ten_nxb]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Năm XB</td>";
					echo"<td>$data2[nam_xuat_ban]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Trọng lượng (gr)</td>";
					echo"<td>$data2[trong_luong]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Kích thước (cm)</td>";
					echo"<td>$data2[kich_thuoc]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Số trang</td>";
					echo"<td>$data2[so_trang]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Hình thức</td>";
					echo"<td>$data2[hinh_thuc]</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>Ngôn ngữ</td>";
					echo"<td>$data2[ngon_ngu]</td>";
				echo"</tr>";
			?>
			</table>
		</form>
	</div>
</div>
<div style="clear: left;"></div>
<?php
require("bottom.php");
?>