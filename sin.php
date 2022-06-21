<?php
include 'db.php';
ob_start();
?>


<!DOCTYPE html>
<html>

<head>
  <title></title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="signup.css?v=<?php echo time(); ?>">
  <script>
    function fileValidation() {
      var fileInput = document.myform.file;
      var filePath = fileInput.value;
      var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;

      if (!allowedExtensions.exec(filePath)) {
        document.getElementById("upl").innerHTML = "**Image should be jpg,png,jpeg";
        fileInput.value = '';
        return false;
      }
    }
  </script>
  <style>
    button{
background-color: transparent;
color: white;
padding: 15px 32px;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  width:15%;
    margin-left:22%;
    margin-right:20%;
    
    }
    </style>

</head>

<body>


  <form method="POST" name="myform" onsubmit="return validate1();" enctype="multipart/form-data" action="#">

    <h1>BARELL OF BOOKS</h1>
    <div class="flex-box">
      <label>FULLNAME-</label>
      <input type="text" name="fn" id="nf" placeholder="FULLNAME" autocomplete="off" onclick="return funclear();" onchange="Validateaa();" onkeydown="return alphaOnly(event);">

      <span id="fna" style="color:white"></span>
    </div>

    <script>
      function Validateaa() {
        var val = document.getElementById('nf').value;

        if (!val.match(/^[A-Z][A-Za-z]{3,}$/)) {
          document.getElementById("fna").innerHTML = "**Please enter your FullName";
          return false;
          document.getElementById('nf').innerHTML = " ";
        }
        document.getElementById('fna').innerHTML = " ";
        return true;
      }
    </script>


    <div class="flex-box">
      <label>USERNAME-</label>
      <input type="text" name="un" id="nu" placeholder="USERNAME" autocomplete="off" onchange="return validate();" onclick="return funclear();" onkeyup="chckUserfun(this.value)">
      <span id="usrnm" style="color:red"></span>
    </div>

    <div class="flex-box">
      <label>PASSWORD-</label>
      <input type="password" name="ps" id="sp" placeholder="PASSWORD" onchange="Validp();">
      <span id="ssrd" style="color:white"></span>
    </div>
    <script>
      function Validp() {
        var val = document.getElementById('sp').value;

        if (!val.match(/^[A-Za-z0-9!-*]{6,15}$/)) {
          document.getElementById('ssrd').innerHTML = "Password should contain atleast 6 characters";

          document.getElementById('sp').value = "";
          return false;
        }
        document.getElementById('ssrd').innerHTML = " ";
        return true;
      }
    </script>
    <div class="flex-box">
      <label>MOBILE-</label>
      <input type="tel" name="mn" id="nm" placeholder="MOBILE.NO" minlength="10" maxlength="10" autocomplete="off" onchange="Validat();">
      <span id="ile" style="color:white"></span>
    </div>
    <script>
      function Validat() {
        var val = document.getElementById('nm').value;

        if (!val.match(/^[7-9][0-9]{1,9}$/)) {
          document.getElementById('ile').innerHTML = "Only Numbers are allowed and must contain 10 number";


          document.getElementById('nm').value = "";
          return false;
        }
        document.getElementById('ile').innerHTML = " ";
        return true;

      }
    </script>
    <div class="flex-box">
      <label>EMAIL-</label>
      <input type="email" name="em" id="me" placeholder="EMAIL" autocomplete="off" onchange="Validata();">
      <span id="mla" style="color:white"></span>
    </div>
    <script>
      function Validata() {
        var val = document.getElementById('me').value;

        if (!val.match(/([A-z0-9_\-\.]){1,}\@([A-z0-9_\-\.]){1,}\.([A-Za-z]){2,4}$/)) {
          document.getElementById('mla').innerHTML = "Enter a Valid Email";

          document.getElementById('me').value = "";
          return false;
        }
        document.getElementById('mla').innerHTML = " ";
        return true;
      }
    </script>
    <div class="flex-box">
      <label>ADDRESS-</label>
      <input type="text" name="ad" id="da" placeholder="ADDRESS" autocomplete="off" onchange="Validname();">
      <span id="dre" style="color:white"></span>
    </div>
    <script>
      function Validname() {
        var val = document.getElementById('da').value;

        if (!val.match(/^[A-Z][a-z" "]{3,}$/)) {
          document.getElementById('dre').innerHTML = "Start with a Capital letter";
          document.getElementById('da').value = "";
          return false;
        }
        document.getElementById('dre').innerHTML = " ";
        return true;
      } 
      
      
    </script>

    <div class="flex-box">
    
    <label for="birth_date">Date Of Birth :</label>
                            <input type="text" name="dob" id="dob"  title="Date of birth" placeholder="DD/MM/YYYY" onchange="ValidateDOB()" required/>
                        </div>
                        <span class="error" id="lblError" style="color: red; float:right; margin-top:-50px;"></span>
                        <script>

