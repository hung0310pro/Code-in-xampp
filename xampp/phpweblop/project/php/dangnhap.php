<?php
require("header_dn.php");
?>
	<div id="wrapper_dn">
	<h2>ĐĂNG NHẬP HOẶC TẠO TÀI KHOẢN MỚI</h2>
	<div id="left_dn">
		<span style="font-weight: bold;color: #444443;">KHÁCH HÀNG MỚI</span><br>
		<span  style="color:#888888;position: relative;top:50px;">Bằng việc tạo tài khoản trên website chúng tôi, bạn sẽ có thể mua hàng và thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, có thể xem và theo dõi trạng thái đơn hàng, và còn nhiều tiện ích khác nữa...</span><br>
		<input type="submit" name="" value="Tạo Tài Khoản" style="background: #f7941e; color: white;border-radius: 4px; padding: 8px 25px 8px 25px;margin-top:185px;">
	</div>
	<div id="right_dn">
		<span style="font-weight: bold; color: #444443;">KHÁCH HÀNG CŨ</span><br>
		<span style="color:#888888;position: relative;top:30px;">Nếu bạn đã có tài khoản trên website của chúng tôi, vui lòng đăng nhập!</span>
		<table>
			<tr>
				<td><input type="text" name="" size="30" placeholder="Địa chỉ email" style="padding: 8px;"></td>
			</tr>
			<tr>
				<td><input type="password" name="" size="30" placeholder="Mật Khẩu" style="padding: 8px;margin-top:40px;margin-bottom:40px;"></td>
			</tr>
			<tr>
				<td><a href="quenmk.php"><span style="color: red;">Quên mật khẩu ?</span></a></td>
                <td><input type="submit" name="" value="Đăng Nhập" style="background: #f7941e; color: white; padding: 8px 25px 8px 25px;margin-left: -150px;"></td>
			</tr>
		</table>
	</div>
    </div>
    <div style="clear: left;"></div>
<?php
require("bottom.php");
?>