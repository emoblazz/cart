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
        <a class="btn btn-app btn-primary text-blue" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> ADD
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
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
                  <h3 class="box-title">Product List</h3>
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
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Product Price</th>
                      <th>Product Qty</th>
                      <th>Reorder</th>
                      <th>Action</th>
                    </tr>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM `product` natural join category order by prod_name")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['prod_id'];					
                         
                    ?>    
                    <tr>
                        <td><img class="profile-user-img img-responsive img-circle" src="../dist/uploads/<?php echo $row['prod_pic'];?>" alt="Photo"></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_desc'];?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['prod_price'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
                        <td><?php echo $row['reorder'];?></td>
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
                              <h4 class="modal-title">Update Product</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php">
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
            <!-- add Update-->
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Product</h4>
                            </div>
                            <form role="form" method="POST" action="product_functions.php">
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
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="add">Save</button>
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
