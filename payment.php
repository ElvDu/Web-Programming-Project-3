<?php
  session_start();
  $error="";
  $total = number_format($_SESSION['total_price'], 2);
  if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: -apple-system, BlinkMacSystemFont;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}


.userInfo {
  top: 0;
  left: 0;
  position: relative;
}

.row {
  align-items: center;
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #B5D3E7;
  padding: 5px 20px 15px 20px;
  border: 1px solid black;
  border-radius: 5px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  text-align: center;
  float:center;
  margin-bottom: 20px;
  font-size: 40px;
}

.btn {
  background-color: #0000ff;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn-small {
  position: fixed;
  top: 0;
  right: 0;
  background-color: #0000ff;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

</style>
</head>
<body>
<div class="userInfo">
  <?php
    echo "<a href='logout.php' id='login' class='button'>Logout</a>";
    echo "<div id='login' style = 'color:red;'>Logged in as: {$_SESSION['username']}</div>";
    ?> 
</div>

<h2 style="text-align: center;">Fish Market Payment Form</h2>

<input type="submit" onclick="window.location.href = 'index.php';" value="Back to Home" class="btn-small">
<div class="row">
  <div class="col-75">
    Total Payment Due: $<?php echo $total; ?>
    <div class="container">
      <p style="text-align:center;color:red"><?php echo $error; ?></p>
      <form action="finalAction.php" method="post">
      
        <div class="row">

          <div class="col-25">
          </div>

          <div class="col-50">

            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your Name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Your Email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Your Address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Your City">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="GA">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="30303">
              </div>
            </div>


            <h3>Payment</h3>
            <label for="fname" style="text-align:center;">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name on Card">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Month">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="Exp Year" name="expyear" placeholder="2019">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="999">
              </div>
            </div>

          <input type="submit" value="Submit Payment" class="btn">

          </div>

          <div class="col-25">
          </div>
          
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>
