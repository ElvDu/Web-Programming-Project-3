<?php

echo "Database config";

define('DB_SERVER', 'wpp3.cplqfb6rscf0.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_NAME', 'wp_p3');
// Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
echo "<br>";
echo "Success!";
echo "<br>";
}
//$link->close();

?>