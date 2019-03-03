<?php
require("header.php");
if(isset($_GET["id"]))
{
	$id = intval($_GET["id"]);
}
?>
<div class="danh_muc_sach">
<?php
    if(isset($id))
    {
	    $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = $id and a.id_sach = b.id_sach ";
	    $data2 = $header->get_list($sql2);
	    if($data2 == 0)
	    {
	    	echo "<span>Chưa có sản phẩm nào cho thể loại này</span>";
	    }
	    else
	    {
			echo"<ul>";
		    foreach ($data2 as $key4 => $value4) {
			echo"<li><a href='chitietsp.php?id=$value4[id_sach]'><img src='../image/$value4[hinh_anh]' width='140px'><div style='clear: left;'>$value4[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value4['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value4['gia_goc'])."đ</del></span></div></li>";
		    }
			echo"</ul>";
	    }
    } 
?>
</div>
<div style="clear: left;"></div>
<?php
require("bottom.php");
?>