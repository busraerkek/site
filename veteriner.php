<table  width="700px" height="700px">
<?php 
$sorgu = mysql_query("SELECT * FROM veteriner");
while ( $satir = mysql_fetch_array($sorgu) ) {?>

<tr>
<td>
<?php
echo "<br>"."<p  style='background-color:#FFCCFF'>"."<font  face='CupiddeLocke' size='5' color='#FF3399' >".$satir['adi_'.$_SESSION["dil"].'']."</font>"."</br>"."</p>";
echo "<br>" ."<font face='Microsoft Sans Serif' size='3' color='#FF66FF' >".$metin['adres'].":"."</font>". "<font face='Arial' size='3' color='#300022'>".$satir['adres_'.$_SESSION["dil"].'']."</font>"."</br>";
echo "<br>"."<font face='Microsoft Sans Serif' size='3' color='#FF66FF' >".$metin['telefon'].":"."</font>"."<font face='Arial' size='3' color='#300022'>".$satir['telefon_'.$_SESSION["dil"].'']."</font>"."</br>" ;
echo "<br>" ."<font face='Microsoft Sans Serif' size='3' color='#FF66FF' >".$metin['internetadresi'].":"."</font>"."<font face='Arial' size='3' color='#300022' >"." <a href=" .$satir['internetadresi_'.$_SESSION["dil"].'']." target='_blank'>".$satir['internetadresi_'.$_SESSION["dil"].'']."</a>"."</font>"."</br>";
if($satir['resim']=='')
{
}
else
echo "<br>"."<img width=320  height=320 align=center src='image/".$satir['resim']."'>"."</br>";
?>



</td>

</tr>
<?php }
?>


 </table>