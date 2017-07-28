<?php
include('ses_kontrol.php');
include('baglan.php');
?>
<html>
<head>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
<title>Kedi Yönetim Paneli</title>
</head>
<body>
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_kedi_index.php"> Kedi Yönetim Paneli  </a> / Kedi Düzenleme Paneli </h1>

<?php


if ( isset($_POST['submit']) ) {

$tur_tr = @$_POST['tur_tr'];
$tur_en = @$_POST['tur_en'];
$yer_tr = @$_POST['yer_tr'];
$yer_en = @$_POST['yer_en'];
$renk_tr = @$_POST['renk_tr'];
$renk_en = @$_POST['renk_en'];
$bakim_tr = @$_POST['bakim_tr'];
$bakim_en = @$_POST['bakim_en'];
$karakterozelligi_tr = @$_POST['karakterozelligi_tr'];
$karakterozelligi_en = @$_POST['karakterozelligi_en'];
$tuysekli_tr = @$_POST['tuysekli_tr'];
$tuysekli_en = @$_POST['tuysekli_en'];
$boyut_tr = @$_POST['boyut_tr'];
$boyut_en = @$_POST['boyut_en'];
$id = @$_POST['id'];
$resim_degeri= @$_POST['resim_degeri'];

$gecici_ad=$_FILES["dosya"]["tmp_name"];
$kalici_ad= "resim".rand().time().rand().".jpeg";
$kalici_yol_ad="image/".$kalici_ad;
if (  $_FILES["dosya"]["tmp_name"] == '' ) {

$sql = "Update kediler set tur_tr = '$tur_tr' ,tur_en = '$tur_en', yer_tr = '$yer_tr' ,yer_en = '$yer_en' , renk_tr= '$renk_tr' ,  renk_en= '$renk_en' ,bakim_tr = '$bakim_tr' ,bakim_en = '$bakim_en' ,karakterozelligi_tr = '$karakterozelligi_tr',karakterozelligi_en = '$karakterozelligi_en',  tuysekli_tr= '$tuysekli_tr' ,tuysekli_en= '$tuysekli_en' , boyut_tr = '$boyut_tr', boyut_en = '$boyut_en',  where id = '$id' ";
}
else {
if ($_FILES["dosya"]["error"]) 
   echo "Hata : ",$_FILES["dosya"]["error"];
else{
   if (file_exists($kalici_yol_ad)) 
      echo "Yazdığınız ad ile bir resim zaten kayıtlıdır.";
   else{
      if ($_FILES["dosya"]["size"]>2*1024*1024)
         echo "2MB'dan küçük bir resim seçiniz.";
      else{
         if ($_FILES["dosya"]["type"]=="image/jpeg"){
            if (move_uploaded_file($gecici_ad,$kalici_yol_ad)) {				
				
				$sql = "Update kediler set tur_tr = '$tur_tr' ,tur_en = '$tur_en', yer_tr = '$yer_tr' ,yer_en = '$yer_en' , renk_tr= '$renk_tr' ,  renk_en= '$renk_en' ,bakim_tr = '$bakim_tr' ,bakim_en = '$bakim_en' ,karakterozelligi_tr = '$karakterozelligi_tr',karakterozelligi_en = '$karakterozelligi_en',  tuysekli_tr= '$tuysekli_tr' ,tuysekli_en= '$tuysekli_en' , boyut_tr = '$boyut_tr', boyut_en = '$boyut_en',  resim = '$kalici_ad' where id = '$id' ";
				
			
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
echo "<meta HTTP-EQUIV='refresh' CONTENT='3; URL=yonetici_kedi_index.php'>";

}
else {
echo "<center><img src='image/sil.png'><br><b>Hata!! Düzenleme işlemi gerçekleşmedi... <br> Hata Kodu : Yayın_2 </b> </center>";
}

}
else {

$id = $_GET['id'];
$sorgu = mysql_query("SELECT * FROM `kediler` WHERE id='$id'");
$satir = mysql_fetch_array($sorgu );


?>


<form name="kedi_duzenleme_formu" method="POST" action="yonetici_kedi_duzenle.php"  enctype="multipart/form-data">
<table align="center">
<tr>
<td width=150> <b>Türü(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['tur_tr'];  ?>" name="tur_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Türü(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['tur_en'];  ?>" name="tur_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yeri(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['yer_tr'];  ?>"name="yer_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yeri(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['yer_en'];  ?>"name="yer_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Rengi(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['renk_tr'];  ?>"name="renk_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Rengi(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['renk_en'];  ?>"name="renk_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Bakımı(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['bakim_tr'];  ?>" name="bakim_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Bakımı(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['bakim_en'];  ?>" name="bakim_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=200> <b>Karakter Özelliği(TR) </b> </td>
<td width=500> <input type="text" value="<?php echo $satir['karakterozelligi_tr'];  ?>" name="karakterozelligi_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=200> <b>Karakter Özelliği(EN) </b> </td>
<td width=500> <input type="text" value="<?php echo $satir['karakterozelligi_en'];  ?>" name="karakterozelligi_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Tüy Şekli(TR) </b> </td>
<td width=500> <input type="text" value="<?php echo $satir['tuysekli_tr'];  ?>" name="tuysekli_tr" style="width:100px;"> </td>
</tr>

<tr>
<td width=150> <b>Tüy Şekli(EN) </b> </td>
<td width=500> <input type="text" value="<?php echo $satir['tuysekli_en'];  ?>" name="tuysekli_en" style="width:100px;"> </td>
</tr>

<tr>
<td width=150> <b>Boyutu (TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['boyut_tr'];  ?>" name="boyut_tr" style="width:100px;"> </td>
</tr>

<tr>
<td width=150> <b>Boyutu (EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['boyut_en'];  ?>" name="boyut_en" style="width:100px;"> </td>
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

