
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
        Supplier 
        <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> ADD
        </a>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php //include '../dist/'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Supplier List</h3>
                  <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Supplier Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM supplier order by supplier_name")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['supplier_id'];					
                    ?>    
                    <tr>
                        <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['supplier_contact'];?></td>
                        <td><?php echo $row['supplier_address'];?></td>
                        <td>
                          <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-<?php echo $id;?>">
                            <i class="fa fa-pencil text-orange"></i></a>
                        </td>
                    </tr>  
                    <!-- Modal Update-->
                    <div class="modal fade" id="modal-<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Update Supplier</h4>
                            </div>
                            <form role="form" method="POST" action="supplier_functions.php">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Supplier" name="name" value="<?php echo $row['supplier_name'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Contact #</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number of Supplier" name="contact" value="<?php echo $row['supplier_contact'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Supplier Address" name="address" value="<?php echo $row['supplier_address'];?>" required>
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
                    <?php }?>
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!--Add Form Modal-->
            <!-- Modal Update-->
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Supplier</h4>
                            </div>
                            <form role="form" method="POST" action="supplier_functions.php">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Supplier" name="name" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Contact #</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number of Supplier" name="contact">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Supplier Address" name="address">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" name="add">Save</button>
                              </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.end add modal -->  
            
            
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
