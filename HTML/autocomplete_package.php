<?php

	require_once('include/login/auth.php');
	include('include/mysql_connect.php');

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = "SELECT DISTINCT package as package FROM data WHERE package LIKE '%".$searchTerm."%' ORDER by package ASC";
// select DISTINCT location as location from data where location LIKE '%tran%' ORDER by location ASC

$result = mysqli_query($connection,$query);

$jsonData = array();

while($row = mysqli_fetch_array($result)){
    $jsonData[] = $row['package'];
   
}

echo json_encode($jsonData);
?>
