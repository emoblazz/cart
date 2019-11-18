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
        Purchase Order
        <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> Add Purchase Order
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Order</li>
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
                  <h3 class="box-title">Purchase Order List</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <th>PO ID</th>
                      <th>Supplier</th>
                      <th>PO Date</th>
                      <th>PO Total</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM po natural join supplier order by po_date desc")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['po_id'];					
                          $supplier=$row['supplier_id'];  
                    ?>    
                    <tr>
                        <td><?php echo $row['po_id'];?></td>
                        <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['po_date'];?></td>
                        <td><?php echo $row['po_total'];?></td>
                        <td>
                          <a type="button" class="btn btn-default" href="po_details.php?poid=<?php echo $id;?>&supplier=<?php echo $supplier;?>">
                            <i class="fa fa-eye text-green"></i></a>
                         
                        </td>
                    </tr>  
                    <!-- Modal Update-->
                    <div class="modal fade" id="modal-<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Update Product Supplier</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                    <select class="form-control select2" style="width: 100%;" name="product">
                                       <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
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
                                       <option value="<?php echo $row['supplier_id'];?>"><?php echo $row['supplier_name'];?></option>
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `supplier` order by supplier_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['supplier_id'];?>"><?php echo $row1['supplier_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price of Product" name="price" value="<?php echo $row['supplier_price'];?>">
                                  </div>
                                 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" name="update_prod_sup">Save changes</button>
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
                                <h4 class="modal-title">Delete Product Supplier</h4>
                              </div>
                              <form role="form" method="POST" action="product_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      
                                      <input type="hidden" value="<?php echo $id;?>" name="id">
                                      <p>Are you sure you want to delete product <?php echo $row['prod_name'];?>?</p>
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
            <!-- add Update-->
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Create New Purchase Order</h4>
                            </div>
                            <form role="form" method="POST" action="po_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Select Supplier</label>
                                    <select class="form-control select2" style="width: 100%;" name="supplier">
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `supplier` order by supplier_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['supplier_id'];?>"><?php echo $row1['supplier_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" name="create">Create</button>
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
