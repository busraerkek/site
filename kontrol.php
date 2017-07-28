<?php
session_start();
include('baglan.php');

$u = $_POST["kullanici"];
$p = $_POST["parola"];

echo "<center>";
if ( $u == ""  or  $p == "" ) {
echo "Kullanıcı veya şifre girmediniz";
}
else {
	$sorgu = mysql_query("Select * from yoneticiler where kisi = '$u'");
	$satir = mysql_fetch_array($sorgu);
	$p2 = $satir["sifre"];
	
	if ( $p == $p2 ) { 	
		$_SESSION['kim'] = $satir["kisi"];	
		
		echo "<SCRIPT LANGUAGE='JavaScript'>window.location='yonetici_index.php'; </script>";
		
	}
	else {
	
	echo "Lütfen bilgilerinizi kontrol ediniz";
	
	}

}

echo "</center>";
?>