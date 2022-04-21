<?php
	
	$link = mysqli_connect("localhost", "root")or die("Mysql Bağlantısı kurulamadı.");

	mysqli_select_db($link, "proje") or die("Veritabanına bağlanılamadı.");

	mysqli_query($link,"SET NAMES UTF8");

	define("HDD_YOLU", "D:/xampp/htdocs/odev/");
?>
