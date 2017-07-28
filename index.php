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
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<link href="style/stil_hayvanlar.css" type="text/css" media="all" rel="stylesheet">
</head>
<title>
Hayvan Sitesi ve Evcil Hayvanlar
</title>


<div id="sayfa">

	<div id="basresim">﻿<?php include("basresim.php"); ?></a></div>
	<div id="menu" > 
		<a href="?i=anasayfa"> <?php echo $metin["anasayfa"]; ?> </a>     
		<a href="?i=kediler"> <?php echo $metin["kedi"]; ?> </a>  
		<a href="?i=kopekler"> <?php echo $metin["kop"]; ?> </a>  
		<a href="?i=kuslar"> <?php echo $metin["kus"]; ?> </a>  
		<a href="?i=hayvan_bar"> <?php echo $metin["hbar"]; ?> </a>  
		<a href="?i=veteriner"> <?php echo $metin["vet"]; ?> </a>	
		<a href="?i=iletisim"> <?php echo $metin["iletisim"]; ?> </a>	
		
	</div>
	<?php
	echo "<marquee>"."<font face='Arial Rounded MT Bold' size='6' color='#696969'>".$metin["ustyazi"]."</font>";
    echo "<font color='#696969'>"."<br>"."Charlie Chaplin"."</br>"."</marquee>"."</font>";
    ?>
	<div id="sol"><?php include('anket.php'); 
	$id = @$_GET['i'];  
	?>
	<?php 
	echo "<b>"."<font face='CupiddeLocke' size='4' color='#9966CC' >".$metin["sayfadili"]."</font>"."</b>"."<br>"?><a href="dil.php?dil=tr&sayfa=<?php echo $id; ?>"><font face='Arial Black' size='4' color='#FF3399' >Türkçe</font></a> - <a href="dil.php?dil=en&sayfa=<?php echo $id; ?>"><font face='Arial Black' size='4' color='#FF3399' >English</font></a>

	</div>
	

<div id="orta">

<?php

include('baglan.php');
	$id = @$_GET['i'];
	
    if ( $id == "kediler"  ) {
		include('kediler.php');
	}
	elseif ( $id == "kopekler"  ) {
		include('kopekler.php');
	}
	elseif ( $id == "kuslar"  ) {
		include('kuslar.php');
	}
	elseif ( $id == "hayvan_bar"  ) {
		include('hayvanbarinaklari.php');
	}
	elseif ( $id == "veteriner"  ) {
		include('veteriner.php');
	}
	elseif ( $id == "iletisim"  ) {
		include('iletisim.php');
	}
	elseif ( $id == "kedimamasi"  ) {
		include('kedimamasi.php');
	}
	elseif ( $id == "kutupayisi"  ) {
		include('kutupayisi.php');
	}
	elseif ( $id == "komikhayvan"  ) {
		include('komikhayvan.php');
	}
	elseif ( $id == "kuyruk"  ) {
		include('kuyruk.php');
	}
	elseif ( $id == "keditur"  ) {
		include('keditur.php');
	}
	elseif ( $id == "kedituvalet"  ) {
		include('kedituvalet.php');
	}
	elseif ( $id == "kedisagligi"  ) {
		include('kedisagligi.php');
	}
	elseif ( $id == "kopektur"  ) {
		include('kopektur.php');
	}
	elseif ( $id == "kopektuvalet"  ) {
		include('kopektuvalet.php');
	}
	elseif ( $id == "kopeksagligi"  ) {
		include('kopeksagligi.php');
	}
	elseif ( $id == "kustur"  ) {
		include('kustur.php');
	}
	elseif ( $id == "kussagligi"  ) {
		include('kussagligi.php');
	}
	else{include('anasayfa.php');}
	
	?>
	</div>

	<div id="alt"><font face="Arial Rounded MT Bold" size="4" color="#9966CC"><b>Copyright © 2016 Büşra Erkek </b></font>
	
	</div>

	
	</div>
</html>