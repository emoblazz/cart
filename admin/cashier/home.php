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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php //include 'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-12 connectedSortable">
        <div class="row">
          
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ready for Pick Up Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer</th>
                  <th>Pay</th>
                </tr>
                <?php								
                        $queryo=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_status='for pickup' order by order_date")or die(mysqli_error($con));
                          while ($rowo=mysqli_fetch_array($queryo)){
                            $id=$rowo['order_id'];					
                            
                            if ($rowo['payment_status']=="paid")              
                            {
                              $status="Paid";
                              $color="success";
                            }
                            else
                            {
                              $status="Make Payment";
                              $color="danger";
                            }
                      ?>
                <tr>
                  <td><?php echo $rowo['order_id'];?></td>
                  <td><?php echo $rowo['order_date'];?></td>
                  <td><?php echo $rowo['cust_name'];?></td>
                  <td><a href="transaction.php?order_id=<?php echo $id;?>" class="btn btn-<?php echo $color;?>"><?php echo $status;?></a></td>
                </tr>
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
