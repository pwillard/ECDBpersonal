<?php

	require_once('include/login/auth.php');
	include('include/mysql_connect.php');

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = "SELECT DISTINCT manufacturer as manufacturer FROM data WHERE manufacturer LIKE '%".$searchTerm."%' ORDER by manufacturer ASC";
// select DISTINCT location as location from data where location LIKE '%tran%' ORDER by location ASC

$result = mysqli_query($connection,$query);

$jsonData = array();

while($row = mysqli_fetch_array($result)){
    $jsonData[] = $row['manufacturer'];
   
}

echo json_encode($jsonData);
?>