</script>

    
    <div class="flex-box">
      <label>AADHAR.NO-</label>
      <input type="text" name="an" id="na" placeholder="AADHAR.NO" minlength="12" maxlength="12" onchange="Validateaaa();">
      <span id="dha" style="color:white"></span>
    </div>
    <script>
      function ValidateDOB() {
        var lblError = document.getElementById("lblError");

        var dateString = document.getElementById("dob").value;
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;

        if (regex.test(dateString)) {
            var parts = dateString.split("/");
            var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
            var dtCurrent = new Date();
            lblError.innerHTML = "Only 14+ are allowed"
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 15) {
                return false;
            }

            if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 15) {

                if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                    return false;
                }
                if (dtCurrent.getMonth() == dtDOB.getMonth()) {

                    if (dtCurrent.getDate() < dtDOB.getDate()) {
                        return false;
                    }
                }
            }
            lblError.innerHTML = " ";
            return true;
        } else {
            lblError.innerHTML = "Enter date in DD/MM/YYYY format ONLY."
            return false;
        }
    }
    </script>
    <div class="flex-box">
      <label>AADHAR UPLOAD-</label>
      <input type="file" name="file" id="ua" placeholder="AADHAR UPLOAD" onclick="return funclear();" onchange="return fileValidation()">
      <span id="upl" style="color:white"></span>
    </div>

    <div class="sub">
      <button class="button"><h3><u><a href="payment1.php">Payment</u></h3></a</button>
    </div>
    <br>

    <div class="sub">
      <input type="submit" name="submit" value="REGISTER" onsubmit=" return ValidateDOB()">
    </div>
    </div>



    <nav>

      <ul>
        <li><a href="main.php">HOME</a></li>
        <li><a href="about.php">ABOUT US</a></li>

        <li><a href="">CONTACT</a></li>

        <li><a href="LOGIN.php">LOGIN</a></li>
      </ul>
    </nav>

  </form>
</body>
<?php
if (isset($_POST['submit'])) {
  $fname = $_POST["fn"];
  $usrnm = $_POST["un"];
  $pssrd = $_POST["ps"];
  $nmbr = $_POST["mn"];
  $eml = $_POST["em"];
  $addr = $_POST["ad"];
  $dobi = $_POST["dob"];
  $adno = $_POST["an"];
  $file = $_FILES["file"]['name'];
  $targetDir = "image/";
  $targetFilePath = $targetDir . $file;
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
  $Role = $_POST["role"];
  $stat = 0;
  $res = mysqli_query($conn, "SELECT * from `login` where username='$usrnm'");
  if (mysqli_num_rows($res) > 0) {
    //echo "<script> alert('Username already registered'); </script>";
  } else {
    $log = mysqli_query($conn, "INSERT INTO `login`(`username`, `password`, `Role`,`Status`) VALUES ('$usrnm','$pssrd','$stat','REJECTED')");
    $roleID = mysqli_insert_id($conn);
    $sql = mysqli_query($conn, "INSERT INTO `signup`( `Login_id`, `Fullname`, `Mobile_no`, `Email`, `Address`, `D.O.B`, `Aadhaar_no`, `Aadhaar_Upload`,`type`) VALUES ('$roleID','$fname','$nmbr','$eml','$addr','$dobi','$adno','$file','$Role')");

    $sql1 = mysqli_query($conn, "INSERT INTO `user`(  `Name`, `Mobile`, `Email`,`Login_id`, `Address`, `D.O.B`, `Aadhaar_no`, `Aadhaar_Upload`) VALUES ('$fname','$nmbr','$eml','$roleID','$addr','$dobi','$adno','$file')");

    // else if($Role=="2"){
    //   $sql2 = mysqli_query($conn,"INSERT INTO `dealer`(  `Name`, `Mobile`, `Email`,`Login_id`, `Address`, `Aadhaar_no`, `Aadhaar_Upload`,`Status`) VALUES ('$fname','$nmbr','$eml','$roleID','$addr','$adno','$file','1')");
    // }


  }
  header("location:LOGIN.php");
  ob_end_flush();
}

