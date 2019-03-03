 @extends('aucation.layout')
@section('noidung')
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{!! Route('postthemuser11') !!}">
              @csrf 
              <div class="box-body">
               <div class="col-md-12">
                <div class="col-md-3">
                  <label>Full name</label>
                  <input type="text" name="fullname" id="fullname" class="form-control">
                </div>
                <div class="col-md-3">
                  <label>Email</label>
                  <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="col-md-3">
                  <label>Password</label>
                  <input type="password" name="Password" id="Password" class="form-control">
                </div>

                <div class="col-md-3">
                  <label>Re_password</label>
                  <input type="password" name="re_password" id="re_password" class="form-control">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="col-md-12" style="margin-top: 30px;text-align: center;">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

@stop          