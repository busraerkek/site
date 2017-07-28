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
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / Mesaj Yönetim Paneli </h1>


<table align="center">

<tr>
<td width=50> SIRA </td>
<td width=500> MESAJ</td>



</tr>

<?php 
$sorgu =mysql_query("Select * from iletisim order by id");
$say = 0;

while ( $satir = mysql_fetch_array($sorgu) ) {
$say = $say + 1;
echo "<tr>";
echo "<td align='center'>".$say ."</td>";

echo "<td><font color='#FF3399'><span id='adi'> ".$satir['ad']." </font></span>"."<font color='#FF3399'><span id='soyad'> ".$satir['soyad']."</font></span>";

echo "<br><font color='#8D38C9'><span id='mesaj'> ".$satir['mesaj']."</font></span></td>";
echo "<td align='center'><a href='yonetici_mesaj_sil.php?id=".$satir['id']."'><img src='image/sil.png'></a></td>";

echo "</tr>";
}
?>

</table>


</body>
</html>

