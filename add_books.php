<?php 
include 'db.php';

 if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $ed=$_POST['exampleInputedition'];
    $auth=$_POST['exampleInputEmail1'];    
    $pric=$_POST['exampleInputPhone1'];
    $stry=$_POST['exampleInputPlace1'];
    $cate=$_POST['exampleInputPassword1'];

    $fileName=$_FILES["file"]["name"];
    $targetDir="bookimages/";
    $targetFilePath = $targetDir . $fileName; 
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    // mysqli_query($conn, "INSERT INTO `books`( `Book_name`, `Type_id`, `Price`, `description`, `Image`, `Status`, `Author_name`) VALUES ('$name','$cate','$pric','$stry','$fileName','YES','$auth')");
    mysqli_query($conn,"INSERT INTO `books`(`Book_name`, `Type_id`, `Edition`, `Price`, `description`, `Image`, `Status`, `Author_name`) VALUES ('$name','$cate','$ed','$pric','$stry','$fileName','YES','$auth')");
        echo "<script>alert('Added');</script>";
        // echo "<script>window.history.back();</script>";
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
  <style>
    .form-group a{
      float:right;
    }
  </style>
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
  <?php include 'sample.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Books</h1>
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

    <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  <a href="add_ct.php">+Add new</a>
                    <label for="exampleInputPassword1">Category</label>
                    <select class="form-control" name="exampleInputPassword1" required>
                    <option value="select">select</option>
                    <?php
                    $sq=mysqli_query($conn,"SELECT * FROM `book-type`");
                    while($rr=mysqli_fetch_array($sq)){?>
                      <option value="<?php echo $rr['Type_id']; ?>"><?php echo $rr['Type_name']; ?></option>
                    <?php }
                    ?>
                    </select>
                    
                  </div>
                <div class="form-group">
                    <label for="exampleInputName1">Book Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter book name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edition</label>
                    <input type="text" class="form-control" name="exampleInputedition" placeholder="Enter Edition" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Author Name</label>
                    <input type="text" class="form-control" name="exampleInputEmail1" placeholder="Enter author name" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPhone1">Price</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter price" required>
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="form-control" name="exampleInputPassword1" required>
                    <option value="select">select</option>
                    <?php
                    $sq=mysqli_query($conn,"SELECT * FROM `book-type`");
                    while($rr=mysqli_fetch_array($sq)){?>
                      <option value="<?php echo $rr['Type_id']; ?>"><?php echo $rr['Type_name']; ?></option>
                    <?php }
                    ?>
                    </select>
                    
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputPlace1">Story Line</label>
                    <input type="text" class="form-control" name="exampleInputPlace1" placeholder="Enter story" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPhone1">Price</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter price" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Add Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                        <label class="custom-file-label" for="exampleInputFile">Upload Front Page</label>
                      </div>
                      <div class="input-group-append">
                        <input type="submit" class="btn btn-success" style="margin-left:20px;" value="Add Book" name="submit">
                      </div>
                    </div>
                  </div>
                </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'db.php'; ?>
</body>
</html>
