@if(count($errors) > 0)
	<ul>
		@foreach($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
@endif

<form action="{!! route('post_dang_ky') !!}" method="post" name="nameform">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Môn học</td>
			<td><input type="text" name="monhoc" id="monhoc"></td>
		</tr>
		<tr>
			<td>Tên giảng viên</td>
			<td><input type="text" name="giangvien" id="giangvien"></td>
		</tr>
		<tr>
			<td>Số ĐT</td>
			<td><input type="text" name="dienthoai" id="dienthoai"></td>
		</tr>
		<tr>
			<td><input type="submit" name="gui" value="Gửi" id="gui" ></td>
		</tr>
	</table>
</form>