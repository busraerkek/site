
<?php 
include('baglan.php');


	$ad=$_POST['ad'];
	$soyad=$_POST['soyad'];
	$mesaj=$_POST['mesaj'];
	$kontrol=mysql_query("Insert into iletisim( ad, soyad,mesaj) VALUES ('$ad','$soyad','$mesaj')");

	
		echo "<font size='5' color='#9966CC'>"."Mesajınız Gönderildi"."</font>";
	
	
?>
 


 
 