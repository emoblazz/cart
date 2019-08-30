<div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="img/uploads/logo.png" alt="Cornel Grocery Store" style="height: 40px"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">0 item/s</a>
            <a href="javascript:void(0);" class="top-cart-info-value">P0.00</a>
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
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
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
