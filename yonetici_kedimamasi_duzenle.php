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
<h1><a href="yonetici_index.php"> Yönetim Paneli Ana Sayfası </a> / <a href="yonetici_kedimamasi_index.php"> KediMaması Yönetim Paneli  </a> / KediMaması Düzenleme Paneli </h1>

<?php


if ( isset($_POST['submit']) ) {


$baslik_tr = @$_POST['baslik_tr'];
$baslik_en = @$_POST['baslik_en'];
$yazi_tr = @$_POST['yazi_tr'];
$yazi_en = @$_POST['yazi_en'];
$resim_degeri= @$_POST['resim_degeri'];
$id = @$_POST['id'];

$gecici_ad=$_FILES["dosya"]["tmp_name"];
$kalici_ad= "resim".rand().time().rand().".jpeg";
$kalici_yol_ad="image/".$kalici_ad;
if (  $_FILES["dosya"]["tmp_name"] == '' ) {
$sql = "Update kedimamasi set baslik_tr = '$baslik_tr' ,baslik_en = '$baslik_en', yazi_tr = '$yazi_tr' ,yazi_en = '$yazi_en'  where id = '$id' ";

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
			$sql = "Update kedimamasi set baslik_tr = '$baslik_tr' ,baslik_en = '$baslik_en', yazi_tr = '$yazi_tr' ,yazi_en = '$yazi_en' ,resim = '$kalici_ad'  where id = '$id' ";
			
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
echo "<meta HTTP-EQUIV='refresh' CONTENT='2; URL=yonetici_kedimamasi_index.php'>";
}
else {
echo "<center><img src='image/sil.png'><br><b>Hata!! Düzenleme işlemi gerçekleşmedi... <br> Hata Kodu : Yayın_2 </b> </center>";
}

}
else {

$id = $_GET['id'];
$sorgu = mysql_query("SELECT * FROM `kedimamasi` WHERE id='$id'");
$satir = mysql_fetch_array($sorgu );


?>


<form name="kedimamasi_duzenleme_formu" method="POST" action="yonetici_kedimamasi_duzenle.php" enctype="multipart/form-data" >
<table align="center">
<tr>
<td width=150> <b>Başlık(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['baslik_tr'];  ?>" name="baslik_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Başlık(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['baslik_en'];  ?>" name="baslik_en" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yazı(TR)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['yazi_tr'];  ?>"name="yazi_tr" style="width:400px;"> </td>
</tr>

<tr>
<td width=150> <b>Yazı(EN)</b> </td>
<td width=500> <input type="text" value="<?php echo $satir['yazi_en'];  ?>"name="yazi_en" style="width:400px;"> </td>
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

