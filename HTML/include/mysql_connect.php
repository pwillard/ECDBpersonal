<?php
    // Lets only have the DB access information in one place
	require_once('include/login/config.php');
	$db_host = DB_HOST;
	$db_username = DB_USER;
	$db_pass = DB_PASSWORD;
	$db_name = DB_DATABASE;

// Try and connect to the database
//$connection = mysqli_connect('localhost',$username,$password,$dbname);
$connection = mysqli_connect($db_host,$db_username, $db_pass, $db_name);
// If connection was not successful, handle the error
if($connection === false) {
	// Handle error - notify administrator, log to a file, show an error screen, etc.
	die ("Could not connect connect to MySQL Server") ;
}
	
	


	 
?>