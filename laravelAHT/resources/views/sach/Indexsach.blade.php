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
	if(session('themsach')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('themsach') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('update')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('update') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('delete')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('delete') ?>
    </div>
	<?php
	}
	?>

    <div class="box box-solid box-info" style="border: 1px solid #00a65a;">
        <div class="box-header with-border" style="background: #00a65a;">
            <h3 class="box-title" style="color: white;">Thông tin sách</h3>
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
                    <a target="_blank" class="btn btn-primary" href="indexsinhvien">Sinh viên -></a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px;">
                <form method="POST" action="{!! Route('themsach') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label>Tên sách</label>
                            <input type="text" name="tensach" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Tác giả</label>
                            <input type="text" name="tacgia" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Năm sản xuất</label>
                            <input type="text" name="namsx" class="form-control">
                        </div>
                        <div class="col-md-3" style="margin-top: 23px;">
                            <button name="themsach" class="btn btn-primary" type="submit">Thêm sách</button>
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
                        <th>Sách</th>
                        <th>Tác giả</th>
                        <th>Năm sản xuất</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$a = 0;
					foreach ($sachs as $value){
					$a++;
					?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $value['namebook'] ?></td>
                        <td><?= $value['author'] ?></td>
                        <td><?= $value['p_year'] ?></td>
                        <td><a target="_blank" href="updatesach/<?= $value['id'] ?>" class="btn btn-primary">Sửa</a>
                        </td>
                        <td><a href="deletesach/<?= $value['id'] ?>" class="btn btn-danger"
                               onclick="return xoa()">Xóa</a></td>
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