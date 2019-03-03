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
            <h3 class="box-title" style="color: white;">Chỉnh sửa thông tin sách</h3>
            <div class="box-tools pull-right">
            </div>  <!-- /.box-tools -->
        </div> <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <form method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label>Tên sách</label>
                            <input type="text" name="tensach" class="form-control"
                                   value="<?= $sach['namebook'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Tác giả</label>
                            <input type="text" name="tacgia" class="form-control"
                                   value="<?= $sach['author'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Năm sản xuất</label>
                            <input type="text" name="namsx" class="form-control"
                                   value="<?= $sach['p_year'] ?>">
                        </div>
                        <div class="col-md-3" style="margin-top: 23px;">
                            <button name="suasach" class="btn btn-primary" type="submit">Chỉnh sửa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- /.box-body -->
        <div class="box-footer">
        </div><!-- /.box-body -->
    </div><!-- /.box -->

@stop