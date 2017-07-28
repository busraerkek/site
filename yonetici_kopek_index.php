<?php
include('ses_kontrol.php');
include('baglan.php');
?>
<html>
<head>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
<title>Köpek Yönetim Paneli</title>
</head>
<body>
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / Köpek Yönetim Paneli </h1>


<table align="center">

<tr>
<td width=50> SIRA </td>
<td width=500> TÜR</td>
<td width=50> DÜZENLE  </td>
<td width=50> SİL </td>


</tr>

<?php 
$sorgu =mysql_query("Select * from köpekler order by id");
$say = 0;

while ( $satir = mysql_fetch_array($sorgu) ) {
$say = $say + 1;
echo "<tr>";
echo "<td align='center'>".$say ."</td>";

echo "<td><font color='#FF3399'><span id='tur'> ".$satir['tur_tr']." </font></span> ";
echo "<br><font color='#8D38C9'><span id='bakim'> ".$satir['bakim_tr']."</font></span>, "."<font color='#4C7D7E'>".$satir['yer_tr'].".</font></td>";

echo "<td align='center'><a href='yonetici_kopek_duzenle.php?id=".$satir['id']."'><img src='image/duzenle.png'></a></td>";
echo "<td align='center'><a href='yonetici_kopek_sil.php?id=".$satir['id']."'><img src='image/sil.png'></a></td>";

echo "</tr>";
}
?>

</table>

<center>
<a href="yonetici_kopek_ekle.php"><img src="image/ekle.png"></a>
</center>


</body>
</html>

