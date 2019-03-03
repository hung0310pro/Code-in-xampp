<?php
require("header_dn.php");
$loi = array();
$ho = $ten = $dc_email = $matkhau = $xn_matkhau = $year = $month = $day =$gender = null;
$loi["ho1"] = $loi["ten1"] = $loi["dc_email1"] = $loi["matkhau1"] = $loi["xn_matkhau1"] = $loi["birthday"] = $loi["gender1"] = $loi["error"] = null;
if(isset($_POST["ok"]))
{
	if(empty($_POST["ho"]))
	{
		$loi["ho1"] = "xin mời bạn nhập họ của mình <br>";
	}
	else
	{
		$ho = $_POST["ho"];
	}
	if(empty($_POST["ten"]))
	{
		$loi["ten1"] = "xin mời bạn nhập tên của mình <br>";
	}
	else
	{
		$ten = $_POST["ten"];
	}
	if(empty($_POST["dc_email"]))
	{
		$loi["dc_email1"] = "xin mời bạn nhập email của mình <br>";
	}
	else
	{
		$dc_email = $_POST["dc_email"];
	}
	if(isset($dc_email))
	{
		if(!preg_match("/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/",$dc_email))
		{
			$loi["dc_email1"] =" Bạn chưa nhập đúng định dạng email";
		}
    }
	if(empty($_POST["matkhau"]))
	{
		$loi["matkhau1"] = "xin mời bạn nhập mật khẩu của mình <br>";
	}
	else
	{
		$matkhau = $_POST["matkhau"];
	}
	if(empty($_POST["xn_matkhau"]))
	{
		$loi["xn_matkhau1"] = "xin mời bạn nhập xác nhận mật khẩu của mình <br>";
	}
	else
	{
		$xn_matkhau = $_POST["xn_matkhau"];
	}
	if(isset($matkhau) && isset($xn_matkhau))
	{
		if($matkhau != $xn_matkhau)
		{
			$loi["matkhau1"] = "bạn chưa nhập khớp mật khẩu và xác nhận mật khẩu<br>";
		}
    }
	if(empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"]))
	{
		$loi["birthday"] = "xin mời bạn nhập đầy đủ ngày tháng năm sinh của mình <br>";
	}
	else
	{
		$day = $_POST["day"];
		$month = $_POST["month"];
		$year = $_POST["year"];
	}
	if(empty($_POST["gender"]))
	{
		$loi["gender1"] = "xin mời bạn chọn giới tính của mình <br>";
	}
	else
	{
		$gender = $_POST["gender"];
	}
	if($ho&&$ten&&$dc_email&&$matkhau&&$xn_matkhau&&$day&&$month&&$year&&$gender)
	{
		$ho = addslashes($ho);
		$ten = addslashes($ten);
		$dc_email = addslashes($dc_email);
		$matkhau = addslashes(md5($matkhau));
		$xn_matkhau = addslashes(md5($xn_matkhau));
		$sql_dk1 = "select * from member where dia_chi_email = '".addslashes($dc_email)."' or mat_khau = '".addslashes($matkhau)."'";
		$data_dk1 = $header_dn->get_list($sql_dk1);
		if($data_dk1 > 0)
		{
			foreach ($data_dk1 as $key => $value) {
				if($value["dia_chi_email"] == $dc_email || $value["mat_khau"] == $matkhau)
				{
					$loi["error"] = "địa chỉ email or mật khẩu đã được đăng ký";
			    }
		    }
		}
		if(!$loi["error"])
		{
            $header_dn->insert("member",array(
                 "ho" => $ho,
                 "ten" => $ten,
                 "dia_chi_email" => $dc_email,
                 "mat_khau" => $matkhau,
                 "xac_nham_mk" => $xn_matkhau,
                 "ngay_sinh" => "$year-$month-$day",
                 "gioi_tinh" => $gender
            ));
            echo "Tài khoản đăng kí thành công";
        }
	}
}
?>
<div id="wrapper_dk">
	<div id="wrapperdk">
		<h3>Thông tin cá nhân</h3>
		 <?php echo "<br>"; $header_dn->show_error($loi, 'error'); ?>
		<form action="dangki.php" method="post">
		<table>
			<tr>
				<td><input type="text" name="ho" placeholder="Họ" size="35px;" style="padding: 8px; margin-bottom:30px;">
                  <?php echo "<br>"; $header_dn->show_error($loi, 'ho1'); ?>
				</td>
				<td><input type="text" name="ten" placeholder="Tên" size="35px;" style="padding: 8px;margin-left: 30px; margin-bottom:30px;">
                   <?php echo "<br>"; $header_dn->show_error($loi, 'ten1'); ?>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="dc_email" placeholder="Địa chỉ Email" size="35px;" style="padding: 8px;margin-top:30px;margin-bottom: 30px;">
                     <?php echo "<br>"; $header_dn->show_error($loi, 'dc_email1'); ?>
				</td>
			</tr>
			<tr>
				<td><input type="password" name="matkhau" placeholder="Mật khẩu" size="35px;" style="padding: 8px;margin-top:30px;margin-bottom: 30px;">
                     <?php echo "<br>"; $header_dn->show_error($loi, 'matkhau1'); ?>
				</td>
				<td><input type="password" name="xn_matkhau" placeholder="Xác nhận mật khẩu" size="35px;" style="padding: 8px;margin-top:30px;margin-bottom: 30px;margin-left: 30px;">
                      <?php echo "<br>"; $header_dn->show_error($loi, 'xn_matkhau1'); ?>
				</td>
			</tr>
			<tr>
				<td><span style="color: #888888;font-size: 17px;">Ngày Sinh</span>
                    <tr>
                    	<td>
	                    	<input type="text" name="day" placeholder="DD" size="5px;" style="padding: 8px;margin-right: 15px;">
	                    	<input type="text" name="month" placeholder="MM" size="5px;" style="padding: 8px;margin-right: 15px;">
	                    	<input type="text" name="year" placeholder="YYYY" size="5px;" style="padding: 8px;">
	                    	 <?php echo "<br>"; $header_dn->show_error($loi, 'birthday'); ?>
                       </td>
                    </tr>
				</td>
			</tr>
			<tr>
				<td>
					<select style="padding: 8px;margin-top:30px;border-radius: 5px;" name="gender">
						<option value="1">Nam</option>
						<option value="2">Nữ</option>
					</select>
					 <?php echo "<br>"; $header_dn->show_error($loi, 'gender1'); ?>
			    </td>
			</tr>
			<tr>
				<td><input type="submit" name="ok" value="Gửi đi" style="padding: 8px;margin-top:30px;background: #f7941e;color: white;"></td>
			</tr>
		</table>
	</form>
	</div>
</div>
<?php
require("bottom.php");
?>