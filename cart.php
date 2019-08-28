<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php }?>

<?php //include "dist/includes/session.php";?>
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
<?php //include "dist/includes/session.php";?>
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
            <h1>Shopping cart</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Item</th>
                    <th class="goods-page-ref-no">Description</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total" colspan="2">Total</th>
                  </tr>
<?php
  $query=mysqli_query($con,"SELECT * FROM `cart` natural join product where cust_id='$session_id'")or die(mysqli_error($con));
                          $total=0;
                          $subtotal=0;
                          while ($row=mysqli_fetch_array($query)){
                           $id=$row['cart_id'];    
                           $subtotal=$row['prod_price']*$row['qty'];
                           $total=$total+$subtotal;
?>                   
                  <tr>
                    <td class="goods-page-image">
                      <a href="javascript:;"><img src="dist/uploads/<?php echo $row['prod_pic'];?>" alt="Berry Lace Dress"></a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="javascript:;"><?php echo $row['prod_name'];?></a></h3>
                    </td>
                    <td class="goods-page-ref-no">
                      <?php echo $row['prod_desc'];?>
                    </td>
                    <td class="goods-page-quantity">
                      <span> <a href='cart.php?id=<?php echo $id;?>&action=remove'> <i class="fa fa-minus"> </i></a> </span>
                      <strong><span><?php echo $row['qty'];?></span></strong>
                      <span><a href='cart.php?id=<?php echo $id;?>&action=add'><i class="fa fa-plus"></i></a></span>

                    </td>
                    <td class="goods-page-price">
                      <strong><span>P</span><?php echo $row['prod_price'];?></strong>
                    </td>
                    <td class="goods-page-total">
                      <strong><span>P</span><?php echo number_format($subtotal,2);?></strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" href="javascript:;"></a>
                    </td>
                  </tr>
<?php }?>                  
                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span>P</span><?php echo number_format($total,2);?></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <a class="btn btn-default" href="index.php">Continue shopping <i class="fa fa-shopping-cart"></i></a>
              <a class="btn btn-primary" href="confirm.php">Confirm Order <i class="fa fa-check"></i></a>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>
<?php 
 if (isset($_REQUEST['id']))
 {
    $id=$_REQUEST['id'];
    if (isset($_REQUEST['action']))
    {  
       if ($_REQUEST['action']=="add")
       {
       mysqli_query($con,"UPDATE cart SET qty = qty + 1 where cart_id='$id'")or die(mysqli_error($con)); 
       echo "<script>document.location='cart.php?id=$id'</script>";
     }
      elseif ($_REQUEST['action']=="remove")
      {
        $query1=mysqli_query($con,"SELECT * FROM `cart` where cart_id='$id'")or die(mysqli_error($con));
              $row1=mysqli_fetch_array($query1);
              $qty=$row1['qty'];
              if ($qty<=1)
                   {
                    mysqli_query($con,"DELETE from cart where cart_id='$id'")or die(mysqli_error($con)); 
                   }       
              else{
                  mysqli_query($con,"UPDATE cart SET qty = qty - 1 where cart_id='$id'")or die(mysqli_error($con)); 
                }
       echo "<script>document.location='cart.php?id=$id'</script>";
     }
    }
}
?>
    <!-- BEGIN BRANDS -->
    <?php include "dist/includes/shop-brands.php";?>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <?php include "dist/includes/shop-steps.php";?>
    
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php include "dist/includes/shop-footer.php";?>

    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="assets/frontend/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/frontend/pages/img/products/model3.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/frontend/pages/img/products/model4.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/frontend/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2>Cool green dress with red bell</h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat 
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <a href="shop-item.html" class="btn btn-default">More details</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <?php include "dist/includes/shop-script.php";?>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
