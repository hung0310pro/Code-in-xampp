
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm Thể Loại</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            if(count($errors) > 0){
              ?>
              <div class="alert alert-danger">
                <?php
                foreach ($errors->all() as $value) {
                  echo $value."<br>";
                }
                ?>
              </div>
              <?php
            }

           /*  if(isset($_SESSION['thongbao'])){
          
               echo $_SESSION['thongbao']; 
        
            }*/
            ?>
        
            <form action="{!! route('postthemtheloai') !!}" method="post">
              @csrf 
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tên Thể Loại</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="theloai" name="theloai" placeholder="Thể loại">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Thể Loại không dấu</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="theloaikd" placeholder="Thể loại không dấu" name="theloaikd">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
