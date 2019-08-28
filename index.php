<!DOCTYPE html>
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
    <?php include "dist/includes/shop-slider.php";?>
    
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <?php //include "dist/includes/shop-sale.php";?>
        
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT --> 
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
        <?php include "dist/includes/shop-sidebar.php";?>
          
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Items</h2>
            <div class="row product-list">
<?php 
      $queryp=mysqli_query($con,"SELECT * FROM product order by prod_name")or die(mysqli_error($con));
                 while ($rowp=mysqli_fetch_array($queryp))
                 {
?>              
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="dist/uploads/<?php echo $rowp['prod_pic'];?>" class="img-responsive" alt="<?php echo $rowp['prod_name'];?>" style="width:250px;height: 300px">
                    <div>
                      <a href="dist/uploads/<?php echo $rowp['prod_pic'];?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html"><?php echo $rowp['prod_name'];?></a></h3>
                  <div class="pi-price">P<?php echo $rowp['prod_price'];?></div>
                  <?php 
                  if (isset($session_id))
                    echo "<a href='add_cart.php?prod_id=$rowp[prod_id]' class='btn btn-primary add2cart'>Add to cart</a>";
                  else
                    echo "<a href='login.php' class='btn btn-default add2cart'>Login to Add</a>";
                  ?>
                </div>
              </div>
              
              <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="dist/uploads/<?php echo $rowp['prod_pic'];?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2><?php echo $rowp['prod_name'];?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>P</span><?php echo $rowp['prod_price'];?></strong>
                    </div>
                    <div class="availability">
                      Available: <strong><?php echo $rowp['prod_qty'];?></strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $rowp['prod_desc'];?></p>
                  </div>
                  </div>
                  <div class="product-page-cart">
                    <?php 
                  if (isset($session_id))
                    echo "<a href='add_cart.php?prod_id=$rowp[prod_id]' class='btn btn-primary add2cart'>Add to cart</a>";
                  else
                    echo "<a href='login.php' class='btn btn-default add2cart'>Login to Add</a>";
                  ?>
                  </div>
                </div>
              </div>
            </div>
    
    <!-- END fast view of a product -->
    <!-- END fast view of a product -->
<?php }?></div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>

    <div class="modal fade" id="myModal">
                          <div class="modal-dialog">
                            <div class="modal-content" style="text-align: center;">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Disclaiming</h4>
                              </div>
                              <form role="form">
                                <div class="modal-body">
                                    <div class="form-group">
                                      <p>"Thank you for visiting our online grocery store but this is only for people who they have taken their order among the store once again. Thank You"<br>
                                        by: Fatima Cornel
                                      </p>
                                    </div>
                                    <div class="form-group">
                                      <h4>Location </h4>
                                      <p>
                                          Victorias Commercial Center (Shopping Malls)<br>
                                        @ Yap Quina Street, Victorias City, Negros Occidental, Philippines<br>

                                      "Cornel Grocery Store at the left side"
                                      </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal --> 
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
    <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</body>
<!-- END BODY -->
</html>
