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
        Expired Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Report</li>
        <li class="active">Expired</li>
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
                  <h3 class="box-title">Expired Product List</h3>
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
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Expiry</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM expired natural join stockin natural join `product` natural join category where expiry_status='expired' order by expiry desc")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['stockin_id'];					
                          
                          if ($row['expiry_status']=="sold")
                            $label="label label-success";
                          else if($row['expiry_status']=="expired")
                            $label="label label-danger";
                    ?>    
                    <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['expire_qty'];?></td>
                        <td><?php echo $row['expiry'];?></td>
                        <td><span class="<?php echo $label;?>"><?php echo $row['expiry_status'];?></span></td>
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
                              <h4 class="modal-title">Update Expiry Status</h4>
                            </div>
                            <form role="form" method="POST" action="report_functions.php">
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Product" name="name" value="<?php echo $row['prod_name'];?>" required readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Stockin Qty</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price of Product" name="qty" value="<?php echo $row['stockin_qty'];?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Expiry Date</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price of Product" name="price" value="<?php echo date("m/d/Y",strtotime($row['expiry']));?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Expired Qty</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Qty Expired" name="expired" value="<?php // echo $row['stockin_qty'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Expiry Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                       <option><?php echo $row['expiry_status'];?></option>
                                       <option>expired</option>
                                       <option>sold</option>
                                    </select>
                                  </div>
                                 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updateexpiry">Save changes</button>
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
