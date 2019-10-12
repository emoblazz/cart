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
          Category
          <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> ADD
          </a>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Category</li>
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
                    <h3 class="box-title">Category List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>Category</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                      <?php								
                        $query=mysqli_query($con,"SELECT * FROM `category` order by cat_name")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                            $id=$row['cat_id'];					
                            $status=$row['cat_status'];			
                            if ($status==0)
                            {
                              $archive="yes";
                              $check="";
                            }
                            else
                            {
                              $archive="no";
                              $check="checked";
                            }
                      ?>    
                      <tr>
                          <td><?php echo $row['cat_name'];?></td>
                          <td><?php echo $archive;?></td>
                          <td>
                            <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-<?php echo $id;?>">
                              <i class="fa fa-pencil text-orange"></i></a>
                            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $id;?>">
                              <i class="fa fa-trash"></i></a>  
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
                              <form role="form" method="POST" action="category_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Category Name</label>
                                      <input type="hidden" value="<?php echo $id;?>" name="id">
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Category" name="cat_name" value="<?php echo $row['cat_name'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="archive" value="1" <?php echo $check;?>>
                                          <span class="text-red">Archive</span>
                                        </label>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-warning" name="update">Save changes</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal --> 

                        <!-- Modal Update-->
                      <div class="modal fade" id="delete-<?php echo $id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Delete Category</h4>
                              </div>
                              <form role="form" method="POST" action="category_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Category Name</label>
                                      <input type="hidden" value="<?php echo $id;?>" name="id">
                                      <p>Are you sure you want to delete category <?php echo $row['cat_name'];?>?</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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
                                <h4 class="modal-title">Add Category</h4>
                              </div>
                              <form role="form" method="POST" action="category_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Category Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Category" name="cat_name" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-warning" name="add">Save changes</button>
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
