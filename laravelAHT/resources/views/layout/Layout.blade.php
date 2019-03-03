<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('css/_all-skins.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
    <style>
        th {
            text-align: center;
        }
    </style>

    <script>
        function xoa() {
            if (confirm("bạn có muốn thật sự xóa không")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>
<body>
@yield('noidung')
<script src="{{ url('js/jquery.min.js')}}"></script>
<script src="{{ url('js/bootstrap.min.js')}}"></script>
<script src="{{ url('js/slick.min.js')}}"></script>
<script src="{{ url('js/nouislider.min.js')}}"></script>
<script src="{{ url('js/jquery.zoom.min.js')}}"></script>
<script src="{{ url('js/main.js')}}"></script>
</body>
</html>

