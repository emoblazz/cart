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
          User
          <a class="btn btn-app btn-primary text-blue" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> ADD
          </a>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">User</li>
        </ol>
      </section>

      <!-- Main content -->
      <?php //include 'dist/includes/section.php';?>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="content">
            <div class="row">
              <div class="col-xs-12 col-md-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">User List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                      <?php								
                        $query=mysqli_query($con,"SELECT * FROM `user` order by user_name")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                            $id=$row['user_id'];					
                         
                      ?>    
                      <tr>
                          <td><?php echo $row['user_name'];?></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['user_type'];?></td>
                          <td>
                            <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-<?php echo $id;?>">
                              <i class="fa fa-pencil text-blue"></i></a>
                          </td>
                      </tr>  
                      <!-- Modal Update-->
                      <div class="modal fade" id="modal-<?php echo $id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Update Category</h4>
                              </div>
                              <form role="form" method="POST" action="user_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Full Name</label>
                                      <input type="hidden" value="<?php echo $id;?>" name="id">
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name of User" name="name" value="<?php echo $row['user_name'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Username</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username for login" name="username" value="<?php echo $row['username'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" value="<?php echo $row['user_pass'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">User Type</label>
                                      <select class="form-control select2" style="width: 100%;" name="type">
                                        <option><?php echo $row['user_type'];?></option>
                                      <?php								
                                          $query1=mysqli_query($con,"SELECT * FROM `user_type` where user_type<>'$row[user_type]' order by user_type")or die(mysqli_error($con));
                                            while ($row1=mysqli_fetch_array($query1)){
                                      ?>
                                        <option><?php echo $row1['user_type'];?></option>
                                      <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->                
                      <?php }?>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!--Add Form-->
              <!-- Modal add-->
                      <div class="modal fade" id="modal-add">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add User</h4>
                              </div>
                              <form role="form" method="POST" action="user_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Full Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name of User" name="name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Username</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username for login" name="username" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">User Type</label>
                                      <select class="form-control select2" style="width: 100%;" name="type">
                                      <?php								
                                          $query1=mysqli_query($con,"SELECT * FROM `user_type` order by user_type")or die(mysqli_error($con));
                                            while ($row1=mysqli_fetch_array($query1)){
                                      ?>
                                        <option><?php echo $row1['user_type'];?></option>
                                      <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->    
             
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
