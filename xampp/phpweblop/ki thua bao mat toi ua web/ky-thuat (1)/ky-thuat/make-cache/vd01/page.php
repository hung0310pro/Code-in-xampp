<?php

// thời gian lưu cache tính theo giây, 7200s = 2h
$cachetime = 200;

//File cache
$cachefile = 'cache/page.html'; 

/*----Nếu file đã được cache----*/ 
// Xuất file cache ra, với 2 điều kiện: có cache và chưa vượt quá cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
 echo "<!-- Cache da tao luc ".date('H:i', filemtime($cachefile))." -->\n";
  //file cache sẽ có thêm nội dung này
 include($cachefile); //Xuất ra nội dung đã cache - file cache
 exit; //ngừng tại đây, không chạy các lệnh bên dưới.
}

/*----Nếu file chưa cache----*/
ob_start(); // Bật buffer cho output

echo "Hello world! Cache Cache";

// Lưu nội dung sau khi file php chạy xong vào file cache
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Dừng buffer, gửi nội dung đến trình duyệt


