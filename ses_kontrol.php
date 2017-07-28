<?php
session_start();
if ( !isset($_SESSION['kim']) ) {
	echo "Yetkisiz Giriş <br>";
	echo "Çok Değerli Bilgileri Göremezsiniz";
	die();
}


?>