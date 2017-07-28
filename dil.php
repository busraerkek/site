<?php
session_start();
$dil = $_GET["dil"];
$sayfa = $_GET["sayfa"];

if ( $dil == "tr" || $dil == "en" ) {
		$_SESSION["dil"] = $dil;
		header("Location:index.php?i=$sayfa");
	}
else {
		header("Location:index.php");
}	
?>

