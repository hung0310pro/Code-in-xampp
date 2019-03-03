@extends('layout.Layout')
@section('noidung')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $value)
            <div class="alert alert-danger alert-dismissible">
                {!! $value !!}
            </div>
        @endforeach
    @endif

    <div class="box box-solid box-info" style="border: 1px solid #00a65a;">
        <div class="box-header with-border" style="background: #00a65a;">
            <h3 class="box-title" style="color: white;">Update thông tin sinh viên</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <form method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>Tên sinh viên</label>
                        <input type="text" name="tensv" class="form-control"
                               value="<?= $sinhvien['name'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Ngày sinh</label>
                        <input type="date" name="ngaysinh" class="form-control"
                               value="<?= $sinhvien['birthday'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Tuổi</label>
                        <input type="number" name="tuoi" class="form-control"
                               value="<?= $sinhvien['age'] ?>">
                    </div>
                    <div class=" col-md-3">
                        <label>Lớp</label>
                        <input type="text" name="lop" class="form-control" value="<?= $sinhvien['class'] ?>">
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-3">
                        <button name="suasv" class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop