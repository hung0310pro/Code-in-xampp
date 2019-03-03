@extends('layout.Layout')
@section('noidung')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $value)
            <div class="alert alert-danger alert-dismissible">
                {!! $value !!}
            </div>
        @endforeach
    @endif

	<?php
	if(session('themsv')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('themsv') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('suasv')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('suasv') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('deletesv')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('deletesv') ?>
    </div>
	<?php
	}
	?>

    <div class="box box-solid box-info" style="border: 1px solid #00a65a;">
        <div class="box-header with-border" style="background: #00a65a;">
            <h3 class="box-title" style="color: white;">Thông tin sinh viên</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <div class="col-md-3">
                    <a target="_blank" class="btn btn-primary" href="indexthemuon">Thẻ mượn
                        -></a>
                </div>
                <div class="col-md-3">
                    <a target="_blank" class="btn btn-primary" href="indexsach">Sách -></a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px;">
                <form method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label>Tên</label>
                            <input type="text" name="tensv" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Ngày sinh</label>
                            <input type="date" name="ngaysinh" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Tuổi</label>
                            <input type="number" name="tuoi" class="form-control">
                        </div>
                        <div class=" col-md-3">
                            <label>Lớp</label>
                            <input type="text" name="lop" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="col-md-3">
                            <button name="themsv" class="btn btn-primary" type="submit">Thêm sinh viên</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12" style="margin-top: 50px;">
                <table id="example2" class="table table-bordered table-hover"
                       style="width: 1000px;margin: auto;text-align: center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Lớp</th>
                        <th>Chi tiết</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$a = 0;
					foreach ($listSv as $value){
					$a++;
					?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= date('d-m-Y', strtotime($value['birthday'])); ?></td>
                        <td><?= $value['class'] ?></td>
                        <td>
                            <a target="_blank" href="watchsinhvien/<?= $value['id'] ?>" class="btn btn-success">Xem</a>
                        </td>
                        <td>
                            <a target="_blank" href="updatesinhvien/<?= $value['id'] ?>" class="btn btn-primary">Sửa</a>
                        </td>
                        <td>
                            <a href="deletesinhvien/<?= $value['id'] ?>" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                        </td>
                    </tr>
					<?php
					}
					?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-body -->
    </div><!-- /.box -->

@stop