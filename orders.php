<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php include "dist/includes/shop-head.php";?>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    <!-- BEGIN TOP BAR -->
    <?php 
    if (isset($session_id))
      include "dist/includes/topbar.php";
    else
      include "dist/includes/shop-topbar.php";
    ?>

    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <?php include "dist/includes/shop-header.php";?>

    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <?php //include "dist/includes/shop-slider.php";?>
    
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <?php //include "dist/includes/shop-sale.php";?>
        
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT --> 
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
        <?php //include "dist/includes/shop-sidebar.php";?>
          
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Order History</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
<?php
  $query=mysqli_query($con,"SELECT * FROM `order` where cust_id='$session_id' order by order_date DESC")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                           $id=$row['order_id'];    
?> 
                <div class="col-md-12">  
                  <div class="row invoice-info">
                    <!-- /.col -->
                    <div class="col-sm-6 invoice-col">
                      <b>Order # <?php echo $row['order_id'];?></b><br>
                      <b>Order Date: </b> <?php echo $row['order_date'];?><br>
                      <br>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 invoice-col">
                      <b>Order Status: </b><?php echo $row['order_status'];?><br>
                      <b>Payment Due: </b> <?php echo $row['order_total'];?><br>
                    </div>
                    <!-- /.col -->
                    
                  </div>
                  <hr>
              <table summary="Shopping cart">
                <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Item</th>
                    <th class="goods-page-ref-no">Description</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total">Total</th>
                  </tr>            
<?php
         $queryp=mysqli_query($con,"SELECT * FROM `order_details` natural join product where order_id='$id'")or die(mysqli_error($con));
                          while ($rowp=mysqli_fetch_array($queryp)){
                           // $cat_name=$rowp['cat_name'];    
?>            
                  
                  <tr>
                    <td class="goods-page-image">
                      <a href="javascript:;"><img src="assets/frontend/pages/img/products/model3.jpg" alt="Berry Lace Dress"></a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="javascript:;"><?php echo $rowp['prod_name'];?></a></h3>
                    </td>
                    <td class="goods-page-ref-no">
                      <?php echo $rowp['prod_desc'];?>
                    </td>
                    <td class="goods-page-quantity">
                      <?php echo $rowp['qty'];?>
                    </td>
                    <td class="goods-page-price">
                      <strong><span>P</span><?php echo $rowp['price'];?></strong>
                    </td>
                    <td class="goods-page-total">
                      <strong><span>P</span><?php echo $rowp['total'];?></strong>
                    </td>
                    
                  </tr>
<?php }?>
                </table>

                </div>
                <hr style="border:1px red solid">
                
<?php }?>                
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
          
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>

    <!-- BEGIN BRANDS -->
    <?php include "dist/includes/shop-brands.php";?>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <?php include "dist/includes/shop-steps.php";?>
    
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php include "dist/includes/shop-footer.php";?>

    <!-- END FOOTER -->

    
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <?php include "dist/includes/shop-script.php";?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
