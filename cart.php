<html>
<link rel="stylesheet" type="text/css" href="index.css">
<?php
	require "config.php";
	
	$sample = mysqli_query($link, "SELECT * FROM users WHERE id = 1");
	
	while($row = $sample->fetch_assoc()){
		echo $row['email']."<br>";
	}
?>
<?php
	if(isset($_POST['submit'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}
			else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
	}
?>
<head>
	<title>View Cart</title>
	<div id="logoandmotto">
		<div id="logo">
			<img src="./images/fesh.png">
		</div>
		<div id="motto">
			<h1>This is Cart of FISH</h1>
			F I S H
		</div>
	</div>
	<div id="login">
		<a href="signup.html">sign up</a>
		<a href="login.html">login</a>
	</div>
</head>
<body>
	<nav id="navbar">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="purchase.php">Purchase</a>
				<ul>
					<li><a href="">Fish</a></li>
					<li><a href="">Food</a></li>
					<li><a href="">Homes</a></li>
					<li><a href="">Accessories</a></li>
				</ul>
			</li>
			<li><a class="current-page" href="cart.php">Cart</a></li>
		</ul>
	</nav>
	
	<table>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Items Price</th>
		</tr>
		
		<?php
			$sql="SELECT * FROM products WHERE id_product IN (";
				foreach($_SESSION['cart'] as $id => $value) {
					$sql.=$id.",";
				}
				
				$sql=substr($sql, 0, -1).") ORDER BY name ASC";
				$query=mysql_query($sql);
				$totalprice=0;
				while($row=mysql_fetch_array($query)){
					$subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price'];
					$totalprice+=$subtotal;
				?>
					<tr>
						<td><?php echo $row['name'] ?></td>
						<td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity']?>" /></td>
						<td><?php echo $row['price'] ?>$</td>
						<td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td>
					</tr>
				<?php
				}
		?>
				<tr>
					<td colspan="4">Total Price: <?php echo $totalprice ?></td>
				</tr>
	</table>
	<br />
	<button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item, set its quantity to 0.</p>
</body>