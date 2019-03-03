<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khoa Phạm - Quản Lý Học Sinh</title>
    <link type="text/css" href="restfull/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/hamjs.js"></script>
    <script type="text/javascript" src="restfull/js/jquery.min.js"></script>
    <script type="text/javascript" src="restfull/js/bootstrap.min.js"></script> 
    <style type="text/css">
      .btn {padding:0px;font-weight:bold}
    </style>
    <script type="text/javascript">
        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
  </head>
  <body>
    <div class="container" style="margin-top:20px">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Danh Sách Học Sinh</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Điểm Toán</th>
                <th>Điểm Lý</th>
                <th>Điểm Hóa</th>
                <th>Xóa</th>
                <th>Sửa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stt = 0;
              ?>
              @foreach($buidmang as $val)
              <?php $stt++ ?>
              <tr>
                <th scope="row"><?= $stt ?></th>
                <td><?= $val['hoten'] ?></td>
                <td><?= $val['toan'] ?></td>
                <td><?= $val['ly'] ?></td>
                <td><?= $val['hoa'] ?></td>
                <th>
        
                    <button onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')" type="submit" id="delete" class="btn btn-link">Xóa</button>
            
                </th>
                <th><a href="#">Sửa</a></th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col-md-3">
        <label>Lấy học sinh</label>
        <select class="form-control chosen-select" id="hocsinh" name="hocsinh" onchange="chonhocsinh()">
          <option value="0">---</option>
          @foreach($buidmang as $val)
          <option value="<?= $val['id'] ?>"><?= $val['hoten'] ?></option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3">
        <label>Điểm Toán</label>
        <input type="text" name="toan" id="toan" class="form-control" readonly="readonly">
      </div>

      <div class="col-md-3">
        <label>Điểm Hóa</label>
        <input type="text" name="hoa" id="hoa" class="form-control" readonly="readonly">
      </div>

      <div class="col-md-3">
        <label>Điểm Lý</label>
        <input type="text" name="ly" id="ly" class="form-control" readonly="readonly">
      </div>
    </div>
   
    
  </body>
</html>


