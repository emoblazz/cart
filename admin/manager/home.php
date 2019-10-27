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
      <section>
        <div class="row">
          <div class="col-xs-12">
            <?php	
                      $year=date("Y");       
                      $month=date("m");
                      $query=mysqli_query($con,"SELECT *,SUM(prod_qty) as good FROM `product`")or die(mysqli_error($con));
                        $row=mysqli_fetch_array($query);
                          $good=$row['good'];					
                          
                      $queryd=mysqli_query($con,"SELECT *,SUM(damage_qty) as damaged FROM `damaged` where MONTH(declared_date)='$month' and YEAR(declared_date)='$year'")or die(mysqli_error($con));
                        $rowd=mysqli_fetch_array($queryd);
                          $damaged=$rowd['damaged'];		
                        
                      $querye=mysqli_query($con,"SELECT *,SUM(expire_qty) as expired FROM `expired` natural join stockin where MONTH(expiry)='$month' and YEAR(expiry)='$year' and expiry_status='expired'")or die(mysqli_error($con));
                        $rowe=mysqli_fetch_array($querye);
                          $expired=$rowe['expired'];					
                      
                      $queryn=mysqli_query($con,"SELECT *,SUM(stockin_qty) as near FROM `stockin` natural join product where expiry <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) and expiry_status=''")or die(mysqli_error($con));
                        $rown=mysqli_fetch_array($queryn);
                          $near=$rown['near'];		
                     
                         $total=$good+$damaged+$expired;
                         
                ?> 
              <div class="col-md-3 col-xs-12">
                <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Good Condition (<?php echo number_format(($good/$total)*100,2);?>%)</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="">
                    Total Reported Items: <?php echo $good;?><hr>
                    <a href="good.php"><i class="fa fa-list"></i> View Items </a>
                  </div>
                  <!-- /.box-body -->
                </div>
              <!-- /.box -->
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="box box-warning box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Soon to Expire (<?php echo number_format(($near/$total)*100,2);?>%)</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="">
                    Total Reported Items: <?php echo $near;?><hr>
                    <a href="near.php"><i class="fa fa-list"></i> View Items </a>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="box box-danger box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Expired (<?php echo number_format(($expired/$total)*100,2);?>%)</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="">
                    Total Reported Items: <?php echo $expired;?><hr>
                    <a href="expired.php"><i class="fa fa-list"></i> View Items </a>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="box box-danger box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Damaged (<?php echo number_format(($damaged/$total)*100,2);?>%)</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="">
                    Total Reported Items: <?php echo $damaged;?><hr>
                    <a href="damaged.php"><i class="fa fa-list"></i> View Items </a>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
        </div> 
      </div> 
   
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Last 10 Transactions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

                <?php								
                        $queryo=mysqli_query($con,"SELECT * FROM `order` natural join customer order by order_date desc LIMIT 0,10")or die(mysqli_error($con));
                          while ($rowo=mysqli_fetch_array($queryo)){
                            $id=$rowo['order_id'];					
                         
                            if ($rowo['order_status']=="pending")
                              $label="label label-danger";
                            elseif ($rowo['order_status']=="for pickup")
                              $label="label label-primary";
                            elseif ($rowo['order_status']=="claimed")
                              $label="label label-success";
                      ?>
                <tr>
                  <td><?php echo $rowo['order_id'];?></td>
                  <td><?php echo $rowo['order_date'];?></td>
                  <td><?php echo $rowo['cust_name'];?></td>
                  <td><span class="<?php echo $label;?>"><?php echo $rowo['order_status'];?></span></td>
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
