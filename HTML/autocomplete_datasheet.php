<?php
// Program: Autocomplete Datasheet
// September 2017
// Pete Willard

// Get passed parameter and prepare regex match
$searchTerm = $_GET['term'];
$searchTerm = preg_quote($searchTerm,"~");
// Get a collection of files from the Sheets folder
// that have a PDF extension and insert  into the working
// file list array

$pdflocation="sheets/";
$fileList = glob($pdflocation . "*.[pP][dD][fF]");

// Loop through each result extracting only the filename information
        
foreach($fileList as $i => $file) {
    $actualFilename = strtolower(pathinfo($file, PATHINFO_BASENAME));
    $Data[] = $actualFilename;
}

// Do a regex search based on supplied search term
$result=preg_grep('~' . $searchTerm . '~',$Data);

// return the result in JSON format
echo json_encode($result);
?>
