

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Thể Loại</h3>
            </div>
            <!-- /.box-header -->
            <?php
             if(session('thongbao1')){
              ?>
              <div class="alert alert-danger">
                 <?= session('thongbao1') ?>
              </div>
              <?php
            }

             if(session('thongbao2')){
              ?>
              <div class="alert alert-danger">
                 <?= session('thongbao2') ?>
              </div>
              <?php

            }

            ?>
            <div class="col-md-12">
              <label>Thể loại</label>
                <select class="chosen-select3" onchange="loaitin_theloai()" id="theloai">
                  <?php
                   foreach ($theloai as $val) {
                    ?>
                
                      <option value="<?= $val['id'] ?>"><?= $val['Ten'] ?></option>
                  </optgroup>

                  <?php
                
              }
                  ?>
              </select>
            </div>

             <div class="col-md-12">
              <label>Loại tin</label>
                <select class="chosen-select3" id="loaitin">
                  <?php
                   foreach ($loaitin as $value) {
                    ?>
                
                      <option value="<?= $value['id'] ?>"><?= $value['Ten'] ?></option>
                  </optgroup>

                  <?php
              }
                  ?>
              </select>
            </div>

               <div class="col-md-12">
                <label>Lồng thể loại và loại tin</label>
                <select class="chosen-select3">
                  <?php
                   foreach ($theloai as $val) {
                
                  $theloaileftjoin = DB::table('loaitin')->where('idTheLoai','=',$val['id'])->get();
                  $a = 0;
                  foreach ($theloaileftjoin as $value) {
                  $a++;
                  if($a == 1){
                  
                  ?>
                  <optgroup label="<?= $val['Ten'] ?>">

                    <?php
                  }
                    ?>
                  
                      <option value="<?= $value->id ?>"><?= $value->Ten ?></option>
                  </optgroup>

                  <?php
                
               }
                
              }
                  ?>
              </select>
            </div>

            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" border="1" cellspacing="0">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Delete</th>
                  <th>Edit</th>
                  <th>Xóa ajax</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $a = 0;
                  foreach ($theloai as $value) {
                    $a++;
                    ?>
                    <tr>
                      <td><?= $a ?></td>
                      <td><?= $value['Ten'] ?></td>
                      <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="xoa/<?= $value['id'] ?>">Xóa</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i><a target="_blank" href="sua/<?= $value['id'] ?>">Sửa</a></td>
                      <td class="center"><i class="fa fa-trash-o fa-fw"></i><button type="button" onclick="xoaajax(<?= $value['id'] ?>)">Xóa ajax</button></td>
                    </tr>
                   <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content --><!-- tí xóa -->
  </div>
<script type="text/javascript">
  var url1 = "{!! url('/') !!}";

</script>

<script src="../../js/jquery-3.2.1.js"></script>
<script type="text/javascript">
  function loaitin_theloai() {
    var theloai = $("#theloai").val();
    $.get("loaitin/"+theloai, function(data){
      alert(data);
     $('#loaitin').empty();
    
      $.each(data, function (key, val) {

          $('#loaitin').append($('<option>').attr('value', val.id).text(val.Ten));
        });
        $('#loaitin').trigger("chosen:updated");
        
      });
  }
</script>



  
