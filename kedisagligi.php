<html>
<table   width="700px" height="500px">



 <?php 
 echo "<center>"."<p  style='background-color:#d2a8ff'>"."<font face='CupiddeLocke' size='6' color='#9966CC' >".$metin['kedisagligibasligi']."</font>"."</p>"."</center>";
echo "<tr>"."<p>"."<img width=700 height=350 align=center src='image/kedisagligi.jpg'>"."</p>"."</tr>";
 
 
 $sorgu = mysql_query("SELECT * FROM kedi_sagligi");

while ( $satir = mysql_fetch_array($sorgu) ) {?>

<tr>
<td>
<?php

echo"<b>"."<br>".$satir['baslik_'.$_SESSION["dil"].'']."</br>"."</b>";
echo "<br>".$satir['yazi_'.$_SESSION["dil"].'']."</br>" ;

?>

</td></tr>

<?php }
?>

  </table>
</html>