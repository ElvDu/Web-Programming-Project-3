<?php
	session_start();
	require("config.php");
	
	$_SESSION["username"] = $_POST["emailadd"];
	$string = $_POST["emailadd"];
	
	if(preg_match('/^[a-zA-Z0-9_.]+@[a-zA-Z]+\.[a-zA-Z]+/', $string) !== 1)
	{
		$_SESSION["msg"] = "<h4>INVALID EMAIL ADDRESS!</h4>";		//stores the error message to be displayed in new webpage
    	header("Location: ./signuperror.php");					//redirects to a new page with error message
    	exit();
	}


	//gets all emails from db
	$result = mysqli_query($link,"SELECT email FROM users;");
	$list = Array();

	//checks if user entered email is already registered or not
	while ($row = mysqli_fetch_assoc($result))
    {
    	$list[] = $row['email'];
    	
    	if($row['email'] == $_POST["emailadd"])
    	{
    		$_SESSION["msg"] = "<h4>EMAIL IS ALREADY IN USE!</h4>";	
    		header("Location: ./signuperror.php");
    		exit();
    	}
    }

   	//this will check if the entered passwords match or not
	if($_POST["pwd1"] !== $_POST["pwd2"])
	{
		$_SESSION["msg"] = "<h4>PASSWORDS DO NOT MATCH!</h4>";
		header("Location: ./signuperror.php");
		exit();
	}
	else 	//if everthing is good insert new user into db
	{
		$sql = "INSERT INTO users (email, password) VALUES ('".$_POST["emailadd"]."','".$_POST["pwd1"]."')";
		mysqli_query($link, $sql);
		$_SESSION["loggedin"] = "true";
		header("Location: ./index.php");
		exit();
	}
	mysqli_close($link);
?>
