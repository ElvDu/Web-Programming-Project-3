<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByID = $db_handle->runQuery("SELECT * FROM product WHERE id='" . $_GET["id"] . "'");

			$itemArray = array($productByID[0]["id"]=>array('name'=>$productByID[0]["PRODUCT_NAME"], 'id'=>$productByID[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByID[0]["COST"], 'image'=>$productByID[0]["image_url"]));
			
			if(!empty($_SESSION["cart_item"])) {
				
				if(in_array($productByID[0]["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByID[0]["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Product of FISH</title>
</head>

<body>
	<div id="logoandmotto">
		<div id="logo">
			<img src="./images/fesh.png">
		</div>
		<div id="motto">
			<h1>This is Product of FISH</h1>
			<?php
				if(isset($message)){
					echo "<h2>$message</h2>";
				}
				?>
			F I S H
		</div>
	</div>
	<div id="login">
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
	
	<nav id="navbar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a class="current-page" href="purchase.php">Purchase</a>
				<ul>
					<li><a href="fish.php">Fish</a></li>
					<li><a href="food.php">Food</a></li>
					<li><a href="homes.php">Homes</a></li>
					<li><a href="accessories.php">Accessories</a></li>
				</ul>
			</li>
			<li><a href="checkout.php">Cart<?php 
			$total_quantity = 0;
			if(!empty($_SESSION['cart_item'])){
				foreach($_SESSION['cart_item'] as $item){
				$total_quantity += $item["quantity"];
				}
			}
				echo '('.$total_quantity.')';?></a></li>
		</ul>
	</nav>
	
	<div id="categories">
		<h2>Please choose from homes, or select from all items.</h2>
		<ul>
			<li><a href="fish.php">Fish</a></li>
			<li><a href="food.php">Food</a></li>
			<li><a href="accessories.php">Accessories</a></li>
			<li><a href="purchase.php">All</a></li>
		</ul>
	</div>
	
	<div id="product-grid">
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product WHERE CATEGORY='home'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product">
			<form method="post" action="purchase.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image_url"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["PRODUCT_NAME"]; ?></div>
			<div class="product-description"><?php echo '"'.$product_array[$key]['DESCRIPTION'].'"'; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["COST"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</body>
</html>