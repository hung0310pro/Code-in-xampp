<?php
require("header.php");
require("tieng_viet_khong_dau.php");
$keyword = null;
?>
    <div class="danh_muc_sach">
        <?php
        $header->connect();
        if(isset($_GET["keyword"]))
        {
        	$keyword = $_GET["keyword"];
        }
        $keyword_khongdau = SpxRemoveCircuflex($keyword);
        $keyword_khongdau1 = str_replace("-"," ",$keyword_khongdau);
        $sql2 = "select id_sach,ten_sach,gia_ban,gia_goc,hinh_anh from tb_sach where ten_sach_khongdau like '%$keyword_khongdau1%'";
        $data_n = $header->get_list($sql2);
        if($data_n == 0 || $keyword == "")
        {  
            echo"<span> Không tìm thấy sản phẩm nào </span>";
        }
        else
        {
        	$number = count($data_n);
	        echo "<span>Tìm thấy $number kết quả với từ khóa $keyword</span> <br>";
			echo"<ul>";
	        foreach ($data_n as $key => $value) {
			echo"<li><a href='chitietsp.php?id=$value[id_sach]'><img src='../image/$value[hinh_anh]' width='140px;'><div style='clear: left;'>$value[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value['gia_goc'])."đ</del></span></div></li>";
	        }
			echo"</ul>";
	    }
	    $header->disconnect();
        ?>
	</div>
<div style="clear: left;"></div>
<?php
require("bottom.php");
?>