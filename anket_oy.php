

<?php
session_start();
if ( isset( $_SESSION["dil"]) ) {
	require("languages/".$_SESSION["dil"].".php");
} 
else {
	require("languages/en.php");
	$_SESSION["dil"] = "en";
}
?>
<?php include('baglan.php');

$cevap = $_POST['cevap'];
$anket_id = $_POST['anket_id'];
$ip = $_SERVER['REMOTE_ADDR'];

$sonuc = mysql_query("Insert into oy (anket_id, ip, cevap) values ( '$anket_id','$ip', '$cevap' )");

$sorgu = mysql_query("select * from anket where id = '$anket_id'");

$satir = mysql_fetch_array($sorgu );




	
 $sorgu1 = mysql_query("select * from oy where anket_id = '$anket_id' and cevap = '1'");
 $s_cvp1 = mysql_num_rows($sorgu1);
 $sorgu2 = mysql_query("select * from oy where anket_id = '$anket_id' and cevap = '2'");
 $s_cvp2 = mysql_num_rows($sorgu2);
 $sorgu3 = mysql_query("select * from oy where anket_id = '$anket_id' and cevap = '3'");
 $s_cvp3 = mysql_num_rows($sorgu3);
 $sorgu4 = mysql_query("select * from oy where anket_id = '$anket_id' and cevap = '4'");
 $s_cvp4 = mysql_num_rows($sorgu4);
 
 $toplam = $s_cvp1 + $s_cvp2 + $s_cvp3 + $s_cvp4;
 
 ?>
 
 <ul type="none"> <?php echo $satir['soru_'.$_SESSION["dil"].''] ?>
<li><?php echo $satir['cevap1_'.$_SESSION["dil"].'']." : ".$s_cvp1 ?> </li>
<li><img src="image/yuzde.jpg" height="16" width="<?php echo round(($s_cvp1*100)/$toplam) ?>"></li>
<li><?php echo $satir['cevap2_'.$_SESSION["dil"].'']." : ".$s_cvp2 ?></li>
<li><img src="image/yuzde.jpg" height="16" width="<?php echo round(($s_cvp2*100)/$toplam) ?>"></li>
<li><?php echo $satir['cevap3_'.$_SESSION["dil"].'']." : ".$s_cvp3 ?></li>
<li><img src="image/yuzde.jpg" height="16" width="<?php echo round(($s_cvp3*100)/$toplam) ?>"></li>
<li><?php echo $satir['cevap4_'.$_SESSION["dil"].'']." : ".$s_cvp4 ?></li>
<li><img src="image/yuzde.jpg" height="16" width="<?php echo round(($s_cvp4*100)/$toplam) ?>"></li>
</ul>
