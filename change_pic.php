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
    
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-3 col-sm-6">
            <h1>My Account Page</h1>
            <div class="content-page">
              <h3>My Account</h3>
              <ul>
                <li><a href="edit_account.php">Edit your account information</a></li>
                <li><a href="change_password.php">Change your password</a></li>
                <li><a href="change_pic.php">Change picture</a></li>
              </ul>
              <hr>

              <h3>My Orders</h3>
              <ul>
                <li><a href="orders.php">View your order history</a></li>
                <li><a href="cart.php">View your cart</a></li>
              </ul>
            </div>
          </div>
<?php               
  $query=mysqli_query($con,"SELECT * FROM `customer` where cust_id='$session_id'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
             $id=$row['cust_id'];          
?>             
          <div class="col-md-7 col-sm-9">
            <h1>Update account details</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="content-form-page">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <form class="form-horizontal" role="form" method="post" action="upload_pic.php" enctype="multipart/form-data">
                        <fieldset>
                          <legend></legend>
                          <img src="dist/uploads/<?php echo $row['cust_pic'];?>">
                        </fieldset>
                        <div class="row">
                          <div class="col-lg-4 col-md-offset-1 padding-left-0 padding-top-20">
                            <input type="file" name="image" class="btn btn-success">                        
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="button" class="btn btn-default">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                     
                  </div>
                </div>
                 
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
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="../../assets/global/plugins/respond.min.js"></script>  
    <![endif]-->  
    <?php include "dist/includes/shop-script.php";?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>