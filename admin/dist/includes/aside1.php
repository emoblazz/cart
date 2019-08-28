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
        <li>
          <a href="incoming.php">
            <i class="fa fa-table text-red"></i> <span>Pending Orders</span>
          </a>
        </li>
        <li>
          <a href="claimed.php">
            <i class="fa fa-table text-red"></i> <span>Claimed Orders</span>
          </a>
        </li>
        <li>
          <a href="sales.php">
            <i class="fa fa-table text-red"></i> <span>Sales Reports</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
