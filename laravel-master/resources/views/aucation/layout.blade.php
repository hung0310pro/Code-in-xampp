<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('css/blue.css') }}">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

@yield('noidung');

<!-- jQuery 3 -->

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/inalert.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ url('js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ url('js/icheck.min.js')}}"></script>

<!--   <script src="{{ url('js/hamjs.js') }}"></script> -->

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });

    function chonuser() {
        var _token = $("input[name='_token']").val();
        var url = "{{ url('/aucation/chonuser') }}";
        var user = $("#user").val();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: "JSON",
            data: {
                user: user,
                _token: _token,
            },
            success: function (data) {
                $('#email1').empty();
                $.each(data, function (key, value) {
                    $('#email1').append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.email));

                    $("#email2").val(value.email);
                });
                $('#email1').trigger("chosen:updated");
            }
        });
    }

    function vebang() {
        $("#show").append('<input type="text">');
    }

    function themajax() {
        var _token = $("input[name='_token']").val();
        var fullnameajax = $("#fullnameajax").val();
        var emailajax = $("#emailajax").val();
        var password = $("#password").val();
        var re_password = $("#re_password").val();
        var url = "{{ url('/aucation/themdulieumoi') }}";
        $.ajax({
            url: url,
            method: 'POST',
            dataType: "JSON",
            data: {
                fullnameajax: fullnameajax,
                emailajax: emailajax,
                password: password,
                re_password: re_password,
                _token: _token,
            },
            success: function (data) {
                if (data == 1) {
                    makeSAlertright("Thêm thành công", 5000);
                    window.setTimeout(function () {
                        location.reload()
                    }, 1000);
                }
            }
        });
    }


    // phần này cho bài filechayajax
    function themdulieu() {
        var user1 = $("#user1").val();
        var mang = JSON.parse($('#mang').val());
        mang.push(user1);
        $('#mang').val(JSON.stringify(mang));
        vebangchayajax();
    }

    function vebangchayajax() {
        var mang = JSON.parse($('#mang').val());
        var _token = $("input[name='_token']").val();
        var url = "{{ url('/aucation/filechayajax') }}";
        if (mang != null && mang != "") {
            $.ajax({
                url: url,
                method: 'POST',
                dataType: "text",
                data: {
                    mang: mang,
                    _token: _token,
                },
                success: function (data) {
                    $("#show1").html(data);
                }
            });
        }
    }


    function tinhtien() {
        var tienphaidong = rmcomma($("#tienphaidong").val());
        var tiendadong = rmcomma($("#tiendadong").val());
        var conlai = tienphaidong - tiendadong;
        $("#conlai").val(addcomma(conlai));
    }

    function themdulieu2() {
        var mang1 = JSON.parse($('#mang1').val());
        var user2 = $("#user2").val();
        var tienphaidong = rmcomma($("#tienphaidong").val());
        var tiendadong = rmcomma($("#tiendadong").val());
        var conlai = rmcomma($("#conlai").val());
        var ngaydong = $("#ngaydong").val();
        var data = {
            user2: user2,
            tiendadong: tiendadong,
            tienphaidong: tienphaidong,
            conlai: conlai,
            ngaydong: ngaydong,
        };
        mang1.push(data);
        $('#mang1').val(JSON.stringify(mang1));
        vebangchayajax2();
    }

    function vebangchayajax2() {
        var mang1 = JSON.parse($('#mang1').val());
        var _token = $("input[name='_token']").val();
        var url1 = "{{ url('/aucation/filechayajax2') }}";
        $.ajax({
            url: url1,
            method: 'POST',
            dataType: "text",
            data: {
                mang1: mang1,
                _token: _token,
            },
            success: function (data) {
                $("#showaa").html(data);
            }
        });
    }

    function xoauser(id) {
        var mang = JSON.parse($('#mang').val());
        mang.splice(id, 1);
        $('#mang').val(JSON.stringify(mang));
        vebangchayajax();
    }

    function xoaaa(id) {
        var mang1 = JSON.parse($('#mang1').val());
        mang1.splice(id, 1);
        $('#mang1').val(JSON.stringify(mang1));
        vebangchayajax2();
    }

</script>
</body>
</html>

