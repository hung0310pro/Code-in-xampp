@extends('aucation.layout')
@section('noidung')

    <style type="text/css">
        a:hover {
            color: black !important;
        }
    </style>
	<?php
	if(session('dangnhap')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('dangnhap') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('thongbaoupdate')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('thongbaoupdate') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('xoauser')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('xoauser') ?>
    </div>
	<?php
	}
	?>

	<?php
	if(session('themuser')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('themuser') ?>
    </div>
	<?php
	}
	?>
    <div class="box box-solid box-info" style="border: 1px solid #5cb85c;width: 70%;margin: auto;">
        <div class="box-header with-border" style="background: #5cb85c; ">
            <h3 class="box-title">Danh sách user</h3>
            <h4><a href="{!! route('logoutlogin') !!}">Thoát</a></h3>
                <h4><a href="{!! route('themuser11') !!}">Thêm</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->

        <div class="box-body">
            {{ csrf_field() }}
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					foreach ($listuser as $value) {
					?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['fullname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><a target="_blank" href="suauser/<?= $value['id'] ?>" class="btn btn-danger">Sửa</a></td>
                        <td><a class="btn btn-primary" href="xoauser/<?= $value['id'] ?>">Xóa</a></td>
                    </tr>
					<?php
					}
					?>
                    </tbody>
                </table>
            </div>
            <div style="margin-top:20px;" class="col-md-12">
                <div class="col-md-3">
                    <label>Chọn user</label>
                    <select id="user" name="user" class="form-control chosen-select" onchange="chonuser()">
                        <option value="0">---</option>
						<?php
						foreach ($listuser as $val) {
						?>
                        <option value="<?= $val['id'] ?>"><?= $val["fullname"] ?> </option>
						<?php
						}
						?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Email</label>
                    <input type="text" name="email2" class="form-control" id="email2" readonly="readonly">
                </div>

                <div class="col-md-3">
                    <label>Email</label>
                    <select id="email1" name="email1" class="form-control chosen-select" onchange="chonuser()">
                        <option value="0">---</option>
						<?php
						foreach ($listuser as $val) {
						?>
                        <option value="<?= $val['id'] ?>"><?= $val["fullname"] ?> </option>
						<?php
						}
						?>
                    </select>
                </div>
                <div class="col-md-3" style="margin-top:23px;">
                    <button class="btn btn-success" type="button" onclick="vebang()">Thêm</button>
                </div>

            </div>

            <div class="col-md-12" style="margin-top: 15px;">
                <div class="col-md-3">
                    <label>Fullname ajax</label>
                    <input type="text" name="fullnameajax" class="form-control" id="fullnameajax">
                </div>
                <div class="col-md-3">
                    <label>Email ajax</label>
                    <input type="text" name="emailajax" class="form-control" id="emailajax">
                </div>

                <div class="col-md-3">
                    <label>Pass</label>
                    <input type="text" name="password" class="form-control" id="password">
                </div>

                <div class="col-md-3">
                    <label>Re pass</label>
                    <input type="text" name="re_password" class="form-control" id="re_password">
                </div>

                <div class="col-md-3" style="margin-top:23px;">
                    <button class="btn btn-success" type="button" onclick="themajax()">Thêm ajax</button>
                </div>

            </div>
        </div> <!-- /.box-body -->

        <div class="box-footer">
            <div id="show">
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

@stop          