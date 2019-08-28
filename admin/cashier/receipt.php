<!DOCTYPE html>
<html>
<?php // include '../dist/includes/head.php';?>
<style>
  tr td{
    border:1px #000 solid; 
  }
  tr th{
    border:1px #000 solid; 
  }
  table{
    border-collapse:collapse;
  }
</style>
  <style type="text/css">
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
<?php include '../dist/includes/head.php';?>
  
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
  <?php // include '../dist/includes/header.php';?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php //include '../dist/includes/aside1.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <?php //include 'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
<?php			
    include '../dist/includes/dbcon.php';
    $id=$_REQUEST['order_id'];
                $query=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_id='$id'")or die(mysqli_error($con));
                   $row=mysqli_fetch_array($query);
          ?>        

        <section class="col-lg-12 connectedSortable">
        <div class="row col-md-8">
          <h3 style="text-align:center">
        Coronel Online Grocery Store <input class="btn-print btn-warning" type="button" name="print" value="Print" onclick="window.print();window.location.href='home.php';">
      </h3>
      <h5 style="text-align: center;">Victorias Commercial Center (Shopping Malls)<br>
Yap Quina Street, Victorias City, Negros Occidental, Philippines
</h5>
      <h3 style="text-align: right;">Order # <?php echo $row['order_id'];?>
</h3>
      
          <div class="col-xs-12">
            <div class="box">
            
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table style="width:100%">
            <tr>
              <td>Sold To:</td>
              <td><?php echo $row['cust_name']; ?></td>
              <td>Address:</td>
              <td><?php echo $row['cust_address']; ?></td>
            </tr>
          
          </table>
          
                <table class="table table-hover" style="width:100%;text-align:left">
                  <tbody>
                  <tr>
                    <td>Qty</td>
                    <td>Item</td>
                    <td>Price</td>
                    <td>Total</td>
                  </tr>
                  <?php		
                        
                          
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
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <td><?php echo $row['order_total'];?></td>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Cash Tendered</th>
                    <td><?php echo $row['cash_tendered'];?></td>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Change</th>
                    <td><?php echo $row['change'];?></td>
                  </tr>
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
  <?php //include '../dist/includes/footer.php';?>
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php //include '../dist/includes/script.php';?>
</body>
</html>
