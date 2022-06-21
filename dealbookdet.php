<?php 
include 'db.php';
$bo_id=$_GET['b_id'];
$result=mysqli_query($conn,"SELECT * FROM `books` where book_id='$bo_id'");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BARELL OF BOOKS</title>
  <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">

  <?php include 'db.php'; ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar2.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book Detailed</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
                  <!-- /.card-header -->
             <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                 <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <h3><?php echo $row['Book_name'];?> <br>
                        ₹<?php echo $row['Price'];?> </h3>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                      <img src="bookimages/<?php echo $row['Image'];?>" alt="<?php echo $row['Image'];?>" width="250" height="350" style="margin-left:400px;"><br>
                          <h5><b>Author: </b> <?php echo $row['Author_name'];?> <br>
                          <b>Story Line:</b><div style="margin:-23px 0 0 100px;"><?php echo $row['description'];?></div></h5>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
</div></div>
      <!-- Main content -->
        
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="#">BARELL OF BOOKS</a>.</strong>
      
      <div class="float-right d-none d-sm-inline-block">
        <b></b>
      </div>
    </footer>
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'db.php'; ?>
</body>
</html>
