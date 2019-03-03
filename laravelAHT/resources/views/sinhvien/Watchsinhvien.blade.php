@extends('layout.Layout')
@section('noidung')
    <div class="box box-solid box-info" style="border: 1px solid #00a65a;">
        <div class="box-header with-border" style="background: #00a65a;">
            <h3 class="box-title" style="color: white;">Chi tiết sinh viên mượn sách</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <div class="col-md-3">
                    <label>Tên</label>
                    <input type="text" readonly class="form-control"
                           value="<?= $sinhvien['name'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Ngày sinh</label>
                    <input type="date" readonly class="form-control" value="<?= $sinhvien['birthday'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Lớp</label>
                    <input type="text" readonly class="form-control" value="<?= $sinhvien['class'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Tổng sách</label>
                    <input type="text" readonly class="form-control" value="<?= $tongsosach ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label>Đã trả</label>
                    <input type="text" readonly class="form-control" value="<?= $tongsosachct ?>">
                </div>
                <div class="col-md-3">
                    <label>Chưa trả</label>
                    <input type="text" readonly class="form-control" value="<?= $tongsossachdt ?>">
                </div>
                <div class="col-md-3" style="margin-top: 22px;">
                    <a class="btn btn-primary" href="indexsinhvien">Quay lại</a>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 50px;">
                <table id="example2" class="table table-bordered table-hover"
                       style="width: 1000px;margin: auto;text-align: center">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số card</th>
                        <th>Sách</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$a = 0;
					foreach ($mangsach as $key => $value) {
					$a++;
					$b = 0;
					foreach ($value as $val) {
					$b++;
					?>
                    <tr>
						<?php
						if ($b == 1) {
						?>
                        <td rowspan="<?= count($value) ?>"><?= $a ?></td>
                        <td rowspan="<?= count($value) ?>"><?= $key ?></td>
						<?php
						}
						?>
                        <td><?= $val->namebook ?></td>
                    </tr>
					<?php
					}
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