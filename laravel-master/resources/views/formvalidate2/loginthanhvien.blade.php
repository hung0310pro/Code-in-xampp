@if(count($errors) > 0)  <!-- nếu có lỗi thì echo ra k thì thôi cái này bên cái dangkythanhviencontroller
 -->
	<ul>
		@foreach($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
@endif

<form action="{!! route('postLogin') !!}" method="post" name="nameform">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="txtuser" id="txtuser"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="txtpass" id="txtpass"></td>
		</tr>
	
		<tr>
			<td><input type="submit" name="gui" value="Gửi" id="gui" ></td>
		</tr>
	</table>
</form>