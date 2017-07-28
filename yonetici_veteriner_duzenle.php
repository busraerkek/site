<?php
include('ses_kontrol.php');
include('baglan.php');
?>
<html>
<head>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
<title>Veteriner Yönetim Paneli</title>
</head>
<body>
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_veteriner_index.php"> Veteriner Yönetim Paneli  </a> / Veteriner Düzenleme Paneli </h1>

<?php


if ( isset($_POST['submit']) ) {

$adi_tr = @$_POST['adi_tr'];
$adi_en = @$_POST['adi_en'];
$adres_tr = @$_POST['adres_tr'];
$adres_en = @$_POST['adres_en'];
$telefon_tr= @$_POST['telefon_tr'];
$telefon_en= @$_POST['telefon_en'];
$internetadresi_tr = @$_POST['internetadresi_tr'];
$internetadresi_en = @$_POST['internetadresi_en'];
$resim_degeri= @$_POST['resim_degeri'];
$id = @$_POST['id'];

$gecici_ad=$_FILES["dosya"]["tmp_name"];
$kalici_ad= "resim".rand().time().rand().".jpeg";
$kalici_yol_ad="image/".$kalici_ad;
if (  $_FILES["dosya"]["tmp_name"] == '' ) {
$sql = "Update veteriner set adi_tr= '$adi_tr' ,adi_en= '$adi_en' , adres_tr = '$adres_tr' ,adres_en = '$adres_en' , telefon_tr= '$telefon_tr' ,telefon_en= '$telefon_en' , internetadresi_tr = '$internetadresi_tr' ,internetadresi_en = '$internetadresi_en' where id = '$id' ";
}
else {
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

         $sql = "Update veteriner set adi_tr= '$adi_tr' ,adi_en= '$adi_en' , adres_tr = '$adres_tr' ,adres_en = '$adres_en' , telefon_tr= '$telefon_tr' ,telefon_en= '$telefon_en' , internetadresi_tr = '$internetadresi_tr' ,internetadresi_en = '$internetadresi_en' , resim = '$kalici_ad' where id = '$id' ";
               unlink("image/".$resim_degeri);
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
		 
		 
		 
		 if ( mysql_query($sql)) {
echo "<center><img src='image/ok.png'><br><b>Düzenleme işlemi başarıyla tamamlandı</b> </center>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='2; URL=yonetici_veteriner_index.php'>";
}
else {
echo "<center><img src='image/sil.png'><br><b>Hata!! Düzenleme işlemi gerçekleşmedi... <br> Hata Kodu : Yayın_2 </b> </center>";
}

}
else {

$id = $_GET['id'];
$sorgu = mysql_query("SELECT * FROM `veteriner` WHERE id='$id'");
$satir = mysql_fetch_array($sorgu );


?>


<form name="veteriner_duzenleme_formu" method="POST" action="yonetici_veteriner_duzenle.php" enctype="multipart/form-data" >
<table align="center">
<tr>
<td width=150> <b>Adı(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['adi_tr'];  ?>" name="adi_tr" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>Adı(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['adi_en'];  ?>" name="adi_en" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>Adres(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['adres_tr'];  ?>"name="adres_tr" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>Adres(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['adres_en'];  ?>"name="adres_en" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>Telefon(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['telefon_tr'];  ?>"name="telefon_tr" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>Telefon(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['telefon_en'];  ?>"name="telefon_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>İnternet Adresi(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['internetadresi_tr'];  ?>" name="internetadresi_tr" style="width:400px;"> </td>
</tr>
<tr>
<td width=150> <b>İnternet Adresi(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['internetadresi_en'];  ?>" name="internetadresi_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Resim </b> </td>
<td width=500> <input type="file" name="dosya" style="width:400px;"><?php echo $satir['resim'];  ?> </td>
</tr>


<tr>
<td width=150> <input type="hidden" name="id" value="<?php echo $id;  ?>" > </td>
<input type="hidden" name="resim_degeri" value="<?php echo $satir['resim']; ?>"> </td>
<td width=500> <input type="submit" name="submit" value="Düzenlemeyi Bitir"> </td>
</tr>



</table>
</form>

<?php 
}
?>



</body>
</html>

