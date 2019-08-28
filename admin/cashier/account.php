
<!DOCTYPE html>
<html>
<?php include '../dist/includes/head.php';?>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
  <?php include '../dist/includes/header.php';?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include '../dist/includes/aside.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Account Settings     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php //include '../dist/'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Account Details</h3>
<?php               
                        $query=mysqli_query($con,"SELECT * FROM `user` where user_id='$session_id'")or die(mysqli_error($con));
                          $row=mysqli_fetch_array($query);
                            
                      ?>                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <form role="form" method="POST" action="update_account.php">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Your Full Name" name="name" value="<?php echo $row['user_name'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="username" value="<?php echo $row['username'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter new password (Leave blank to retain old password)" name="password">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" name="add">Save</button>
                              </div>
                            </form>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!--Add Form Modal-->
            
          </div>

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../dist/includes/footer.php';?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include '../dist/includes/script.php';?>

</body>
</html>
