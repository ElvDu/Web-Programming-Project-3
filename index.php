<html lang="en">
<?php session_start(); ?>

<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Store of FISH</title>	
</head>
<body>
	<div id="logoandmotto">
		<div id="logo">
			<img src="./images/fesh.png">
		</div>
		<div id="motto">
			<h1>This is Store of FISH</h1>
			F I S H
		</div>
	</div>


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
	
	
	<nav id="navbar">
		<ul>
			<li><a class="current-page" href="index.php">Home</a></li>
			<li><a href="purchase.php">Purchase</a>
				<ul>
					<li><a href="fish.php">Fish</a></li>
					<li><a href="food.php">Food</a></li>
					<li><a href="homes.php">Homes</a></li>
					<li><a href="accessories.php">Accessories</a></li>
				</ul>
			</li>
			<li><a id="cart" href="checkout.php">Cart</a></li>
		</ul>
	</nav>
	<div id="content">
	<div id="welcome">
		Hello
	</div>
	<p id="aboutus">
		Fish store specializes in fish and fish accessories. Whether it's for fish, from fish, or just fish, we got you covered.
	</p>
	<div id="fotd">
		<h1>FISH OF THE DAY/YEAR</h1>
		<img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Catfish_%28PSF%29.svg">
		<h2>"Catfish"</h2><br>
		<h3>-Do not get catfished</h3>
	</div>
	????
	</div>
</body>
</html>