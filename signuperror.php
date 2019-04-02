
<html>
<head>
	<title>Signup</title>
	<style>
		body{
			padding-top: 10%;
			font-family: "Comic Sans MS", cursive, sans-serif;
			background-image: url("https://www.churchmotiongraphics.com/wp-content/uploads/2016/06/Under-The-Sea.jpg");
			background-size: cover;
			text-align: center;
		}
		#main{
			display: inline-block;
			border-radius: 5px;
			background: white;
			padding: 1% 4%;
			width: 400px;
			opacity: .85;
		}
		input{
			display: inline-block;
			border-radius: 10px;
			padding: 8px;
			border-color: black;
			width:50%;
			outline: none;
			border-style: solid;
			border-width: thin;
		}
		#butt{
			font-family: "Comic Sans MS", cursive, sans-serif;
			font-size: 25px;
			text-align: center;
			cursor: pointer;
			border: none;
		}
		#helpme{
			display: inline-block;
			width:50%;
		}
		h1{
			font-size: 55px;
			text-align: center;
		}
		h4{
			font-size: 23px;
			color:red;
		}
	
	</style>
</head>
<body>

<h1>Sign Up to Shop!</h1>
<div id="main">	
<?php
	session_start(); 
	$message = $_SESSION['msg'];
	echo "$message";

?>
<h5>Please Enter Your Information Below</h5>

<form action="register.php" method="post">
	<label id="helpme">Email Address: </label><input type="text" name="emailadd" value=<?php echo $_SESSION["username"]; ?>><br><br>
	<label id="helpme">Password: </label><input type="password" name="pwd1"><br><br>
	<label id="helpme">Re-Enter Password: </label><input type="password" name="pwd2"><br><br>
	<input type="submit" id="butt" value="Submit">
</form>
</div>
</body>
</html>