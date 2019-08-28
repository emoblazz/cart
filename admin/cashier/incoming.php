
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
          Incoming Orders
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Orders</li>
          <li class="active">Incoming</li>
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
                    <h3 class="box-title">Incoming Order List</h3>
                    <div class="box-tools">
                      
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                      <tr>
                        <th>Mark As Ready</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Amount Due</th>
                      </tr>
                      <?php								
                        $query=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_status='pending' order by order_date")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                            $id=$row['order_id'];					
                         
                      ?>    
                      <tr class="box box-success">
                          <td><a class="btn btn-warning" href="order_functions.php?order_id=<?php echo $id;?>&status=done"><i class="fa fa-truck text-danger"></i> Mark as Done</a></td>
                          <td class="text-aqua">OR<?php echo $row['order_id'];?> |
                            
                          </td>
                          <td class="text-aqua"><?php echo $row['order_date'];?></td>
                          <td class="text-aqua"><?php echo $row['cust_name'];?></td>
                          <td class="text-aqua"><?php echo $row['order_total'];?></td>
                      </tr> 
                      <tr class="box box-warning">
                          <th>Qty</th>
                          <th>Item/s</th>
                          <th>Price</th>
                          <th colspan="2">Total</th>
                      </tr>  
                      <?php								
                        $query1=mysqli_query($con,"SELECT * FROM `order_details` natural join product where order_id='$id'")or die(mysqli_error($con));
                          while ($row1=mysqli_fetch_array($query1)){
                            //$id=$row1['user_id'];					
                         
                      ?>  
                      <tr>
                          <td><?php echo $row1['qty'];?></td>
                          <td><?php echo $row1['prod_name'];?></td>
                          <td><?php echo $row1['price'];?></td>
                          <td><?php echo $row1['total'];?></td>
                      </tr>  
                      <?php }?>
                                    
                      <?php }?>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!--Add Form-->
              <!-- Modal add-->
                      <div class="modal fade" id="modal-add">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add User</h4>
                              </div>
                              <form role="form" method="POST" action="user_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Full Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name of User" name="name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Username</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username for login" name="username" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">User Type</label>
                                      <select class="form-control select2" style="width: 100%;" name="type">
                                      <?php								
                                          $query1=mysqli_query($con,"SELECT * FROM `user_type` order by user_type")or die(mysqli_error($con));
                                            while ($row1=mysqli_fetch_array($query1)){
                                      ?>
                                        <option><?php echo $row1['user_type'];?></option>
                                      <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="add">Save changes</button>
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
