<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="blog-post-area">
				<div class="single-blog-post">
				<?php 
					if(!isset($_REQUEST["yazi_id"])){
						echo '<script>window.location="index.php";</script>';
					}
					$id = mysqli_real_escape_string($link, $_REQUEST["yazi_id"]);
					
					$sql = mysqli_query($link, "SELECT * FROM yazi WHERE id='$id'");
					
					if($haber = mysqli_fetch_array($sql)){
						echo '<h3>'.$haber["baslik"].'</h3>';
						echo '<div class="post-meta"><ul>';
						echo '<li><i class="fa fa-calendar"></i> '.$haber["tarih"].'</li>';
						echo '</ul></div>';
						
						echo '<a href=""><img src="'.$haber["resim"].'" alt=""></a>';
						echo '<p>'.$haber["metin"].'</p>';
					}else{
						echo '<script>window.location="index.php";</script></a>';
					}
				?>
						
				</div>
			</div><!--/blog-post-area-->
        </div>
    </div>
</div>