?>
<script>
  function validate1() {
    if (document.myform.fn.value.trim() == "") {
      document.getElementById("fna").innerHTML = "**Please enter your FullName";
      return false;
    }

    if (!document.myform.fn.value.match(/^[A-Z][a-z" "]{3,}$/)) {
      document.getElementById("fna").innerHTML = "**Keep First Letter Capital";
      return false;
    }
    if (document.myform.un.value.trim() == "") {
      document.getElementById("usrnm").innerHTML = "**Please enter your UserName";
      return false;
    }
    if (document.myform.ps.value.trim() == "") {
      document.getElementById("ssrd").innerHTML = "**Please enter your Password";
      return false;
    }
    if (document.myform.mn.value.trim() == "") {
      document.getElementById("ile").innerHTML = "**Please enter your Mobile.No";
      return false;
    }
    if (document.myform.mn.value.length < 10 || document.myform.mn.value.length > 10) {
      document.getElementById("ile").innerHTML = "**Please enter your 10 digit Mobile.No";

      return false;
    }
    var x = document.myform.em.value;
    var atposition = x.indexOf("@");
    var dotposition = x.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {

      document.getElementById("mla").innerHTML = "**Please enter your Email-ID";
      return false;

    }
    if (document.myform.ad.value.trim() == "") {
      document.getElementById("dre").innerHTML = "**Please enter your Address";
      return false;
    }


    if (document.myform.dob.value == "") {
      document.getElementById("obd").innerHTML = "**Please enter your Date of Birth";
      return false;
    }
    if (document.myform.an.value.trim() == "") {
      document.getElementById("dha").innerHTML = "**Please enter your Aadhaar.No";
      return false;
    }
    if (document.myform.an.value.length < 12 || document.myform.an.value.length > 12) {


      return false;
    }

    if (document.myform.file.value == "") {
      document.getElementById("upl").innerHTML = "**Please upload your file";
      return false;
    }
    if (document.myform.role.value.trim() == "" || document.myform.role.value == "select") {
      document.getElementById("role").innerHTML = "**Please select your Role";
      return false;
    } else {
      alert('Username succesfully registered');
      return true;
    }
  }
  //         function funclear() {
  //   document.getElementById('fna').innerHTML = '';
  //   document.getElementById('usrnm').innerHTML = '';
  //   document.getElementById('ssrd').innerHTML = '';
  //   document.getElementById('ile').innerHTML = '';
  //   document.getElementById('mla').innerHTML = '';
  //   document.getElementById('dre').innerHTML = '';
  //   document.getElementById('obd').innerHTML = '';
  //   document.getElementById('dha').innerHTML = '';
  //   document.getElementById('upl').innerHTML = '';
  //   document.getElementById('role').innerHTML = '';
  //   return false;
  // }
  function chckUserfun(val) {

    $.ajax({
      type: "POST",
      url: "checkuser.php",
      data: 'username=' + val,
      success: function(data) {

        $("#usrnm").html(data);
      }

    });

  }

  function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8 || key == 32);
  };
</script>

