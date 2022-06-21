<?php 
include 'db.php';
include_once 'sample.php'; 
?> <?php
  
  if(isset($_POST['submit']))
  {
    $catname = $_POST['cname'];
    $catdes = $_POST['cdes'];
    $status = 0;
    $myqry6="SELECT cat_name FROM tbl_category where cat_name='$catname'";
    $myres6=mysqli_query($con,$myqry6);
    $num=mysqli_fetch_array($myres6);
    if($num>0)
    {
        echo "<script>alert('Category already exists') </script>";
    
    } else{
        
        $sql="INSERT INTO  tbl_category(cat_name,cat_descri,cat_status) VALUES ('$catname','$catdes','$status')";
    mysqli_query($con,$sql);
    }
    header("Location:categories.php");
  }
 
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="adminlte.css?v=<?php echo time(); ?>">
    <style>
        .loginPopup {
            text-align: center;
            width: 100%;
            width: 100%;

        }

        .formPopup {
            position: fixed;
            left: 30%;
            top: 10%;
            background-color: white;
            border-collapse: collapse;
            border-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            margin: auto;
            padding: 50px 30px 50px 30px;
        }

        .labels {
            text-transform: uppercase;
            float: left;
            text-align: left;
        }

        .inputs {
            width: 300px;
            float: right;
            margin-right: 20px;
            margin-left: 20px;
        }

        .cnbtn {
            float: left;
            background-color: red;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;

        }

        .chbtn {
            float: right;
            margin-right: 20px;
            background-color: lawngreen;
            padding: 3px 7px 3px 7px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }
    </style>

</head>

<body>


    <form method="post" enctype="multipart/form-data">
        <td>
            <button class="btn2" onclick="openForm()"><a>Place Order</a></button>
        </td>
        <div class="loginPopup">
            <div class="formPopup" id="popupForm">

                <h2>Add neW Category</h2><br><br>

                <label class="labels">Category Name</label>
                <input type="text" id="cat_name" placeholder="Category name" name="cat_name" required autocomplete="off" class="inputs"><br><br>
                <div class="obtns">
                    <button type="button" class="cnbtn" ><a href="cart.php">Cancel</a></button>
                    <input type="submit" name="submit" class="chbtn" value="Add"><br>
                </div>
            </div>
        </div>
        
    </form>
   
</body>
</html>
