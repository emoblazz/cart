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
        Stockin 
        <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> ADD
        </a>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stockin</li>
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
                  <h3 class="box-title">Stockin List</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <th>Product Name</th>
                      <th>Stockin Qty</th>
                      <th>Stockin Date</th>
                      <th>Expiry Date</th>
                    </thead>
                    <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM stockin natural join product order by stockin_date desc")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['stockin_id'];					
                    ?>    
                    <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['stockin_qty'];?></td>
                        <td><?php echo $row['stockin_date'];?></td>
                        <td><?php echo $row['expiry'];?></td>
                       
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
                              <h4 class="modal-title">Add Stockin</h4>
                            </div>
                            <form role="form" method="POST" action="stockin_functions.php">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product</label>
                                    <select class="form-control select2" style="width: 100%;" name="product">
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `product` order by prod_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['prod_id'];?>"><?php echo $row1['prod_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier">
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `supplier` order by supplier_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['supplier_id'];?>"><?php echo $row1['supplier_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Stockin Qty</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Quantity" name="qty">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Expiry Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="expiry">
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
