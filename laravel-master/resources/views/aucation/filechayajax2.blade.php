@extends('aucation.layout')
@section('noidung')

<br><br>
  <div class="box box-solid box-info" style="border: 1px solid #5cb85c;width: 70%;margin: auto;">
    <div class="box-header with-border" style="background: #5cb85c; ">
        <h3 class="box-title">ajax2</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>  <!-- /.box-tools -->
    </div> <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-12">
    {{ csrf_field() }}  
       <div class="col-md-3">
                <label>Chọn user</label>
                <select id="user2" name="user2" class="form-control chosen-select">
                  <option value="0">---</option>
                  <?php
                  foreach ($listuser2 as $val) {
                  ?>
                  <option value="<?= $val['id'] ?>"><?= $val["fullname"] ?> </option>
                  <?php
                }
                  ?>
                </select>
      </div>
      <div class="col-md-3">
        <label>Số tiền phải đóng</label>
        <input type="text" name="tienphaidong" onkeyup="addcomma1(this)" id="tienphaidong" class="form-control" onchange="tinhtien()"> 
      </div>
       <div class="col-md-3">
        <label>Tiền đã đóng</label>
        <input type="text" name="tiendadong" onkeyup="addcomma1(this)" id="tiendadong" class="form-control" onchange="tinhtien()"> 
      </div>
       <div class="col-md-3">
        <label>Còn lại</label>
        <input type="text" name="conlai" readonly="readonly" id="conlai" class="form-control"> 
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-3">
         <label>Ngày đóng</label>
        <input type="date" name="ngaydong" id="ngaydong" class="form-control"> 
      </div>
       <input type="hidden" name="mang1" id="mang1" value="[]">

             <div class="col-md-3" style="margin-top:24px;">
                <button class="btn btn-success" type="button" onclick="themdulieu2()">Thêm</button>
              </div>
    </div>
    </div> <!-- /.box-body -->

    <div class="box-footer">
      <div id="showaa">
      </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@stop  