<?php
include 'dbconnect.php';
session_start();
$b=$_SESSION['r_id'];
//$row1=$_GET['uid'];
$sql=mysqli_query($con,"select b_total from tbl_booking where `r_id`='$b'");
$row3=mysqli_fetch_array($sql);
$p=$row3[0];
if(isset($_POST["submit"]))
{
	$cnme=$_POST['cname'];
	echo $cnme; 
	$num=$_POST['cnum'];
	$cvv=$_POST['cvv'];
		
	$vf=$_POST['vf'];
	/*$c=md5($cnme);
	$num=md5($cnum);
	$cvv=md5($cvv);
	$vf=md5($vf);
	$vt=md5($vt);*/
	
	
$res1=mysqli_query($con,"select cd_amt from tbl_card where r_id=$b");
	$row=mysqli_fetch_array($res1);
		   $d1 =$row[0];
	$res=mysqli_query($con,"select * from `tbl_card` where 
	`cd_name`='$cnme' and `cd_num`='$num' and `cd_cvv`='$cvv' and `cd_validfrom`='$vf' ");
	$row=mysqli_fetch_array($res);
	if($cnme=$row['cd_name'] and $num=$row['cd_num'] and $cvv=$row['cd_cvv']and $vf=$row['cd_validfrom']and $d1>=$p and $d1!=0)
	{	$res1=mysqli_query($con,"select cd_amt from tbl_card where r_id=$b");
	$row=mysqli_fetch_array($res1);
		   $d1 =$row[0];
		   
		   
		  $balance=$d1-$p;
		 $res2=mysqli_query($con,"UPDATE `tbl_card` SET `cd_amt`=$balance WHERE 
		 r_id='$b'");
	header("location:payment_s.php");?>
	<?php
	}
else
	{
		echo "<script>alert('Invalid Card Details or Invalid Account Balance')</script>";
	}
}
?>