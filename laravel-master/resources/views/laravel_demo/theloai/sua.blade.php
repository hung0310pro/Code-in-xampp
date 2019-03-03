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

             if(session('thongbao')){
              ?>
              <div class="alert alert-danger">
                 <?= session('thongbao') ?>
              </div>
              <?php
            }
            ?>

  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thể loại <?= $suatheloai['Ten'] ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form action="" method="post">
              @csrf 
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thể loại</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="theloai" name="theloai" placeholder="Thể Loại" value="<?= $suatheloai['Ten'] ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" value="gửi">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

        