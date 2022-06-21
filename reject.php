<?php
include 'db.php';
$aa_id=$_GET['s_id'];
$ss=$_GET['ss'];
$em=$_GET['email'];
if($ss == 0){
    $ap =  $ap2 = mysqli_query($conn,"UPDATE `login` SET `Status`='ADMINREJECT' WHERE Login_id='$aa_id'");
   
}  
header("Location:verirej.php?emai=$em");

?>