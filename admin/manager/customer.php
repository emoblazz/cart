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
        Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
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
                  <h3 class="box-title">Customer List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover">
                   <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Date Registered</th>
                      <th>View Orders</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM `customer` order by cust_name")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['cust_id'];					
                         
                    ?>    
                    <tr>
                        <td><img class="profile-user-img img-responsive img-circle" src="../../dist/img/<?php echo $row['cust_pic'];?>" alt="Photo"></td>
                        <td><?php echo $row['cust_name'];?></td>
                        <td><?php echo $row['cust_address'];?></td>
                        <td><?php echo $row['cust_contact'];?></td>
                        <td><?php echo $row['date_registered'];?></td>
                        <td>
                          <a type="button" class="btn btn-default" href="transaction.php?cid=<?php echo $id;?>">
                            <i class="fa fa-eye text-orange"></i></a>
                        </td>
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
