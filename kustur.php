<html>
<table   width="700px" height="500px">
<?php 
echo "<center>"."<p  style='background-color:#d2a8ff'>"."<font face='CupiddeLocke' size='6' color='#9966CC'>".$metin["kusbasligi"]."</font>"."</p>"."</center>";


$sorgu = mysql_query("SELECT * FROM kuşlar");
while ( $satir = mysql_fetch_array($sorgu) ) {?>
</br>
<tr>
<td><?php if($satir['resim']=='')
{
}
else
echo "<img width=250  height=300 align=center src='image/".$satir['resim']."'>";?></td>
<td>
<?php


echo "<b>".$metin['tur'].":"."</b>".$satir['tur_'.$_SESSION["dil"].''] ;
echo "<br>"."<b>".$metin['yer'].":"."</b>".$satir['yer_'.$_SESSION["dil"].'']. "</br>";
echo "<b>".$metin['renk'].":"."</b>". $satir['renk_'.$_SESSION["dil"].''] ;
echo "<br>" ."<b>".$metin['bakim'].":"."</b>". $satir['bakim_'.$_SESSION["dil"].''] . "</br>";
echo "<b>".$metin['karakterozelligi'].":"."</b>". $satir['karakterozelligi_'.$_SESSION["dil"].''];
echo "<br>" ."<b>".$metin['tuysekli'].":"."</b>". $satir['tuysekli_'.$_SESSION["dil"].'']. "</br>";
echo "<b>".$metin['boyut'].":"."</b>". $satir['boyut_'.$_SESSION["dil"].''];
?>
</td></tr>

<?php }
?>


<tr>
</table>
<?php 
echo "<br>"."<p align='center'>"."<font face='Arial Black' size='4' color='#9966CC' >".$metin['altyazi']."</font>"."</p>"
?>
</tr></br>
</html>