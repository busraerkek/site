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
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_kedimamasi_index.php">KediMaması Yönetim Paneli  </a> / KediMaması Ekleme Paneli </h1>

<?php

if ( isset($_POST['submit']) ) {


$baslik_tr = @$_POST['baslik_tr'];
$baslik_en = @$_POST['baslik_en'];
$yazi_tr = @$_POST['yazi_tr'];
$yazi_en = @$_POST['yazi_en'];

$gecici_ad=$_FILES["dosya"]["tmp_name"];
$kalici_ad= "resim".rand().time().rand().".jpeg";
$kalici_yol_ad="image/".$kalici_ad;
if ($_FILES["dosya"]["error"]) 
   echo "Hata : ",$_FILES["dosya"]["error"];
else{
   if (file_exists($kalici_yol_ad))
      echo "Yazdığınız ad ile bir resim zaten kayıtlıdır. Samnıyorum ama !!!";
   else{
      if ($_FILES["dosya"]["size"]>2*1024*1024)
         echo "2MB'dan küçük bir resim seçiniz.";
      else{
         if ($_FILES["dosya"]["type"]=="image/jpeg"){
            if (move_uploaded_file($gecici_ad,$kalici_yol_ad)) {

$sql ="Insert into kedimamasi(baslik_tr,baslik_en,yazi_tr,yazi_en,resim) values
('$baslik_tr','$baslik_en','$yazi_tr','$yazi_en','$kalici_ad')";

if ( mysql_query($sql)) {
echo "<center><img src='image/ok.png'><br><b>Ekleme işlemi başarıyla tamamlandı</b> </center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='2; URL=yonetici_kedimamasi_index.php'>";
}
else {
echo "<center><img src='image/sil.png'><br><b>Hata!! Ekleme işlemi gerçekleşmedi... <br> Hata Kodu : 123 </b> </center>";
}

}
 else {
               echo "Resim yükleme başarısız.";
			   }
         }
         else {
            echo "Lütfen JPG dosyası seçiniz.";
			
			}
}
   }
}
}
else {


?>


<form name="kedimamasi_ekleme_formu" method="POST" action="yonetici_kedimamasi_ekle.php" enctype="multipart/form-data">
<table align="center">
<tr>
<td width=150> <b>Başlık(TR)</b> </td>
<td width=500> <input type="text" name="baslik_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Başlık(EN)</b> </td>
<td width=500> <input type="text" name="baslik_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yazı(TR)</b> </td>
<td width=500> <input type="text" name="yazi_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yazı(EN)</b> </td>
<td width=500> <input type="text" name="yazi_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Resim </b> </td>
<td width=500> <input type="file" name="dosya" style="width:400px;"> </td>
</tr>



<tr>
<td width=150>  </td>
<td width=500> <input type="submit" name="submit" value="Eklemeyi Bitir"> </td>
</tr>
</table>
</form>

<?php 
}
?>


</body>
</html>

