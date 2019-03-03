@extends('layout.Layout')
@section('noidung')
	<?php

	if(session('updatetm')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('updatetm') ?>
    </div>
	<?php
	}

	?>
	<?php

	if(session('deletetm')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('deletetm') ?>
    </div>
	<?php
	}

	?>

	<?php

	if(session('themtm')){
	?>
    <div class="alert alert-success alert-dismissible">
		<?= session('themtm') ?>
    </div>
	<?php
	}

	?>
    <div class="box box-solid box-info" style="border: 1px solid #00a65a;">
        <div class="box-header with-border" style="background: #00a65a;">
            <h3 class="box-title" style="color: white;">Thông tin thẻ mượn sách của sinh viên</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <div class="col-md-3">
                    <a target="_blank" class="btn btn-primary" href="indexsinhvien">Sinhvien
                        -></a>
                </div>
                <div class="col-md-3">
                    <a target="_blank" class="btn btn-primary" href="indexsach">Sách -></a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="col-md-3" style="margin-left: 140px;">
                    <a target="_blank" href="addthemuon" class="btn btn-success">Thêm mới</a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px;">
                <table id="example2" class="table table-bordered table-hover"
                       style="width: 1000px;margin: auto;text-align: center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số card</th>
                        <th>Ngày mượn</th>
                        <th>Ngày Trả</th>
                        <th>Trạng thái</th>
                        <th>Sinh viên</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$a = 0;
					foreach ($mang as $value) {
					$a++;
					?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $value['id'] ?></td>
                        <td><?= date('d-m-Y', strtotime($value['borrow_date'])); ?></td>
                        <td><?= date('d-m-Y', strtotime($value['pay_date'])); ?></td>
                        <td>
							<?php
							if ($value['state'] == 1) {
							?>
                            Chưa trả
							<?php
							} else if ($value['state'] == 2) {
							?>
                            Đã trả
							<?php
							}
							?>
                        </td>
                        <td><?= $value['id_sinhvien'] ?></td>
                        <td><a target="_blank" href="updatethemuon/<?= $value['id'] ?>"
                               class="btn btn-primary">Update</a></td>
                        <td><a href="deletethemuon/<?= $value['id'] ?>" class="btn btn-danger" onclick="return xoa()">Delete</a>
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