<?php
//
// File: Login-exec.php
//
//Start session
session_start();

//Include database connection details
require_once('include/login/config.php');
include('include/mysql_connect.php');

// Note: connection is $connection
//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

// Sanitize USER
$login = mysqli_real_escape_string($connection,$_POST['login']);
$password = mysqli_real_escape_string($connection,$_POST['password']);

//Input Validations
if ($login == '') {
    $errmsg_arr[] = 'Login ID missing';
    $errflag      = true;
}
if ($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag      = true;
}

//If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: login.php");
    exit();
}

//Create query
$qry    = "SELECT * FROM members WHERE login='$login' AND passwd='" . md5($_POST['password']) . "'";
$result = mysqli_query($connection,$qry);

//Check whether the query was successful or not
if ($result) {
    if (mysqli_num_rows($result) == 1) {
        //Login Successful
        session_regenerate_id();
        $member                      = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID']  = $member['member_id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
        $_SESSION['SESS_LAST_NAME']  = $member['lastname'];
        session_write_close();
        $member_id = $_SESSION['SESS_MEMBER_ID'];
        mysqli_query($connection,"INSERT INTO members_stats (members_stats_member) VALUES ('$member_id')");
        header("location: index.php");
        exit();
    } else {
        //Login failed
        header("location: login-failed.php");
        exit();
    }
} else {
    die("Query failed");
}
?>