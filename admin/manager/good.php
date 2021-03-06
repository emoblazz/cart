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
        Good Condition Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Good Condition</li>
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
                  <h3 class="box-title">Good Condition Product List</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Product Qty</th>
                    </thead>
                    <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM `product` natural join category where prod_qty>0 order by prod_name")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['prod_id'];					
                         
                    ?>    
                    <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_desc'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
                    </tr>  
                    <!-- Modal Update-->
                    <div class="modal fade" id="modal-<?php echo $id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Update Product</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Product" name="name" value="<?php echo $row['prod_name'];?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter Description of Product" name="desc"> <?php echo $row['prod_desc'];?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="category">
                                       <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `category` where cat_id<>'$row[cat_id]' order by cat_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['cat_id'];?>"><?php echo $row1['cat_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price of Product" name="price" value="<?php echo $row['prod_price'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Reorder</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Reorder Point of Product" name="reorder" value="<?php echo $row['reorder'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="hidden" class="form-control" id="image" name="image1" value="<?php echo $row['prod_pic'];?>"> 
                                    <input type="file" class="form-control" name="image" id="title">
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
                                <h4 class="modal-title">Delete Product</h4>
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
                              <h4 class="modal-title">Add Product</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Product" name="name" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter Description of Product" name="desc"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="category">
                                    <?php								
                                        $query1=mysqli_query($con,"SELECT * FROM `category` order by cat_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['cat_id'];?>"><?php echo $row1['cat_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price of Product" name="price">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Reorder</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Reorder Point of Product" name="reorder">
                                  </div>
                                  <div class="form-group">
                                  <div class="form-line"> 
                                    <input type="file" class="form-control" name="image" id="title">
                                  </div>
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
