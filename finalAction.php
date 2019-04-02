<?php

//Please excuse the horrible if statements.. Time crunch. :(

session_start();
unset($_SESSION['error']);
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expmonth = $_POST['expmonth'];
$expyear = $_POST['expyear'];
$cvv = $_POST['cvv'];

if(!isset($firstname) || trim($firstname) == '')
{
	$_SESSION['error'] = "Name was empty!";
}
else if(!isset($email) || trim($email) == '')
{
	$_SESSION['error'] = "Email was empty!";
}
else if(!isset($address) || trim($address) == '')
{
	$_SESSION['error'] = "Address was empty!";
}
else if(!isset($city) || trim($city) == '')
{
	$_SESSION['error'] = "City was empty!";
}
else if(!isset($state) || trim($state) == '')
{
	$_SESSION['error'] = "State was empty!";
}
else if(!isset($zip) || trim($zip) == '')
{
	$_SESSION['error'] = "Zip was empty!";
}
else if(!isset($cardname) || trim($cardname) == '')
{
	$_SESSION['error'] = "Card Name was empty!";
}
else if(!isset($cardnumber) || trim($cardnumber) == '')
{
	$_SESSION['error'] = "Card Number was empty!";
}
else if(!isset($expmonth) || trim($expmonth) == '')
{
	$_SESSION['error'] = "Exp Month was empty!";
}
else if(!isset($expyear) || trim($expyear) == '')
{
	$_SESSION['error'] = "Exp Year was empty!";
}
else if(!isset($cvv) || trim($cvv) == '')
{
	$_SESSION['error'] = "CVV was empty!";
}
if(isset($_SESSION['error'])) {
	?>
	<script type="text/javascript">window.location.href ='payment.php';</script>;
<?php

} else {
	unset($_SESSION['cart_item']);
	echo "Thank you " .$firstname. ", <br> Your fish are purchased and on their way to " .$city. ", " .$state. ". <br> Redirecting you to the home page in 3 seconds.";
	?>
	<script type="text/javascript">setTimeout(function(){
		  window.location = "index.php";
		}, 3000);</script>
<?php
}
?>