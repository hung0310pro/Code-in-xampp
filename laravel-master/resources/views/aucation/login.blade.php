@extends('aucation.layout');
@section('noidung')
<?php
if(session('thongbao')){
?>
<div class="alert alert-success alert-dismissible">
   <?= session('thongbao') ?>
</div>
<?php
 }
 ?>
 <?php
if(session('dangnhaptach')){
?>
<div class="alert alert-danger alert-dismissible">
   <?= session('dangnhaptach') ?>
</div>
<?php
 }
 ?>

 @if(count($errors) > 0)
 
  @foreach ($errors->all() as $value) 
  <div class="alert alert-danger alert-dismissible">
   {!! $value !!} 
</div>
@endforeach
@endif
  
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{!! Route('posttranglogin') !!}" method="post">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" id="fullname" name="fullname">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop