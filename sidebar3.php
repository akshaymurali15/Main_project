<?php
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
if($_SESSION['UserID']==""){
    header('location:LOGIN.php');
}
$sql = mysqli_query($conn,"SELECT * from `login` where Login_id='$uid'");


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="user_dashboard.php" class="brand-link">
      <img src="122.jpg" alt="BRS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BARELL OF BOOKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php while($p=mysqli_fetch_assoc($sql)){ ?>
        <div class="info">
          <a href="#" class="d-block"><?php echo $p['username'];?></a>
        </div>
        <?php } ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="user_dashboard.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DASHBOARD</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="view_books.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                VIEW BOOKS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cart.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 CART
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="write_complaints.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 COMPLAINTS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="viewrep.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 ADMIN's REPLY
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="proupd.php?id=<?= $uid ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 UPDATE PROFILE
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Logout.php" class="nav-link">
              <i class="nav-icon fas fa-reply"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

