<?php 
include 'db.php';

$result=mysqli_query($conn,"SELECT * FROM `user` join `login` on login.Login_id = user.Login_id where login. STATUS IN ('ACCEPTED','BLOCKED');");
// SELECT * FROM `signup` join login on signup.Login_id=login.Login_id
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sample.php'; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>FULLNAME</th>
                    <th>MOBILE</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>AADHAAR_NO</th>
                    <th>AADHAAR_IMAGE</th>
                    
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row=mysqli_fetch_assoc($result)){ 
                     $emul= $row['Email'];
                    ?>
                  <tr>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Mobile'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['Aadhaar_no'];?></td>
                    <td><img src="image/<?php echo $row['Aadhaar_upload'];
                    $emul= $row['Email'];?>" width="80" height="40"></td>
                    <td> <?php if ($row['Status'] == 'BLOCKED') { ?>
                    <a href="blockunblock.php?a_id=<?php echo $row['Login_id'];?>&&ss=BLOCKED&&emmm=<?php echo $emul;?>"><Button type="submit" class="btn btn-primary">UNBLOCK</Button></a>
                    <?php } else { ?>  
                    <a href="blockunblock.php?a_id=<?php echo $row['Login_id'];?>&&ss=ACCEPTED && emul=<?php echo $emul;?>"><Button type="submit" class="btn btn-primary">BLOCK</Button></a>
                    <?php } ?>
                      
                      </td>
               
                  </tr>
                  <?php } ?>
                  </tbody>
                  
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b></b>
    </div>
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">BARELL OF BOOKS</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
<!-- Page specific script -->
</body>
</html>
