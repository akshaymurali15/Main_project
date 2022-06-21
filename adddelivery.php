<?php 
include 'db.php';

 if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $unm=$_POST['exampleInputuserName1'];
    $email=$_POST['exampleInputEmail1'];    
    $phone=$_POST['exampleInputPhone1'];
    $passw=$_POST['exampleInputPassword1'];
    $ad=$_POST['exampleInputadd'];
    $lic=$_POST['exampleInputlic1'];
    $fileName=$_FILES["file"]["name"];
    $targetDir="profile/";
    $targetFilePath = $targetDir . $fileName; 
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    $res=mysqli_query($conn,"SELECT * from `login` where username='$unm'");
    if(mysqli_num_rows($res)>0){
     echo "<script> alert('Username already registered'); </script>";
    }else{

    $log = mysqli_query($conn, "INSERT INTO `login`(`username`, `password`, `Role`,`Status`) VALUES ('$unm','$passw','delivery','ACCEPTED')" );
    $roleID=mysqli_insert_id($conn);
    mysqli_query($conn,"INSERT INTO `deliveryboy`(`Name`, `Mobile`, `Email`, `Login_id`, `Address`, `Aadhaar_no`, `Aadhaar_Upload`) VALUES ('$name','$phone','$email','$roleID','$ad','$lic','$fileName')");

        echo "<script>alert('Added');</script>";
      }
      header("location: viewdeli.php");
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
  <?php include 'sidebar2.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ADD DELIVERY PERSON</h1>
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">UserName</label>
                    <input type="text" class="form-control" name="exampleInputuserName1" placeholder="Enter User name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="tel" class="form-control" name="exampleInputPhone1" placeholder="Enter Mobile.No" minlength="10" maxlength="10" required pattern="[789][0-9]{9}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="exampleInputadd" placeholder="Enter Address" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Aadhaar_No</label>
                    <input type="tel" class="form-control" name="exampleInputlic1" placeholder="Enter Aadhaar No." minlength="12" maxlength="12" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Aadhaar_Upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                        <label class="custom-file-label" for="exampleInputFile">Upload License</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="submit">
                  <input type="reset" class="btn btn-danger" style="margin-left:20px;">
                  
                    
                </div>
              </form>
            </div>
            <!-- /.card -->
      <!-- /.content -->
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'db.php'; ?>
</body>
</html>
