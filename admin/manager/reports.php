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
          Sales Reports
          
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Sales Reports</li>
        </ol>
      </section>

      <!-- Main content -->
      <?php //include 'dist/includes/section.php';?>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="content">
            <div class="row">
              <div class="col-xs-4 col-md-4">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Daily/Weekly Sales Report</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form method="post" action="report_daily.php">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Select Date</label>
                          <input type="daterange" class="form-control" id="reservation" placeholder="Enter Name of Category" name="date" required>
                      </div>  
                      <button type="submit" class="btn btn-warning" name="update">Generate</button>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <div class="col-xs-4 col-md-4">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Monthly Sales Report</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form method="post" action="report_monthly.php">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Select Month</label>
                          <select class="form-control select2" style="width: 100%;" name="month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                      </div> 
                      <div class="form-group">
                          <label for="exampleInputEmail1">Select Year</label>
                          <select class="form-control select2" style="width: 100%;" name="year">
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                          </select>
                      </div>  
                      <button type="submit" class="btn btn-warning" name="update">Generate</button>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!--Add Form-->
              <div class="col-xs-4 col-md-4">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Yearly Sales Report</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form method="post" action="report_yearly.php">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Select Date</label>
                          <select class="form-control select2" style="width: 100%;" name="year">
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                          </select>
                      </div>  
                      <button type="submit" class="btn btn-warning" name="update">Generate</button>
                    </form>
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
