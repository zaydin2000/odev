<?php

$connect_web = simplexml_load_file('https://www.trthaber.com/xml_mobile.php?tur=xml_genel&kategori=spor&adet=20&selectEx=yorumSay,okunmaadedi,anasayfamanset,kategorimanset');

foreach($connect_web->haber as $item){
   // while($kayit=mysqli_fetch_array($sorgu)){
        echo '<div class="col-sm-4 single-blog-post" style="height:450px;">';
        echo '<h3>'.$item->haber_manset.'</h3>';
        echo '<div class="post-meta">';
        echo '<ul>';
        echo '</ul>';
        echo '</div>';
        echo '<a href="'.$item->haber_link.'">';
        echo '<img src="'.$item->haber_resim.'" width=350>';
        echo '</a>';
        echo '<p>'.substr($item->haber_aciklama, 0, 400).'...</p>';
        echo '<a  class="btn btn-primary" href="http://trthaber.com/'.$item->haber_link.'">Okumaya devam et</a>';
        echo '</div>';
        
  //  }


}

?>