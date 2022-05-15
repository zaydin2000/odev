<?php
	error_reporting(0);
	require_once("connect.php");


	$task = strip_tags($_REQUEST['task']?? '');
	$admin = strip_tags($_REQUEST['admin']?? '');
	$kategori = strip_tags($_REQUEST['kategori']?? '');

	if($task=="logout") {
		include("include/logout.php");
	}

	if($task=="login_check") {
		include("include/login_check.php");
	}

	if(!isset($_COOKIE["OK"]) and $task=='admin'){
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Zafer AYDIN">
    <title>Kişisel Web Sayfası </title>
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
		<div class="bg"></div>
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li  class="nav-item active"><a href="index.php" >ANA SAYFA</a></li>
								<li class="nav-item"><a href="index.php?task=yazi_view&yazi_id=25" class="nav-link" >HAKKIMDA</a></li>
								<li class="nav-item"><a href="index.php?task=yazi_view&yazi_id=24" class="nav-link" >EĞİTİM</a></li>
								<li class="nav-item"><a href="index.php?task=yazi_view&yazi_id=20" class="nav-link" >ŞEHRİM</a></li>
								<li class="nav-item"><a href="index.php?task=yazi_listele&kategori=Mirasımız" class="nav-link" >MİRASIMIZ</a></li>
								<li class="nav-item"><a href="index.php?task=ilgi_alanlarim" class="nav-link" >İLGİ ALANLARIM</a></li>
								<li class="nav-item"><a href="index.php?task=iletisim" class="nav-link" >İLETİŞİM</a></li>
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
										
									}else if(isset($_COOKIE["OK"])){
										$sid = $_COOKIE["OK"];
										$sql = mysqli_query($link, "SELECT * FROM uye WHERE session='$sid'");
										
										while($a = mysqli_fetch_array($sql)){
											if($a){
												echo '<li><a href="index.php?task=admin&admin=yaziekle">PANEL</a></li>';
												echo '<li><a href="index.php?task=logout"><i class="fa fa-lock"></i> Çıkış</a></li>';
											}else{
												setcookie("OK", "", time()-3600);
												echo '<script>window.location="index.php";</script>';
											}
										}
									}else{
										echo '<li><a href="index.php?task=login"><i class="fa fa-lock"></i> Giriş Yap</a></li>';
									}
								
								?>
								
							</ul>
						</div>	
					
				</div>
				<?php

					$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
					$usd_buying = $connect_web->Currency[0]->BanknoteBuying;
					$usd_selling = $connect_web->Currency[0]->BanknoteSelling;
					$euro_buying = $connect_web->Currency[3]->BanknoteBuying;
					$euro_selling = $connect_web->Currency[3]->BanknoteSelling;
					$jpy_buying = $connect_web->Currency[11]->BanknoteBuying;
					$jpy_selling = $connect_web->Currency[11]->BanknoteSelling;
					$gbp_buying = $connect_web->Currency[4]->BanknoteBuying;
					$gbp_selling = $connect_web->Currency[4]->BanknoteSelling;
					$sar_buying = $connect_web->Currency[10]->BanknoteBuying;
					$sar_selling = $connect_web->Currency[10]->BanknoteSelling;
					?>
				<div class="row center">
					<div class="col-sm-12 mavi">
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav collapse navbar-collapse ">
								<li class="nav-item bosluk"><?php echo '  <b>USD Alış:</b> '.round($usd_buying,2); ?></li>
								<li class="nav-item bosluk"><?php echo '  <b>USD Satış:</b> '.round($usd_selling,2); ?></li>
								<li class="nav-item bosluk"><?php echo '  <b>EUR Alış:</b> '.round($euro_buying,2); ?></li>
								<li class="nav-item bosluk"><?php echo ' <b>EUR Satış:</b> '.round($euro_selling,2); ?></li>
								<li class="nav-item bosluk"><?php echo '  <b>JPY Alış:</b> '.round($jpy_buying,2); ?></li>
								<li class="nav-item bosluk"><?php echo ' <b>JPY Satış:</b> '.round($jpy_selling,2); ?></li>
								<li class="nav-item bosluk"><?php echo '  <b>GBP Alış:</b> '.round($gbp_buying,2); ?></li>
								<li class="nav-item bosluk"><?php echo ' <b>GBP Satış:</b> '.round($gbp_selling,2); ?></li>
								<li class="nav-item bosluk"><?php echo '  <b>SAR Alış:</b> '.round($sar_buying,2); ?></li>
								<li class="nav-item bosluk"><?php echo ' <b>SAR Satış:</b> '.round($sar_selling,2); ?></li>
							</ul>
						</div>
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
								<li><a href="index.php?task=admin&admin=mesajlar">Gelen Mesajlar</a></li>
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
				//include("include/api.php");
				if($task=="login") {
					include('include/login.php');
				} elseif ($task=="admin" and $admin=="yaziekle") {
					include('include/yaziekle.php');
				} elseif ($task=="yazi_view") {
					include('include/yazi_view.php');
				} elseif ($task=="yazi_listele") {
					include('include/yazi_listele.php');
				} elseif ($task=="iletisim") {
					include('include/iletisim.php');
				} elseif ($task=="ilgi_alanlarim") {
					include('include/ilgialanlarim.php');
				} elseif ($task=="admin" and $admin=="mesajlar") {
					include('include/mesajlar.php');
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