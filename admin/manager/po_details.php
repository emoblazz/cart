<!DOCTYPE html>
<html>
<?php include '../dist/includes/head.php';?>
<style type="text/css">
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
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
        Purchase Order
        <a class="btn btn-app btn-warning text-orange" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-square"></i> Add Purchase Order
          </a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php //include '../dist/'dist/includes/section.php';?>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="content">
          <div class="row">
            <div class="col-xs-8 col-md-8">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Purchase Order List</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Supplier Price</th>
                      <th>Subtotal</th>
                      <th class="btn-print">Action</th>
                    </thead>
                    <tbody>
                    <?php								
                      $query=mysqli_query($con,"SELECT * FROM po_details natural join `product` natural join category where po_id='$_REQUEST[poid]'")or die(mysqli_error($con));
                        while ($row=mysqli_fetch_array($query)){
                          $id=$row['po_details_id'];					
                         
                    ?>    
                    <tr>
                        <td><img class="profile-user-img img-responsive img-circle" src="../../dist/uploads/<?php echo $row['prod_pic'];?>" style="height:80px ;width: 100px;" alt="Photo"></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_desc'];?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['po_price'];?></td>
                        <td><?php echo $row['po_subtotal'];?></td>
                        <td class="btn-print">
                          <a type="button" class="btn btn-default" data-toggle="modal" data-target="#delete-<?php echo $id;?>">
                            <i class="fa fa-trash text-red"></i></a>
                         
                        </td>
                    </tr>  
                    
                       <!-- Modal Update-->
                      <div class="modal fade" id="delete-<?php echo $id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Delete this <?php echo $row['prod_name'];?> from purchase order?</h4>
                              </div>
                              <form role="form" method="POST" action="po_functions.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <input type="hidden" name="supplier" value="<?php echo $_REQUEST['supplier'];?>">
                                  <input type="hidden" name="poid" value="<?php echo $_REQUEST['poid'];?>">
                                      <input type="hidden" value="<?php echo $id;?>" name="id">
                                      <input type="hidden" value="<?php echo $row['po_subtotal'];?>" name="subtotal">
                                      <p>Are you sure you want to delete product <?php echo $row['prod_name'];?>?</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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
            <?php               
                      $query=mysqli_query($con,"SELECT * FROM po natural join `supplier` where po_id='$_REQUEST[poid]'")or die(mysqli_error($con));
                          $row=mysqli_fetch_array($query);
                          $id=$row['po_id'];          
                         
                    ?> 
            <div class="col-xs-4 col-md-4">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['supplier_name'];?></h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered">
                    
                       
                    <tr>
                        <td>PO Date</td>
                        <td><?php echo $row['po_date'];?></td>
                    </tr> 
                    <tr>
                        <td><h3>Total</h3></td>
                        <td><h3>Php <?php echo number_format($row['po_total'],2);?></h3></td>
                    </tr>  
                    <tr>
                      <td></td>
                      <td><input class="btn-print btn-warning" type="button" name="print" value="Print" onclick="window.print();window.location.href='po.php';">    </td>
                    </tr>               
                  </table>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!--Add Form-->
            <!-- add Update-->
                    <div class="modal fade" id="modal-add">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Product</h4>
                            </div>
                            <form role="form" method="POST" action="po_functions.php" enctype='multipart/form-data'>
                              <div class="modal-body">
                                  <input type="hidden" name="supplier" value="<?php echo $_REQUEST['supplier'];?>">
                                  <input type="hidden" name="poid" value="<?php echo $_REQUEST['poid'];?>">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Select Product</label>
                                    <select class="form-control select2" style="width: 100%;" name="product">
                                    <?php               
                                        $query1=mysqli_query($con,"SELECT * FROM prod_sup natural join `product`  where supplier_id='$_REQUEST[supplier]' order by prod_name")or die(mysqli_error($con));
                                          while ($row1=mysqli_fetch_array($query1)){
                                    ?>
                                      <option value="<?php echo $row1['prod_id'];?>"><?php echo $row1['prod_name'];?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Qty</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" name="qty">
                                  </div>
                                  
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" name="add_po">Save</button>
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
