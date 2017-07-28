<table  width="700px" height="500px">


<?php 

echo "<center>"."<p  style='background-color:#d2a8ff'>"."<font face='CupiddeLocke' size='6' color='#9966CC' >".$metin['kuyrukbasligi']."</font>"."</p>"."</center>";

$sorgu = mysql_query("SELECT * FROM kuyruk");
while ( $satir = mysql_fetch_array($sorgu) ) {?>

<tr>
<td>

<?php
if($satir['resim']=='')
{
}
else
echo "<br>"."<img width=600  height=350 align=center src='image/".$satir['resim']."'>"."</br>";
echo"<b>"."<br>".$satir['baslik_'.$_SESSION["dil"].'']."</br>"."</b>";
echo "<br>".$satir['yazi_'.$_SESSION["dil"].'']."</br>" ;
?>

</td></tr>

<?php }
?>

 

</table>
