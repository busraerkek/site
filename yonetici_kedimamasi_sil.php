<?php
include('ses_kontrol.php');
include('baglan.php');
?>
<html>
<head>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
<title>KediMaması Yönetim Paneli</title>
</head>
<body>
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_kedimamasi_index.php"> KediMaması Yönetim Paneli  </a> / KediMaması Silme Paneli </h1>


<?php 
$id = $_GET['id'];
$sorgu1 = mysql_query("select * from kedimamasi where id = '$id'");
$satir1 = mysql_fetch_array($sorgu1);
$resim = $satir1['resim'];
unlink("image/".$resim);
$sorgu = mysql_query("delete from kedimamasi where id='$id'");

?>


<center>
<img src="image/ok.png"></a>
<br><b>Silme işlemi başarıyla tamamlandı</b>
<meta HTTP-EQUIV='refresh' CONTENT='2; URL=yonetici_kedimamasi_index.php'>
</center>


</body>
</html>

