<div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="img/uploads/logo.png" alt="Cornel Grocery Store" style="height: 40px"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <?php 
          $queryitems=mysqli_query($con,"SELECT * FROM cart natural join product where cust_id='$session_id'")or die(mysqli_error($con));
                 $i=0;
                 $grand=0;
                 while($rowitems=mysqli_fetch_array($queryitems)){
                   $qty=$rowitems['qty'];
                   $price=$rowitems['prod_price'];
                   $total=$qty*$price;
                   $grand=$grand+$total;
                   $i=$i+$qty;
               }
        ?>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count"><?php if ($i==0) echo "0"; else echo $i;?> item/s</a>
            <a href="javascript:void(0);" class="top-cart-info-value">P<?php if ($grand==0) echo "0.00"; else echo $grand;?></a>
          </div>
          <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                        
          
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Product
                
              </a>
              <ul class="dropdown-menu">
                <?php
                  $c=mysqli_query($con,"SELECT * FROM category order by cat_name")or die(mysqli_error($con));
                    while ($rowc=mysqli_fetch_array($c)){
                ?> 
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <a href="product-list.php?category=<?php echo $rowc['cat_name'];?>"><?php echo $rowc['cat_name'];?></a>
                      </div>
                    </div>
                  </div>
                </li>
                <?php }?>
              </ul>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            
            
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="result.php" method="post">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control" name="product">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
