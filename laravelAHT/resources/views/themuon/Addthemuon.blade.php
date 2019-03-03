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
            <h3 class="box-title" style="color: white;">Thêm sinh viên mượn sách</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <form method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>Ngày mượn</label>
                        <input type="date" name="ngaymuon" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Ngày trả</label>
                        <input type="date" name="ngaytra" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Sách</label>
                        <select name="tensach[]" multiple="multiple" class="form-control chosen-select">
							<?php
							foreach ($listSach as $value) {
							?>
                            <option value="<?= $value['id'] ?>"><?= $value['namebook'] ?></option>
							<?php
							}
							?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Sinh viên</label>
                        <select class="form-control chosen-select" name="sinhvien">
                            <option value="0">---</option>
							<?php
							foreach ($listSinhvien as $value) {
							?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
							<?php
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-3">
                        <button class="btn btn-success" name="addmuon">Thêm</button>
                    </div>
                </div>
            </form>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop