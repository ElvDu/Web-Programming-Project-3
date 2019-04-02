<?php
	session_start();
	require("config.php");
	
	$_SESSION["username"] = $_POST["emailadd"];
	$string = $_POST["emailadd"];
	
	//checks if user entered a valid email
	if(preg_match('/^[a-zA-Z0-9_.]+@[a-zA-Z]+\.[a-zA-Z]+/', $string) !== 1)
	{
		$_SESSION["msg"] = "<h4>INVALID EMAIL ADDRESS!</h4>";		//stores the error message to be displayed in new webpage
    	header("Location: ./loginerror.php");					//redirects to a new page with error message
    	exit();
	}


	//gets all emails from db
	$result = mysqli_query($link,"SELECT email FROM users;");
	$list = Array();

	$bool = false;
	//checks if user entered email is already registered or not
	while ($row = mysqli_fetch_assoc($result))
    {
    	$list[] = $row['email'];
    	
    	if($row['email'] == $_POST["emailadd"])
    	{
    		$bool = true;
    		$pass = mysqli_query($link, "SELECT password FROM users WHERE email='$string';");
    		while ($rows = mysqli_fetch_assoc($pass))
			{	
			   	$password = $rows['password'];
			}
    		break;
    	}
    }

    if($bool == false)
    {
		$_SESSION["msg"] = "<h4>EMAIL IS NOT REGISTERED!</h4>";	
		header("Location: ./loginerror.php");
		exit();
    }

   	//this will check if the entered password matches
	if($_POST["pwd1"] == $password)
	{
		$_SESSION["loggedin"] = "true";
		header("Location: ./index.php");
		exit();
		
	}
	else 	//display error if they dont match
	{
		$_SESSION["msg"] = "<h4>INCORRECT PASSWORD ENTERED!</h4>";
		header("Location: ./loginerror.php");
		exit();
	}
	mysqli_close($link);
?>
