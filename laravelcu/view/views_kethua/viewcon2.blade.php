@extends('views_kethua.viewcha'); <!-- tên folder rồi tên file -->

@section('title')
Đây là title của trang 2
@stop

@section('noidung')


Đây là trang viewcon2 <br>

@for($i = 0 ; $i <= 5 ; $i++)
Các số là {{ $i }} <br>
@endfor

<?php
$array = ['Lê Hùng','Văn Tuấn','Hải Long'];
$array1 = array('so8' => 'Iniesta','so6' => 'Xavi','so10' => 'Messi'); 
?>
@foreach($array as $value)

{{$value}} <br>

@endforeach

@foreach($array1 as $value1)

{{$value1}} <br>

@endforeach

@stop

