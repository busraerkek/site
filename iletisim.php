
<script type="text/javascript">
 function iletisim() {
 $.ajax({
 type : "POST",
 url : "iletisim_gonder.php",
 data : $('form#iletisim_form').serialize(),
 success : function(ajaxcevap) {
	$('#cevap1_alani').html(ajaxcevap);
	
 }
} );
 }
</script>

<?php
include('baglan.php');?>

 <div id="iletisim_alani">
<form id="iletisim_form" method="POST" action="javascript:iletisim()">
<?php
 echo "<font face='Arial Rounded MT Bold' size='4' color='#9966CC' >".$metin['form1']."<br/>"."</font>";

echo "<font  face='Arial Rounded MT Bold' size='3' color='#3f007f'>".$metin['form2']."</font>"."<br/>";
echo "<input type='text' name='ad'/>"."<br/>";
echo "<font face='Arial Rounded MT Bold' size='3'color='#3f007f'>".$metin['form3']."</font>"."<br/>";
echo "<input type='text' name='soyad' />"."<br/>";
echo "<font face='Arial Rounded MT Bold' size='3' color='#3f007f'>".$metin['form4']."</font>"."<br/>";
echo "<textarea name='mesaj' cols='50' rows='5'>"."</textarea>"."<br/>";
echo "<input type='submit' value=".$metin['form5']." />";
echo "<input type='reset'/>";
 ?>
</form></div>
<div id="cevap1_alani"></div>