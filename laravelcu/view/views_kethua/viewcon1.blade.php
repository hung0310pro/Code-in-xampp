@extends('views_kethua.viewcha'); <!-- tên folder rồi tên file -->

@section('title')
Đây là title của trang 1
@stop

@section('sidebar')
@parent
+Đây là phần section_ sidebar của view con dưới cái của view cha. <br>
@stop

@section('noidung') <!-- nội dung riêng của từng trang -->

+Đây là trang viewcon1 <br>

<?php  $hoten = " <b>Xin chào Lê Mạnh Hùng</b> "?>
<?php //echo $hoten; ?>

<!-- Tương đương vs cách trên thì làm như sau -->
{{ $hoten }}

{!! $hoten !!}  <!-- (sự khác giữa cách viết) -->
<br> <!-- (kiểu if isset trong php thuần đấy) -->
{{$diem or 'không tồn tại biến điểm'}}

@stop

