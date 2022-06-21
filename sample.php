<?php
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
if ($_SESSION['UserID'] == "") {
    header('location:LOGIN.php');
}
?>
<head>
    <style>
        * Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

    </style>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="122.jpg" alt="BOK'S" class="brand-image img-circle elevation-3" style="opacity: .8">
        <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">
        <span class="brand-text font-weight-light">BARELL OF BOOKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="009.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Akshay</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <div class="sidenav">
            <a href="mainadmin.php">Dashboard</a><br>
            <button class="dropdown-btn"><i class='bx bx-user-circle'></i> &nbsp; VIEW<i class="fa fa-caret-down"></i><br>
            </button>
            <div class="dropdown-container">
            <a href="Requests.php"><i class='bx bxs-user-detail' ></i> &nbsp; Request</a>
                <a href="viewusers.php"><i class='bx bxs-user' ></i> &nbsp; Users</a>
                <a href="view_dealers.php"><i class='bx bxs-user' ></i> &nbsp; Dealers</a>
                <!-- <a href="adminviewdis.php"><i class='bx bxs-user' ></i> &nbsp; Distributors</a> -->
                <a href="admindeli.php"><i class='bx bxs-user' ></i> &nbsp; Delivery person</a>
                <a href="REJusers.php"><i class='bx bxs-user-x' ></i> &nbsp; Rejected users</a>
            </div>
            <button class="dropdown-btn">
            <i class='bx bxs-user-plus'></i>&nbsp;
            ADD   
            </button>
            <div class="dropdown-container">
            <a href="add_books.php"><i class='bx bxs-book-add' ></i> &nbsp; Add books</a>
                <a href="add_dealer.php"><i class='bx bxs-user-plus'></i> &nbsp; Add dealers</a>
                <!-- <a href="adddis.php"><i class='bx bxs-user-plus'></i> &nbsp; Add distributors</a> -->
            </div>
            <button class="dropdown-btn">
            <i class='bx bxs-book'></i>&nbsp; BOOKS<i></i>
                
            </button>
            <div class="dropdown-container">
            <a href="admin_view_books.php"><i class='bx bxs-book-reader' ></i> &nbsp; View book</a>
                <a href=""><i class='bx bxs-cart-alt' ></i> &nbsp; Orders</a>
                <a href="user_complaints.php"><i class='bx bxs-comment-detail'></i> &nbsp; User complaints</a>
            </div>
            <button class="dropdown-btn">
            <i class='bx bxs-comment-detail'></i>&nbsp;
            CHATS   
            
            </button>
            <div class="dropdown-container">
            <a href="#"><i class='bx bxs-comment-detail' ></i> &nbsp; DEALER</a>
                <!-- <a href="#"><i class='bx bxs-comment-detail'></i> &nbsp; DISTRIBUTOR</a> -->
                
            </div>
            <a href="logout.php"><i class='bx bxs-user-circle'></i> &nbsp; LOGOUT</a>


        </div>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}  
</script>