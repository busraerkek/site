
<script type="text/javascript">
 function anket_oy() {
 $('#cevap_alani').html('<br><center><img src=image/yukleniyor.gif></center>');
 
 $.ajax({
 type : "POST",
 url : "anket_oy.php",
 data : $('form#anket_form').serialize(),
 success : function(ajaxcevap) {
	$('#anket_alani').html(ajaxcevap);
	$('#cevap_alani').html('');
 }
} );
 }
</script>
<?php 
include('baglan.php');

$sorgu = mysql_query("select * from anket where yayindami = '1' order by rand() limit 1");

$satir = mysql_fetch_array($sorgu );

$ip = $_SERVER['REMOTE_ADDR'];
$id = $satir['id'];

$sorgu = mysql_query("select * from oy where anket_id = '$id' and ip = '$ip'");
$say = mysql_num_rows($sorgu);

if ( $say > 0  ) {
 $sorgu1 = mysql_query("select * from oy where anket_id = '$id' and cevap = '1'");
 $s_cvp1 = mysql_num_rows($sorgu1);
 $sorgu2 = mysql_query("select * from oy where anket_id = '$id' and cevap = '2'");
 $s_cvp2 = mysql_num_rows($sorgu2);
 $sorgu3 = mysql_query("select * from oy where anket_id = '$id' and cevap = '3'");
 $s_cvp3 = mysql_num_rows($sorgu3);
 $sorgu4 = mysql_query("select * from oy where anket_id = '$id' and cevap = '4'");
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
 <?php
}
else {

?>
 <div id="anket_alani">
<form id="anket_form" method="POST" action="javascript:anket_oy()">
<ul type="none"> <?php echo $satir['soru_'.$_SESSION["dil"].''] ?>
<li><input checked type="radio" name="cevap" value="1"><?php echo $satir['cevap1_'.$_SESSION["dil"].''] ?></li>
<li><input type="radio" name="cevap" value="2"><?php echo $satir['cevap2_'.$_SESSION["dil"].''] ?></li>
<li><input type="radio" name="cevap" value="3"><?php echo $satir['cevap3_'.$_SESSION["dil"].''] ?></li>
<li><input type="radio" name="cevap" value="4"><?php echo $satir['cevap4_'.$_SESSION["dil"].''] ?></li>
<li><input type="hidden" name="anket_id" value="<?php echo $satir['id'] ?>"></li><br>
<li><input type="submit" value="Gönder" name="submit"> <div id="cevap_alani"></div> </li>
</ul>
</form>
</div>
<?php } ?>


 


 