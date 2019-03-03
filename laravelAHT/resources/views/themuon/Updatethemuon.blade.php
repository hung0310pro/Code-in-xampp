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
            <h3 class="box-title" style="color: white;">Update Thẻ mượn cho sinh viên</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <form method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>Ngày mượn</label>
                        <input type="date" name="ngaymuon" class="form-control"
                               value="<?= $themuon['borrow_date'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Ngày trả</label>
                        <input type="date" name="ngaytra" class="form-control"
                               value="<?= $themuon['pay_date'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Trạng thái</label>
                        <select class="form-control chosen-select" name="trangthai">
                            <option value="0">---</option>
                            <option value="1" <?php if ($themuon['state'] == 1) {
								echo 'selected';
							} ?>>Chưa trả
                            </option>
                            <option value="2" <?php if ($themuon['state'] == 2) {
								echo 'selected';
							} ?>>Đã trả
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3" style="margin-top: 23px;">
                        <button name="suathemuon" class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop