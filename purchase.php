<?php
	session_start();
	require "config.php";
	if(isset($_GET['action']) && $_GET['action']=="add"){
		$id=intval($_GET['id']);
		
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		}else{
			$query_s=mysqli_query($link, "SELECT * FROM product WHERE id={$id}");
			if(mysqli_num_rows($query_s)!=0){
				$row_s=mysqli_fetch_array($query_s);
				
				$_SESSION['cart'][$row_s['id']]=array(
					"quantity"=>1,
					"price"=>$row_s['COST']
				);
			}else{
				$message=mysqli_error($link);
			}
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
	
	<div id="categories">
		<h2>Please choose from our four categories of products, or select from all items.</h2>
		<ul>
			<li><a href="">Fish</a></li>
			<li><a href="">Food</a></li>
			<li><a href="">Homes</a></li>
			<li><a href="">Accessories</a></li>
		</ul>
	</div>
	<?php
		$product_list = mysqli_query($link, "SELECT * FROM product ORDER BY id ASC");
	
	while($row = $product_list->fetch_assoc()){
	?>
	<div class="product">
		<form method="post" action="purchase.php?action=add&id=<?php echo $row['id']; ?>">
		<div class="product-image"><img src="<?php echo $row['image_url']; ?>"></div>
		<div class="product-tile-footer">
			<div class="product-title"><?php echo $row['PRODUCT_NAME']; ?></div>
			<div class="product-price"><?php echo "$".$row['COST']; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
?>
	
</body>
</html>