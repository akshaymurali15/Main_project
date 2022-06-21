<?php
include 'db.php';


if(isset($_POST['btn_submit'])){
    session_start();
    $user = $_POST['urnm'];
    $pass = $_POST['pswd'];
    //$pass1 = md5($pass);

    $sql = mysqli_query($conn,"SELECT * from `login` where username='$user' and password='$pass'");
    if(mysqli_num_rows($sql)>0){
        while($r= mysqli_fetch_array($sql)){
            if($r['Status']=='ACCEPTED'){
                if($r['Role']==0){
                    $_SESSION['UserID']=$r['Login_id'];
                    header("location:user_dashboard.php");
                }else if($r['Role']=='1'){
                 $_SESSION['UserID']=$r['Login_id'];
                    header("location:mainadmin.php");
                }
                else if($r['Role']=='Dealer'){
                    $_SESSION['UserID']=$r['Login_id'];
                       header("location:dealdash.php");
                   }
                   else if($r['Role']=='distributor'){
                    $_SESSION['UserID']=$r['Login_id'];
                       header("location:disdash.php");
                   }
                   else if($r['Role']=='delivery'){
                    $_SESSION['UserID']=$r['Login_id'];
                       header("location:delidash.php");
                   }
    
                else{
                    echo "<script>alert('Added');</script>";
                    header('location:user_dashboard.php');
                }
            }


            
        else {
            echo "<script>alert('you are not allowed to Login')</script>";
        }
    }
}
    else{
        echo "<script>alert('Invalid user');</script>";
    }
        

}


?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="LOGIN.css?v=<?php echo time(); ?>">
        <script type="text/javascript">
         function preventBack() {
          window.history.forward();
           }
         setTimeout("preventBack()", 0);
         window.onunload = function() { null};

      </script>
        
    </head>
    <body>
    <form method="POST" name="myform" onsubmit="return validate();">
        <h1>BARELL OF BOOKS</h1>
        <div class="flex"> 
        <label>USERNAME-</label>
        <input type="text" name="urnm" placeholder="USERNAME" autocomplete="off">
        <span id="urn" style="color:white"></span>
        </div>
        <div class="id" id="uname"></div>
        <div class="flex">
        <label>PASSWORD-</label>
        <input type="password" name="pswd" placeholder="PASSWORD" autocomplete="off">
        <span id="ords" style="color:white"></span>
        </div>
        <div class="id" id="uname"></div>
        <input type="submit" name="btn_submit" value="LOGIN">
        <nav>
            
            <ul>
                <li><a href="main.php">HOME</a></li>
                <li><a href="about.php">ABOUTUS</a></li>
                <li><a href="">CONTACT</a></li>

                
            </ul>
        </nav>
         
    </form>  
    </body>    
    <script>
      function validate()  
          {  
               if (document.myform.urnm.value.trim()=="")
                {
                    document.getElementById("urn").innerHTML = "**Please enter your UserName";
                 return false;
                }
                
                if (document.myform.pswd.value.trim() =="" )
                 {
                    document.getElementById("ords").innerHTML = "**Please enter your password";
                 
                 return false;
                 }
            }
    </script>