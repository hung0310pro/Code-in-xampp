$(document).ready(function(){
     $(".giohang1").change(function(){
      var data = {
          so_luong_moi : $(this).val(),
          id_sach : $(this).attr("data-id_sach")
          }
          $.ajax({
              url:"xuligiohang.php",
              type:"post",
              data: data,
              async:true,
              success:function(kq){
                  location.reload();
              }
          });
     });
});