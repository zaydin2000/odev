<?php
	if(isset($_COOKIE["SID"])){
		setcookie("SID","",time()-3600);
		header('Location: index.php');
	}else if($_COOKIE["OK"]){
		setcookie("OK","",time()-3600);
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}

?>