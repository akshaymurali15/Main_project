<?php 
include 'db.php';

// $result=mysqli_query($conn,"SELECT * FROM `signup` join login on signup.Login_id=login.Login_id where Status='REJECTED'");
$result=mysqli_query($conn,"SELECT * FROM `signup` join login on signup.Login_id=login.Login_id where Status='REJECTED'");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BARRELL OF BOOKS </title>
  <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
  <?php include 'sample.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=""></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>AADHAAR_NO</th>
                    <th>AADHAAR_UPLOAD</th>
                    
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row=mysqli_fetch_assoc($result)){ 
                    $imgurl='image/'.$row['Aadhaar_Upload'];
                    $email= $row['Email'];
                    ?>
                  <tr>
                    <td><?php echo $row['Fullname'];?></td>
                    <td><?php echo $row['Aadhaar_no'];?></td>
                    <!-- <td><img src=<?php echo $imgurl ?>width="80" height="40"></td> -->
                    <td><img src="<?php echo $imgurl ?>" width="80" height="40"  ></td>
                    
                    <td><a href="approve.php?a_id=<?php echo $row['Login_id'];?>&& ss=1 && email=<?php echo $email;?>"><Button type="submit" class="btn btn-primary">Accept</Button></a>
                    <a href="reject.php?s_id=<?php echo $row['Login_id'];?>&& ss=0 && email=<?php echo $email;?>"><Button type="submit" class="btn btn-primary">Reject</Button></a>    
                </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<!-- <script src="plugins/pdfmake/pdfmake.min.js"></script> -->
<!-- <script src="plugins/pdfmake/vfs_fonts.js"></script> -->
<!-- <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script> -->
<!-- <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script> -->
<!-- <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php include 'db.php'; ?>
</body>
</html>
