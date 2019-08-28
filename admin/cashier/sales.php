
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
          Sales
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Report</li>
          <li class="active">Sales</li>
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
                    <h3 class="box-title">Sales</h3>
                    <div class="box-tools">
                    <form method="post" action="">
                      <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
                        
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="reservation" name="date">
                            </div>
                            <!-- /.input group -->
             
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default" name="search"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div></form>
                  </div>
                  
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                      <tr>
                        <th>Date</th>
                        <th>Amount</th>
                      </tr>
                      <?php			
                        if (isset($_POST['search']))
                        {
                          $date=$_POST['date'];
                          $date=explode('-',$date);
                          // $branch=$_SESSION['branch'];   
                            $start=date("Y/m/d",strtotime($date[0]));
                            $end=date("Y/m/d",strtotime($date[1]));


                        $query=mysqli_query($con,"SELECT SUM(order_total) as total,DATE_FORMAT(order_date,'%Y/%m/%d') as date FROM `order` natural join customer where payment_status='paid' and order_date >= DATE_FORMAT('" . $start . "', '%Y%m%d') AND order_date <=  DATE_FORMAT('" . $end . "', '%Y%m%d') group by date")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                         
                      ?>    
                      <tr class="box box-success">
                          <td class="text-aqua"><?php echo $row['date'];?></td>
                          <td class="text-aqua"><?php echo $row['total'];?></td>
                      </tr> 
                                    
                      <?php }}?>
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
