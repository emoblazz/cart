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
    <?php 
    if (isset($session_id))
      include "dist/includes/header.php";
    else
      include "dist/includes/shop-header.php";
    ?>


    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <?php // include "dist/includes/shop-slider.php";?>
    
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
          
          <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="javascript:;">Pages</a></li>
            <li class="active">About</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>About</h1>
            <div class="content-page">
              <div class="row">
                <div class="col-md-7 col-sm-3">
                  <h2>About Us</h2>
                  <p>" The Cornel Grocery Store was owned by Mr. Cornel but since Mr cornel died his wife is the one who managed the store. Mrs. Fatima Cornel now is thw owner of the store and it was operating this for 18 years and still operating today. The store is located at the left side of Victorias Commercial Center (shopping Mall) at Yap Quiña street, Victorias City, Negros Occidental Philippines . 
                  <h3>Store Time</h3>
                  Monday - Sunday <br>
                  8am - 5pm<br><hr>

                  " ALL YOU CUSTOMERS IS YOUR PARTNER IN YOUR MISSION"</p>
                  
                </div>
                <div class="col-md-2 col-sm-3 sidebar2">
                  <img src="img/uploads/cornel.png" alt="Berry Lace Dress"></a>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>

        
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
