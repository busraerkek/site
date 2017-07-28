<table   width="700px" height="500px">


<?php 
 echo "<center>"."<p  style='background-color:#d2a8ff'>"."<font face='CupiddeLocke' size='6' color='#9966CC' >".$metin['kedimamasibasligi']."</font>"."</p>"."</center>";


$sorgu = mysql_query("SELECT * FROM kedimamasi");
while ( $satir = mysql_fetch_array($sorgu) ) {?>

<tr>
<td>

<?php
echo"<b>".$satir['baslik_'.$_SESSION["dil"].'']."</b>";
echo "<br>".$satir['yazi_'.$_SESSION["dil"].'']."</br>" ;
if($satir['resim']=='')
{
}
else
echo "<br>"."<img width=500  height=300 align=center src='image/".$satir['resim']."'>"."</br>";
?>

</td></tr>

<?php }
?>


 </table>
