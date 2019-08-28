
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
        Customer Transactions
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
        <li class="active">Customer Transactions</li>
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
                  <h3 class="box-title">Customer Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th>Total</th>
                      <th>Payment</th>
                      
                    </tr>
                  </table>
                    <?php			
                      $cid=$_REQUEST['cid'];          
                      $query=mysqli_query($con,"SELECT * FROM `order` where cust_id='$cid' and order_status='confirmed' order by order_date desc")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['order_id'];					
                          $status=$row['payment_status'];
                          
                          if ($status=="paid")
                            $label="label label-success";
                            
                    ?>  
                      <table class="table table-bordered">
                    <tr>
                        <td><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">  OR<?php echo $row['order_id'];?></a></td>
                        <td><?php echo $row['order_date'];?></td>
                        <td><?php echo $row['order_total'];?></td>
                        <td><span class="<?php echo $label;?>"><?php echo $row['payment_status'];?></span></td>
                        
                    </tr> 
                    </table>
                    <!-- accordion-->
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    lkjklk
                    </div>
                    
                    <!-- /.accordion -->  
                    <?php }?>
                  </tbody>
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
