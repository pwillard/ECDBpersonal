<?php


// This sets PHP errors on or off.

$debug = 1; // 1 = debug

if ($debug == 1){
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', '1');
}
?>
