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
        Product
        <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> Assign Supplier to Product
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product Supplier</li>
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
                  <h3 class="box-title">Product Supplier List</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Supplier</th>
                      <th>Supplier Price</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM prod_sup natural join `product` natural join category natural join supplier order by prod_name")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['prod_sup_id'];					
                         
                    ?>    
                    <tr>
                        <td><img class="profile-user-img img-responsive img-circle" src="../../dist/uploads/<?php echo $row['prod_pic'];?>" style="height:100px ;width: 100px;" alt="Photo"></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_desc'];?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['supplier_price'];?></td>
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
                              <h4 class="modal-title">Assign Supplier to Product</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <select class="form-control select2" style="width: 100%;" name="product">
                                    <?php               
                                        $query1=mysqli_query($con,"SELECT * FROM `product`  order by prod_name")or die(mysqli_error($con));
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
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Supplier Price" name="price">
                                  </div>
                                  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" name="add_prod_sup">Save</button>
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
