<html>
<table   width="700px" height="500px">


 <?php 
echo "<tr>"."<center>"."<p  style='background-color:#d2a8ff'>"."<font face='CupiddeLocke' size='6' color='#9966CC' >".$metin['kopektuvaletbasligi']."</font>"."</p>"."</center>"."<br>"."</tr>";
echo "<tr>"."<p>"."<img width=700 height=350 align=center src='image/kopektuvalet.jpg'>"."</p>"."</tr>";
 
 
$sorgu = mysql_query("SELECT * FROM kopek_tuvalet");
while ( $satir = mysql_fetch_array($sorgu) ) {?>
</br>
<tr>
<td>
<?php
echo"<b>"."<br>".$satir['baslik_'.$_SESSION["dil"].'']."</br>"."</b>";
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
</html>