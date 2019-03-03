<?php
require("header_dn.php");
$tongtien = 0;
$tongtienvsvat = 0;
?>
<div id="bodygiohang">
	<div id="leftgiohang">
		<?php
		if(!isset($_SESSION["giohang"]))
		{
			$flag = false;
		}
		else
		{
           foreach ($_SESSION["giohang"] as $id_sach => $soluong) {
			if(isset($id_sach))
			{
				$flag = true;
	     	}
	     	else
	     	{ // đã mua nhưng mà xóa sp
		    	$flag = false;
		    }
		}
		}
		if($flag == true)
		{
		foreach ($_SESSION["giohang"] as $id_sach => $soluong) {
		 	$arr[] = "'".$id_sach."'";  // $arr = (''123'',''231'') cái dấu ngoặc đầu là của mảng còn ở trong là ở đoạn dưới nhé
		}
		    $string = implode(",",$arr); // chuyển mảng thành chuỗi
            $sql1 = "select id_sach,hinh_anh,ten_sach,gia_ban from tb_sach where id_sach in ($string)";
			$data1_dn = $header_dn->get_list($sql1);
			echo"<table border='1' cellspacing='0'>";
				echo"<tr>";
					echo"<th>Gỡ Bỏ</th>";
					echo"<th style='width: 100px;'>Hình Ảnh</th>";
					echo"<th style='width: 250px;'>Tên Sản Phẩm</th>";
					echo"<th style='width: 150px;'>Giá</th>";
					echo"<th style='width: 150px;'>Số Lượng</th>";
					echo"<th style='width: 150px;'>Thành Tiền</th>"; 
			    echo"</tr>";
		}
			    if($flag == false)
				{
					echo"<tr>";
					echo"<td colspan='6'>Giỏ hàng chưa có sản phẩm nào</td>";
					echo"</tr>";
					echo"</table>";
					echo"<a href='index.php'>Trở về trang chủ</a>";
				}
				else
				{
                    foreach ($data1_dn as $key1 => $value1) {
                    echo"<tr>";
			    	echo"<td><a href='delete_tungsp.php?id=$value1[id_sach]' style='color: red'>Xóa</a></td>";
			    	echo"<td><a href='#'><img src='../image/$value1[hinh_anh]' width='100px;'></a></td>";
			    	echo"<td>$value1[ten_sach]</td>";
			    	echo"<td style='color: red'>".number_format($value1['gia_ban'])." đ</td>";
			    	echo"<td>";
                        echo"<select style='border: 1px solid black;' class='giohang1' data-id_sach='$value1[id_sach]'>";
                         $soluong = $_SESSION["giohang"][$value1["id_sach"]];
	                       for($i = 1 ; $i <= 100 ; $i++)
	                       {
	                       	   if($i == $soluong)
	                       	   {
	                       	    	echo"<option value='$i' selected='selected'>$i</option>";
	                       	   }
	                       	   else
	                       	   {
	                       	   	    echo"<option value='$i'>$i</option>";// cái này phục vụ cho cart.js khi thay đổi số lượng thôi cái value='$i' ấy
	                       	   }
	                       }
						echo"</select>";
			    	echo"</td>";
			    	$thanhtien = $soluong*$value1['gia_ban'];
			    	$tongtien += $thanhtien; 
                   // cái này ở dưới
			    	$thanhtien2 = $soluong*$value1["gia_ban"] + $soluong*$value1["gia_ban"]*0.1;
                    $tongtienvsvat += $thanhtien2; 
			    	echo"<td style='color: red'>".number_format($thanhtien)." đ</td>";
			        echo"</tr>";
			        }
			    echo"<tr>";			 
					echo"<td colspan='5'>Tổng tiền</td>";
					echo"<td>".number_format($tongtien)." đ</td>";
				echo"</tr>";
			    echo"<tr>";
			    	echo"<td colspan='6' style='text-align: center;'><a href='index.php' style='background: #f39801; padding: 10px;color: white'>Mua Thêm Sản Phẩm</a> <a href='xoahetgiohang.php?id=$id_sach' style='background: #f39801; padding: 10px;color: white'>Xóa Hết Giỏ Hàng</a> <a href='index.php' style='background: #f39801; padding: 10px;color: white'>Quay Lại Trang Chủ</a></td>";
			    echo"</tr>";
			echo"</table>";
		}
		?>
    </div>
    <div id="rightgiohang">
    	<h3 style="color:#444444; ">Giỏ Hàng</h3><br><hr>
    	<?php
    	if($flag == true)
    	{
    		echo"<form>";
    		echo"<table>";
    			echo"<tr>";
    				echo"<td>Thành Tiền:</td>";
    				echo"<td style='color: red'>".number_format($tongtien)." đ</td>";
    			echo"</tr>";
    			echo"<tr>";
    				echo"<td>Phí vận chuyển (Miễn phí vận chuyển):</td>";
    				echo"<td>0 đ</td>";
    			echo"</tr>";
    			echo"<tr>";
    				echo"<td>TỔNG SỐ TIỀN (GỒM VAT 10%):</td>";
    				echo"<td style='color: red'>".number_format($tongtienvsvat)." đ</td>";
    			echo"</tr>";
    			echo"<tr>";
    				echo"<td colspan='2'  style='background: #f39801; padding: 10px;'><a href='add_thanhtoan.php?id=$id_sach' style='background: #f39801; padding: 10px;color: white;'>THANH TOÁN</a></td>";
    			echo"</tr>";
    		echo"</table>";
    		echo"</form>";
    	}
    	?>
    </div>
</div>
<div style="clear: left;"></div>
<?php
require("bottom.php");
?>