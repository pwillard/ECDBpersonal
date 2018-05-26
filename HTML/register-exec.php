<?php
	//Start session
	session_start();
	
//Include database connection details
require_once('include/login/config.php');
include('include/mysql_connect.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	

	
	//Sanitize the POST values
	$fname = mysqli_real_escape_string($connection,$_POST['fname']);
	$lname = mysqli_real_escape_string($connection,$_POST['lname']);
	$login = mysqli_real_escape_string($connection,$_POST['login']);
	$mail = mysqli_real_escape_string($connection,$_POST['mail']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);
	$cpassword = mysqli_real_escape_string($connection,$_POST['cpassword']);
	
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if (strlen($fname) <= 2){
		$errmsg_arr[] = 'Minimum of 2 chars in first name.';
		$errflag = true;
	}
	if($mail == '') {
		$errmsg_arr[] = 'Mail missing';
		$errflag = true;
	}
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		$errmsg_arr[] = 'Invalid e-mail address';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if (strlen($lname) <= 2){
		$errmsg_arr[] = 'Minimum of 2 chars in last name.';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if (strlen($login) <= 2){
		$errmsg_arr[] = 'Minimum of 2 chars in username.';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if (strlen($password) <= 5){
		$errmsg_arr[] = 'Minimum of 5 chars in password.';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE login='$login'";
		$result = mysqli_query($connection,$qry);
		if($result) {
			if(mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = 'Username already in use';
				$errflag = true;
			}
			@mysqli_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(firstname, lastname, login, mail, passwd) VALUES('$fname','$lname','$login','$mail','".md5($_POST['password'])."')";
	$result = @mysqli_query($connection,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed");
	}
?>