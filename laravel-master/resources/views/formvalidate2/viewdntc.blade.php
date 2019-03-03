@if(Auth::check())

Đây là user : <?php echo $user1 ?>
Trang đăng nhập thành công
<a href="{{ url(logoutdn) }}">Logout</a>

$else
<h1>Bạn chưa đăng nhập</h1>

@endif
