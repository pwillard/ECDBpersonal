<?php
// Program: Autocomplete Images
// September 2017
// Pete Willard

// Get passed parameter and prepare regex match
$searchTerm = $_GET['term'];
$searchTerm = preg_quote($searchTerm,"~");
// Get a collection of files from the Sheets folder
// that have a PDF extension and insert  into the working
// file list array
$Data = array();
$imglocation="img/parts/";
// Note: Multiple file types so using GLOB_BRACE to expand the match
$imageList = glob($imglocation . "{*.jpg,*.gif,*.png}", GLOB_BRACE); 

// Loop through each result extracting only the filename information        
foreach($imageList as $i => $file) {
    $actualFilename = strtolower(pathinfo($file, PATHINFO_BASENAME));
    $Data[] = $actualFilename;
}

// Do a regex search on result based on supplied search term
$result=preg_grep('~' . $searchTerm . '~',$Data);

// return the result in JSON format
echo json_encode($result);
?>
