<?php 
include 'db.php';
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

<?php 
include_once 'sidebar3.php'; 
$uid=$_SESSION['UserID'];
$csql="SELECT SUM(Price*quantity) AS pricesum FROM cart WHERE Login_id=$uid";
$psl = mysqli_query($conn,$csql);
$psql = mysqli_fetch_assoc($psl);
$sum=$psql["pricesum"]
?>
    <form method="post" enctype="multipart/form-data">
        <td>
            <button class="btn2" onclick="openForm()"><a>Place Order</a></button>
        </td>
        <div class="loginPopup">
            <div class="formPopup" id="popupForm">

                <h2>Place order</h2><br><br>

                <label class="labels">Total Amount</label>
                <input type="text" id="psw" placeholder="total price" name="psw" value="<?php echo "$sum" ?>" required autocomplete="off" class="inputs" readonly><br><br>

                <label class="labels">Delivery Name</label>
                <input type="text" id="products" placeholder="Your Name" name="email" required autocomplete="off" class="inputs"><br><br>

                <label class="labels">phone</label>
                <input type="text" id="products" placeholder="Mobile" name="email" required autocomplete="off" class="inputs"><br><br>

                <label class="labels">Delivery Address</label>
                <textarea placeholder="Enter your address" cols="25" rows="2" name="address" required autocomplete="off" class="inputs"></textarea><br><br><br>

                <label class="labels">Payment Method</label>
                <select name="paymentMethod" id="payment" class="inputs">
                    <option value="upi">UPI</option>
                    <option value="card">Card</option>
                    <option value="cod">COD</option>
                </select><br><br>
                <div class="obtns">
                    <button type="button" class="cnbtn" ><a href="cart.php">Cancel</a></button>
                    <button type="submit" class="chbtn">Check out</button><br>
                </div>
            </div>
        </div>
    </form>
</body>

</html>