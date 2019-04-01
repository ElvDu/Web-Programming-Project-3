<?php
	session_start();
	require "config.php";
	
	$sample = mysqli_query($link, "SELECT * FROM users WHERE id = 1");
	
	while($row = $sample->fetch_assoc()){
		echo $row['email']."<br>";
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
			F I S H
		</div>
	</div>
	<div id="login">
		<a href="signup.html">sign up</a>
		<a href="login.html">login</a>
	</div>
	
	<nav id="navbar">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a class="current-page" href="purchase.php">Purchase</a>
				<ul>
					<li><a href="">Fish</a></li>
					<li><a href="">Food</a></li>
					<li><a href="">Homes</a></li>
					<li><a href="">Accessories</a></li>
				</ul>
			</li>
			<li><a href="cart.php">Cart</a></li>
		</ul>
	</nav>
	<h2>Please choose from our four categories of products, or select from all items.</h2>
	<div id="categories">
		<ul>
			<li><a href="">Fish</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Homes</a></li>
			<li><a href="">Accessories</a></li>
		</ul>
	</div>
	<?php
		$product_array = mysqli_query($link, "SELECT * FROM product ORDER BY id ASC");
		if (!empty($product_array)){
			foreach($product_array as $key=>$value){
	?>
	<div class="product">
		<form method="post" action="purchase.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
		<div class="product-image"><img src="<?php echo $product_array[$key]["image_url"]; ?>"></div>
		<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["PRODUCT_NAME"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["COST"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
}
?>
	
</body>
</html>