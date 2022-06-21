<?php 
error_reporting(0);
$iid = $_GET['id'];
$con = mysqli_connect("localhost","root","","bar1");
include 'sample.php';
$uid=$_SESSION['UserID'];

 if(isset($_POST['submit']))
 {

    $name=$_POST['content'];

   $sq= mysqli_query($conn,"INSERT INTO `admin-reply`(`cm_id`, `content`) VALUES ('$iid','$name')");
if($sq){
        echo "<script>alert('Added');</script>";
        header("location:write_complaints.php");
 }} 


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
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">REPLY COMPLAINTS</h1>
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

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">REPLY TO USER</h3>
              </div>

    <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName"></label>
                    <input type="text" class="form-control" name="content" placeholder="Enter Reply" style="height:200px;"></textarea>
                  </div>
                  <div class="input-group-append">
                        <input type="submit" class="btn btn-success" style="margin-left:250px;" value="SEND" name="submit">
                        <input type="reset" class="btn btn-danger" style="margin-left:50px;" value="RESET">
                      </div>
                      <!-- <div class="input-group-append">
                        <input type="submit" class="btn btn-success" style="margin-left:250px;" value="SEND" name="submit">
                        <input type="reset" class="btn btn-danger" style="margin-left:50px;" value="RESET">
                      </div> -->
                    </div>
                  </div>
                </div>
</form>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'db.php'; ?>
</body>
</html>
