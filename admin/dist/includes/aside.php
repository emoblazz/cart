<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $session_name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="home.php"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o text-red"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="incoming.php"><i class="fa fa-shopping-cart text-blue"></i> Incoming</a></li>
            <li><a href="ready.php"><i class="fa fa-truck text-blue"></i> Ready for Pickup</a></li>
            <li><a href="claimed.php"><i class="fa fa-check-square text-blue"></i> Claimed Orders</a></li>
          </ul>
        </li>
        <li><a href="customer.php"><i class="fa fa-user-o text-red"></i> <span>Customers</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop text-red"></i>
            <span> Inventory Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="product.php"><i class="fa fa-cubes text-blue"></i> Product</a></li>
            <li><a href="category.php"><i class="fa fa-tags text-blue"></i> Category</a></li>
            <li><a href="stockin.php"><i class="fa fa-external-link text-blue"></i> Stockin</a></li>
            <li><a href="supplier.php"><i class="fa fa-users text-blue"></i> Supplier</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart text-red"></i>
            <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="user.php"><i class="fa fa-users text-blue"></i> User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table text-red"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="near.php"><i class="fa fa-calendar-minus-o text-blue"></i> Near Expiry</a></li>
            <li><a href="expired.php"><i class="fa fa-calendar-times-o text-blue"></i> Expired</a></li>
            <li><a href="damaged.php"><i class="fa fa-chain-broken text-blue"></i> Damaged</a></li>
            <li><a href="out.php"><i class="fa fa-sign-out text-blue"></i> Out of Stock</a></li>
            <li><a href="reorder.php"><i class="fa fa-bullhorn text-blue"></i> Low Inventory</a></li>
            <li><a href="sales.php?year=2019"><i class="fa fa-bar-chart text-blue"></i> Sales 2019</a></li>
            <li><a href="sales.php?year=2020"><i class="fa fa-bar-chart text-blue"></i> Sales 2020</a></li>
            <li><a href="sales.php?year=2021"><i class="fa fa-bar-chart text-blue"></i> Sales 2021</a></li>
            <li><a href="sales.php?year=2022"><i class="fa fa-bar-chart text-blue"></i> Sales 2022</a></li>
            <li><a href="sales.php?year=2023"><i class="fa fa-bar-chart text-blue"></i> Sales 2023</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
