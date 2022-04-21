<?php
	//require_once("connect.php");
	
	$email = mysqli_real_escape_string($link, $_POST["email"]);
	$parola = md5(mysqli_real_escape_string($link,$_POST["parola"]));
	
	$sql = "SELECT * FROM uye WHERE email='$email' AND parola='$parola'";
	//echo $sql;
	//exit;
	$s = mysqli_num_rows(mysqli_query($link, $sql));
	
	if($s >= 1){
		$kullanici = mysqli_fetch_array(mysqli_query($link, $sql));
		
		if($kullanici["yetki"] == 1){
			if(isset($_POST['hatirla'])){
				setcookie("ASID", $kullanici["session"], time()+86400*30);
				header('Location: index.php');
			}
		
			setcookie("ASID", $kullanici["session"]);
			header('Location: index.php');
			
		}else{
			if(isset($_POST['hatirla'])){
				setcookie("SID", $kullanici["session"], time()+86400*30);
				header('Location: index.php');
			}
			setcookie("SID", $kullanici["session"]);
			header('Location: index.php');
		}
		
	}else{
		echo "<script>alert('Giris basarisiz. Giriş sayfasına yönlendiriliyorsunuz.');</script>";
		sleep(5);
		header('Location: index.php?task=login');
	}
	
	mysqli_close($link);
?>