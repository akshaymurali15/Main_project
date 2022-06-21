<?php
include 'db.php';
$su_id=$_GET['a_id'];
$sts=$_GET['ss'];
$emll=$_GET['emul'];
$emm=$_GET['emmm'];

if ($sts == 'BLOCKED') {
    mysqli_query($conn,"UPDATE `login` SET `Status`= 'ACCEPTED' WHERE Login_id ='$su_id'");//status 1 indicate unblock
    echo "<script>alert('successfully unblocked');</script>";
    header("location: veriblo.php?emi=$emm");
    
} else {
mysqli_query($conn,"UPDATE `login` SET `Status`= 'BLOCKED' WHERE Login_id ='$su_id'");//status 2 indicate block
echo "<script>alert('successfully blocked');</script>";
header("location: veriunbl.php?emai=$emll");
}

       
?>