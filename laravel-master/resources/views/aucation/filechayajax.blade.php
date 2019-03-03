@extends('aucation.layout')
@section('noidung')

<style type="text/css">
  a:hover{
    color: black !important;
  }
</style>

        <div class="box box-solid box-info" style="border: 1px solid #5cb85c;width: 70%;margin: auto;">
    <div class="box-header with-border" style="background: #5cb85c; ">
        <h3 class="box-title">Danh sách ajax test</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>  <!-- /.box-tools -->
    </div> <!-- /.box-header -->

    <div class="box-body">
      {{ csrf_field() }}
      <div class="col-md-12">
         
            </div>
            <div style="margin-top:20px;" class="col-md-12">
              <div class="col-md-3">
                <label>Chọn user</label>
                <select id="user1" name="user1" class="form-control chosen-select" onchange="chonuser()">
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
              <input type="hidden" name="mang" id="mang" value="[]">

             <div class="col-md-3" style="margin-top:24px;">
                <button class="btn btn-success" type="button" onclick="themdulieu()">Xem</button>
              </div>

              </div>
            
    </div> <!-- /.box-body -->

    <div class="box-footer">
      <div id="show1">
      </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->



@stop          