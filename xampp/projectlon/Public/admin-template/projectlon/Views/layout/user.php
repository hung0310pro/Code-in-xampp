<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->currentAction ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Public/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Public/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Public/css/blue.css">
    <style>
        #ten1{
          display: none;
        }
        #ten2{
          display: none;
        }
        #user1{
          display: none;
        }
        #email1{
          display: none;
        }
        #email2{
          display: none;
        }
        #password1{
          display: none;
        }
        #password_confirm1{
          display: none;
        }
        #diachi1{
          display: none;
        }
        #userlogin1{
          display:none;
        }
        #passwordlogin1{
          display:none;
        }

        #emailgiohang1{
          display: none;
        }

        #dtgiohang1{
          display: none;
        }
    </style>
</head>
<body class="hold-transition login-page">

<?php $this->showcontent() ?>

<script src="Public/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Public/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="Public/js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

$(document).ready(function() {
  $("#dangky").click(function(){
     var filter = /^[A-Za-z0-9_\.]{3,}@[A-Za-z0-9\-]{2,50}(\.[A-Za-z]{2,10})+$/;   
    
     var hoten = $("#hoten").val();
     var username = $("#username").val();
     var email = $("#email").val();
     var password = $("#password").val();
     var password_confirm = $("#password_confirm").val();
     var diachi = $("#diachi").val();
     var loi = false;
  
     if(hoten == ""){
      $("#ten1").css("display","block");
      loi = true;
     
     }else if(hoten.length < 5){
      $("#ten1").css("display","none");
      $("#ten2").css("display","block");
      loi = true;
     }

     if(username == ""){
      $("#user1").css("display","block");
      loi = true;
     }

     if(email == ""){
      $("#email1").css("display","block");
      loi = true;
     }else if(filter.test(email) == false){
      $("#email1").css("display","none");
      $("#email2").css("display","block");
      loi = true;
     }
     
     if(password == ""){
      $("#password1").css("display","block");
      loi = true;
     }

     if(password_confirm == "" || password_confirm != password){
      $("#password_confirm1").css("display","block");
      loi = true;
     }

    if(diachi == ""){
      $("#diachi1").css("display","block");
      loi = true;
   }
   if(loi == true){
    return false;
   }
  });

  $("#dangnhap").click(function(){
     var userlogin = $("#userlogin").val();
     var passwordlogin = $("#passwordlogin").val();
     var loilogin = false;
     if(userlogin == ""){
      $("#userlogin1").css("display","block");
      loilogin = true;
     }

     if(passwordlogin == ""){
      $("#passwordlogin1").css("display","block");
      loilogin = true;
     }

     if(loilogin == true){
      return false;
     }
  });

  $("#xemhang").click(function(){
   var emailgiohang = $("#emailgiohang").val();
   var dtgiohang = $("#dtgiohang").val();
   var loilogin1 = false;
   if(emailgiohang == ""){
    $("#emailgiohang1").css("display","block");
    loilogin1 = true;
   }

   if(dtgiohang == ""){
    $("#dtgiohang1").css("display","block");
    loilogin1 = true;
   }
    if(loilogin1 == true){
      return false;
     }
});
});



</script>
</body>
</html> 