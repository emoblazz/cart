<!DOCTYPE html>
<html>
<?php include '../dist/includes/head.php';?>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
  <?php include '../dist/includes/header.php';?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php include '../dist/includes/aside1.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php //include 'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-12 connectedSortable">
        <div class="row">
          
          <div class="col-xs-8">
            <div class="box">
        
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Qty</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                  <?php				
                          $id=$_REQUEST['order_id'];
                          $queryo=mysqli_query($con,"SELECT * FROM order_details natural join product where order_id='$id'")or die(mysqli_error($con));
                            while ($rowo=mysqli_fetch_array($queryo)){
                              $id=$rowo['order_id'];					
                           
                        ?>
                  <tr>
                    <td><?php echo $rowo['qty'];?></td>
                    <td><?php echo $rowo['prod_name'];?></td>
                    <td><?php echo $rowo['price'];?></td>
                    <td><?php echo $rowo['total'];?></td>
                  </tr>
                  <?php }?>
                </tbody></table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <?php				
                $query=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_id='$id'")or die(mysqli_error($con));
                   $row=mysqli_fetch_array($query);
          ?>
          <div class="col-xs-4">
            <div class="box box-primary">
              <form role="form" method="POST" action="save_payment.php" name="autoSumForm" >
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Customer Name</label>
                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                    <input type="text" class="form-control" value="<?php echo $row['cust_name'];?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Order Date</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name of Product" name="name" value="<?php echo $row['order_date'];?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Total</label>
                                    <input type="text" class="form-control" id="total" placeholder="Enter Name of Product" name="total" value="<?php echo $row['order_total'];?>" onFocus="startCalc();" onBlur="stopCalc();" >
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Cash Tendered</label>
                                    <input type="text" class="form-control" id="tendered" placeholder="Cash Tendered" name="tendered" onFocus="startCalc();" onBlur="stopCalc();" >
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Change</label>
                                    <input type="text" class="form-control" id="change" name="change" placeholder="Changed">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-block btn-warning" name="pay">PAY</button>
                              </div>
                          </form>
              
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
<script type="text/javascript" src="autosum.js"></script>
</body>
</html>
