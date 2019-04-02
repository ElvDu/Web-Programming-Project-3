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


	//queries db for email
	$result = mysqli_query($link,"SELECT email='$string' FROM users;");
	
	//if account exists get the password otherwise redirect to error page
	if($result->num_rows == 0)
    {
    	$_SESSION["msg"] = "<h4>ACCOUNT DOES NOT EXIST!</h4>";
		header("Location: ./loginerror.php");
		exit();
    }
    else
    {	
    	$sql = "SELECT password FROM users WHERE email='$string';";
    	$result = mysqli_query($link, $sql);
    	$data = mysqli_fetch_assoc($result);
    	$password = $data['password'];
    }

    echo "password";	

   	//this will check if the entered password matches
	if($_POST["pwd1"] == $password)
	{
		header("Location: ./index.html");
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
