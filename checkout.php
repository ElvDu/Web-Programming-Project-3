<!DOCTYPE html>
<?php
session_start();
$discount = 1;
$couponMsg = "";
if(!empty($_GET["action"])) {
  switch($_GET["action"]) {
  	case "remove":
  		if(!empty($_SESSION["cart_item"])) {
  			foreach($_SESSION["cart_item"] as $k => $v) {
            if($_GET["id"] == $k)
  						unset($_SESSION["cart_item"][$k]);				
  					if(empty($_SESSION["cart_item"]))
  						unset($_SESSION["cart_item"]);
  			}
  		}
  	break;
  	case "empty":
  		unset($_SESSION["cart_item"]);
  	break;
  }
}

if(!empty($_POST["code"])) {
  if ($_POST["code"] == "boogaloo") {
    $discount = 0.85;
    $couponMsg = "Discount Applied!";
  } else {
    $couponMsg = "Coupon Invalid";
  }
}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">

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

input[type=text] {
  width: 100px;
  font-size: 14px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.btn {
  background-color: #0000ff;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

@media (max-width: 640px) {
      td {
        width:100%;
      }
      .btn {
         width:100%;
      }
}

</style>
</head>
<body>
<div class="userInfo">
  <?php 
    if(isset($_SESSION["loggedin"]))
    { 
      echo "<a href='logout.php' id='login' class='button'>Logout</a>";
      echo("<div id='login' style = 'color:red;'>Logged in as: {$_SESSION['username']}</div>");
    }
    else
    { 
      echo "<a href='login.html' id='login' class='button'>Login</a> <a href='signup.html' id='login' class='button'>Sign Up</a>";
    }
  ?>
</div>

<h2 style="text-align: center;">Fish Market Checkout Form</h2>



<div id="shopping-cart">

<div id="coupon">
  <form action="checkout.php" method="post">
    Have a Coupon?
    <input type="text" name="code" placeholder="Enter Code"/>
    <input type="submit" value="Submit">
  </form>
  <?php echo $couponMsg; ?>
</div>


<a id="btnEmpty" href="checkout.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:right;" width="5%">Id</th>
<th style="text-align:right;" width="10%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:center;" width="10%">Total Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td style="text-align:right;"><?php echo $item["id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="checkout.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);

        //Carry total to payments page
        $_SESSION['total_price'] = $total_price * $discount;
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price * $discount, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
  <input type="submit" onclick="window.location.href = 'index.html';" value="Back to Home" class="btn">

  <input type="submit" onclick="window.location.href = 'payment.php';" value="Continue to Checkout" class="btn">
</div>

</body>
</html>
