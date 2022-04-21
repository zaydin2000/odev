<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">
								<?php
									$s = mysqli_query($link,"SELECT * FROM slider LIMIT 1");
								
									if($slider = mysqli_fetch_array($s)){
										
										echo '<div class="item active">';
										echo '<div class="col-sm-6">';
										echo '<h1><span>'.$slider["baslik"].'</span></h1>';
										echo '<h2>'.$slider["ikinci"].'</h2>';
										echo '<p>'.$slider["detay"].'</p>';
										echo '<a href="haber.php?id='.$slider["haber_id"].'" class="btn btn-default get">Şimdi oku</a></a>';
										echo '</div>';
										echo '<div class="col-sm-6">';
										echo '<img src="images/'.$slider["foto"].'" class="girl img-responsive" alt="" />';
										echo '</div>';
										echo '</div>';
									}
									
									$sql = mysqli_query($link,"SELECT * FROM slider LIMIT 1,3");
									
									while($slider = mysqli_fetch_array($sql)){
										echo '<div class="item">';
										echo '<div class="col-sm-6">';
										echo '<h1><span>'.$slider["baslik"].'</span></h1>';
										echo '<h2>'.$slider["ikinci"].'</h2>';
										echo '<p>'.$slider["detay"].'</p>';
										echo '<a href="haber.php?id='.$slider["haber_id"].'" class="btn btn-default get">Şimdi oku</a>';
										echo '</div>';
										echo '<div class="col-sm-6">';
										echo '<img src="images/'.$slider["foto"].'" class="girl img-responsive" alt="" />';
										echo '</div>';
										echo '</div>';
									}

								?>							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-sm-offset-1">
					<div class="blog-post-area">
						<h2 class="title text-center"> MİRASIMIZ</h2>
						
						<?php
						
							if(!isset($_GET["s"])){
								$s = 1;
							}else{
								$s = $_GET["s"];
							}

							$sorgu = mysqli_query($link,"select * from yazi");
							$limit = 5; //Kayıtlar kaçar kaçar listelenecek
							$kayitSayisi = mysqli_num_rows($sorgu); //Toplam Kayıt Sayısı
							$sayfaSayisi = ceil($kayitSayisi/$limit); //Toplam Sayfa Sayısı
							$baslangic = ($s*$limit)-$limit; //Hangi kayıttan başlanacak
						
							$sorgu = mysqli_query($link,"select * from yazi order by id desc limit $baslangic,$limit");
							
							while($kayit=mysqli_fetch_array($sorgu)){
								echo '<div class="single-blog-post">';
								echo '<h3>'.$kayit["baslik"].'</h3>';
								echo '<div class="post-meta">';
								echo '<ul>';
								echo '<li><i class="fa fa-calendar"></i> '.$kayit["tarih"].'</li>';
								echo '</ul>';
								echo '</div>';
								echo '<a href="haber.php?id='.$kayit["id"].'">';
								echo '<img src="'.$kayit["resim"].'" width=350>';
								echo '</a>';
								echo '<p>'.substr($kayit["metin"], 0, 350).'</p>';
								echo '<a  class="btn btn-primary" href="haber.php?id='.$kayit["id"].'">Okumaya devam et</a>';
								echo '</div>';
								
							}
						
						    if ($sayfaSayisi>1){ //1'den fazla kayıt varsa
								echo '<div class="pagination-area">';
								echo '<ul class="pagination">';
								for ($i=1;$i<=$sayfaSayisi;$i++){
									if ($s==$i){ 
										echo '<li><a href="index.php?s='.$s.'" class="active">'.$s.'</a></li>';
									}else{
										echo '<li><a href="index.php?s='.$i.'">'.$i.'</a></li>';
									}
								}
								
								if($s < $sayfaSayisi){
									$next = $s+1;
									echo '<li><a href="index.php?s='.$next.'"><i class="fa fa-angle-double-right"></i></a></li>';
								}

								echo '</ul>';
								echo '</div>';
							}
						
						?>

								
					
					</div>
				</div>
			</div>
		</div>
	</section>