	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-area">
						<?php						
							if(!isset($_GET["s"])){
								$s = 1;
							}else{
								$s = $_GET["s"];
							}

							$sorgu = mysqli_query($link,"select * from yazi where kategori='$kategori'");
							$limit = 6; //Kayıtlar kaçar kaçar listelenecek
							$kayitSayisi = mysqli_num_rows($sorgu); //Toplam Kayıt Sayısı
							$sayfaSayisi = ceil($kayitSayisi/$limit); //Toplam Sayfa Sayısı
							$baslangic = ($s*$limit)-$limit; //Hangi kayıttan başlanacak
						
							$sorgu = mysqli_query($link,"select * from yazi where kategori='$kategori' order by id desc limit $baslangic,$limit");
							
							while($kayit=mysqli_fetch_array($sorgu)){
								echo '<div class="col-sm-4 single-blog-post" style="height:600px;">';
								echo '<h3>'.$kayit["baslik"].'</h3>';
								echo '<div class="post-meta">';
								echo '<ul>';
								echo '<li><i class="fa fa-calendar"></i> '.$kayit["tarih"].'</li>';
								echo '</ul>';
								echo '</div>';
								if(strlen($haber["resim"])>10) {
									echo '<a href="index.php?task=yazi_view&yazi_id='.$kayit["id"].'">';
									echo '<img src="'.$kayit["resim"].'" width=250>';
									echo '</a>';
								}
								echo '<p>'.substr($kayit["metin"], 0, 350).'...</p>';
								echo '<a  class="btn btn-primary" href="index.php?task=yazi_view&yazi_id='.$kayit["id"].'">Okumaya devam et</a>';
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