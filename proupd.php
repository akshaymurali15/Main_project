<?php 
include 'db.php';
// session_start();
$su_id= $_GET['id'];
//$result=mysqli_query($conn,"SELECT * FROM `dealer` join login on `dealer`.Login_id=login.Login_id where login.Role=2");
$result=mysqli_query($conn,"SELECT user.*,login.* from user,login WHERE user.Login_id=login.Login_id and login.Login_id='$su_id'");

if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $unm=$_POST['exampleInputuserName1'];
    $email=$_POST['exampleInputEmail1'];    
    $phone=$_POST['exampleInputPhone1'];
    $place=$_POST['exampleInputPlace1'];
    $passw=$_POST['exampleInputPassword1'];

    mysqli_query($conn, "UPDATE `user` SET `Name`='$name',`Mobile`='$phone',`Email`='$email',`Address`='$place' WHERE Login_id='$su_id'");

    mysqli_query($conn,"UPDATE `login` SET `username`='$unm',`password`='$passw' WHERE  Login_id='$su_id'");
     echo "<script>alert('UPDATED');</script>";
     header('location:user_dashboard.php'); 
 }

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

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar3.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">PROFILE UPDATION</h1>
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
                <h3 class="card-title">Enter below fields</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php while($row=mysqli_fetch_assoc($result)){ ?>
              <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter name" value="<?php echo $row['Name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">UserName</label>
                    <input type="text" class="form-control" name="exampleInputuserName1" placeholder="Enter name" value="<?php echo $row['username'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="exampleInputPassword1" placeholder="Password" value="<?php echo $row['password'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['Email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter phone" value="<?php echo $row['Mobile'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="exampleInputPlace1" placeholder="Enter place" value="<?php echo $row['Address'];?>">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update" name="submit" style="margin-left:350px;">
                  
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
      <!-- /.content -->
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'db.php'; ?>
</body>
</html>
