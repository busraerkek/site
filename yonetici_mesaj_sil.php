<?php
include('ses_kontrol.php');
include('baglan.php');
?>
<html>
<head>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
<title>Mesaj Yönetim Paneli</title>
</head>
<body>
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_mesaj_index.php"> Mesaj Yönetim Paneli  </a> / Mesaj Silme Paneli </h1>


<?php 
$id = $_GET['id'];

$sorgu = mysql_query("delete from iletisim where id='$id'");

?>


<center>
<img src="image/ok.png"></a>
<br><b>Silme işlemi başarıyla tamamlandı</b>
<meta HTTP-EQUIV='refresh' CONTENT='2; URL=yonetici_mesaj_index.php'>
</center>


</body>
</html>

