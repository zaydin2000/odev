<?php
	error_reporting(0);
	require_once("connect.php");


	$task = strip_tags($_GET['task']?? '');
	$admin = strip_tags($_GET['admin']?? '');

	if($task=="logout") {
		include("include/logout.php");
	}

	if($task=="login_check") {
		include("include/login_check.php");
	}


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gümüşhane </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/changelog.css" rel="stylesheet">
	<!-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li  class="nav-item active"><a href="index.php" >Ana Sayfa</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >Hakkımda</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >Eğitim</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >Şehrim</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >Mirasımız</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >İlgi Alanlarım</a></li>
								<li class="nav-item"><a href="contact-us.php" class="nav-link" >İletişim</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
					<div class="collapse navbar-collapse pull-right">
							<ul class="nav navbar-nav">
							
								<?php
									if(isset($_COOKIE["SID"])){
										$sid = $_COOKIE["SID"];
										$sql = mysqli_query($link, "SELECT * FROM uye WHERE session='$sid'");
										
										while($a = mysqli_fetch_array($sql)){
											if($a){
												echo '<li><a href="hesabim.php">'.$a["ad"].'</a></li>';
												echo '<li><a href="cikis.php"><i class="fa fa-lock"></i> Çıkış</a></li>';
											}else{
												setcookie("SID", "", time()-3600);
												echo '<script>window.location="index.php";</script>';
											}
										}
										
									}else if(isset($_COOKIE["ASID"])){
										$sid = $_COOKIE["ASID"];
										$sql = mysqli_query($link, "SELECT * FROM uye WHERE session='$sid'");
										
										while($a = mysqli_fetch_array($sql)){
											if($a){
												echo '<li><a href="index.php?task=admin">'.$a["ad"].'</a></li>';
												echo '<li><a href="index.php?task=logout"><i class="fa fa-lock"></i> Çıkış</a></li>';
											}else{
												setcookie("ASID", "", time()-3600);
												echo '<script>window.location="index.php";</script>';
											}
										}
									}else{
										echo '<li><a href="index.php?task=login"><i class="fa fa-lock"></i> Giriş Yap/Üye Ol</a></li>';
									}
								
								?>
								
							</ul>
						</div>	
					
				</div>
			</div>
		</div><!--/header_top-->

	</header><!--/header-->
	<?php if($task=="admin") { ?>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php?task=admin&admin=yaziekle">Yazı Ekle</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		<?php }; ?>

		<section>
		<div class="container">
			<div class="row">
				<?php
				if($task=="login") {
					include('include/login.php');
				} elseif ($task=="admin" and $admin=="slider") {
					include('include/slider.php');
				} elseif ($task=="admin" and $admin=="yaziekle") {
					include('include/yaziekle.php');
				} elseif ($task=="admin" and $admin=="haberler") {
					include('include/haberler.php');

				} elseif($task!="admin") {
					include("include/mainpage.php");
				}

				?>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 Zafer AYDIN. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>