<?php
require("header.php");
?>
			<div id="right">
				<script src="../jssor.slider.devpack/js/jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
              {$Duration:500,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
              {$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
              {$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
              {$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb053 .i {position:absolute;cursor:pointer;}
        .jssorb053 .i .b {fill:#fff;fill-opacity:0.5;}
        .jssorb053 .i:hover .b {fill-opacity:.7;}
        .jssorb053 .iav .b {fill-opacity: 1;}
        .jssorb053 .i.idn {opacity:.3;}

        .jssora093 {display:block;position:absolute;cursor:pointer;}
        .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093:hover {opacity:.8;}
        .jssora093.jssora093dn {opacity:.6;}
        .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:450px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:450px;overflow:hidden;">
            <div>
                <img data-u="image" src="../image/anh1.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh2.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh3.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh4.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh5.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh6.jpg"/>
            </div>
            <div>
                <img data-u="image" src="../image/anh7.jpg"/>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
			</div>
		</div>
		<div style="clear: left;"></div>
		<div id="mybody">
			<div class="danh_muc_sach">
                <?php
                   $sql1 = "select the_loai_sach from tb_the_loai where tb_theloai_id = 1";
                   $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 1 and a.id_sach = b.id_sach ";
                   $data1 = $header->get_row($sql1);
                   $data2 = $header->get_list($sql2);
				echo"<h2 style='margin:10px 0px 10px 43px;'>$data1[the_loai_sach]</h2>";
				echo"<hr>";
				echo"<ul>";
                foreach ($data2 as $key => $value) {
					echo"<li><a href='chitietsp.php?id=$value[id_sach]'><img src='../image/$value[hinh_anh]' width='140px;'><div style='clear: left;'>$value[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value['gia_goc'])."đ</del></span></div></li>";
                }
				echo"</ul>";
                ?>
			</div>
			<div class="danh_muc_sach">
                <?php
                   $sql3 = "select the_loai_sach from tb_the_loai where tb_theloai_id = 2";
                    $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 2 and a.id_sach = b.id_sach ";
                   $data3 = $header->get_row($sql3);
                   $data2 = $header->get_list($sql2);
				echo"<h2 style='margin:10px 0px 10px 43px;'>$data3[the_loai_sach]</h2>";
				echo"<hr>";
				echo"<ul>";
                   foreach ($data2 as $key4 => $value4) {
					echo"<li><a href='chitietsp.php?id=$value4[id_sach]'><img src='../image/$value4[hinh_anh]' width='140px'><div style='clear: left;'>$value4[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value4['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value4['gia_goc'])."đ</del></span></div></li>";
                }
				echo"</ul>";
                ?>
			</div>
             <div style="clear: left;"></div>
			<div class="sach_quang_cao">
                <?php
                    $sql5 = "select the_loai_sach from tb_the_loai where tb_theloai_id = 3";
                     $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 3 and a.id_sach = b.id_sach ";
                    $data5 = $header->get_row($sql5);
                      $data2 = $header->get_list($sql2);
				    echo"<h2 style='margin:10px 0px 10px 43px;'>$data5[the_loai_sach]</h2>";
                ?>
				<hr>
				<div class="left2">
                <?php
					echo"<ul>";
                    foreach ($data2 as $key => $value) {
						echo"<li><a href='chitietsp.php?id=$value[id_sach]'><img src='../image/$value[hinh_anh]' width='140px;' height='200px;'><div style='clear: left;'>$value[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value['gia_goc'])."đ</del></span></div></li>";
                    }
					echo"</ul>";
                ?>
			   </div>
			   <div class="right2">
					<ul>
                    <?php
                    $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 3 and a.id_sach = b.id_sach and a.id_sach = 5";
                    $data3 = $header->get_row("$sql2");
						 echo"<li><a href='chitietsp.php?id=$data3[id_sach]'><img src='../image/$data3[hinh_anh]' width='350px;' height='440px;'></a></li>";
                    ?>
					</ul>

			   </div>
			</div>
             <div style="clear: left;"></div>
			<div class="sach_quang_cao">
				<?php
                    $sql5 = "select the_loai_sach from tb_the_loai where tb_theloai_id = 4";
                    $data5 = $header->get_row($sql5);
                    $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 4 and a.id_sach = b.id_sach ";
                      $data2 = $header->get_list($sql2);
                    echo"<h2 style='margin:10px 0px 10px 43px;'>$data5[the_loai_sach]</h2>";
                ?>
                <hr>
                <div class="left2">
                <?php
                    echo"<ul>";
                    foreach ($data2 as $key => $value) {
                        echo"<li><a href='chitietsp.php?id=$value[id_sach]'><img src='../image/$value[hinh_anh]' width='140px;' height='200px;'><div style='clear: left;'>$value[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value['gia_goc'])."đ</del></span></div></li>";
                    }
                    echo"</ul>";
                ?>
			   </div>
			   <div class="right2">
					<ul>
                    <?php
                         $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 4 and a.id_sach = b.id_sach and a.id_sach = 8";
						$data3 = $header->get_row("$sql2");
                        echo"<li><a href='chitietsp.php?id=$data3[id_sach]'><img src='../image/$data3[hinh_anh]' width='350px;' height='440px;'></a></li>";
                    ?>
					</ul>
			   </div>
			</div>
            <div style="clear: left;"></div>
			<div class="danh_muc_sach">
                <?php
                   $sql3 = "select the_loai_sach from tb_the_loai where tb_theloai_id = 9";
                   $data3 = $header->get_row($sql3);
                   $sql2 = "select a.id_sach,a.ten_sach,a.gia_ban,a.gia_goc,a.hinh_anh,b.id_sach,b.tb_theloai_id from tb_sach as a,tb_theloai_sach as b where b.tb_theloai_id = 9 and a.id_sach = b.id_sach ";
                    $data2 = $header->get_list($sql2);
                echo"<h2 style='margin:10px 0px 10px 43px;'>$data3[the_loai_sach]</h2>";
                echo"<hr>";
                echo"<ul>";
                  foreach ($data2 as $key => $value) {
                    echo"<li><a href='chitietsp.php?id=$value[id_sach]'><img src='../image/$value[hinh_anh]' width='140px;'><div style='clear: left;'>$value[ten_sach]</div></a><div style='clear: left;'><br><span style='background: #77ff33;color:white;padding: 2px;'>".number_format($value['gia_ban'])."đ<br></span><span style='color: #b8b894;'><del>".number_format($value['gia_goc'])."đ</del></span></div></li>";
                }
                echo"</ul>";
                ?>
            </div>
		</div>
<?php
require("bottom.php");
?>