<?php
  $islem = strip_tags($_REQUEST['islem']?? '');
  $id = strip_tags($_REQUEST['id']?? '');

  if($islem=="ekle"){
    $baslik =  mysqli_real_escape_string($link, $_REQUEST["baslik"]);
    $kategori =  mysqli_real_escape_string($link, $_REQUEST["kategori"]);
    $metin =  $_REQUEST["metin"];
    $images 		= $_FILES["images"]["tmp_name"];
    $images_size 	= $_FILES["images"]["size"];

    $sql = "insert into yazi (baslik, kategori, tarih, metin) VALUES ('$baslik', '$kategori', NOW(), '$metin')";
    $res = mysqli_query($link, $sql) or die("Sorguda hata ekle ".$sql);

  	if (isset($images_size) && $images_size) {
      $resim_id	= mysqli_insert_id($link);
      $resimname 	= $resim_id.".jpg";
        $yolk = HDD_YOLU."/images/yazi/";
           copy ($images, $yolk.$resimname);
           chmod ($yolk.$resimname,0644);
       };
  
      $resimname = "images/yazi/".$resimname;
      $sql = "update yazi set resim='$resimname' where id='$resim_id'";
      $res = mysqli_query($link, $sql) or die("Sorguda hata Resim".$sql);

  }

  if($islem=="update_save"){
    $baslik =  mysqli_real_escape_string($link, $_REQUEST["baslik"]);
    $kategori =  mysqli_real_escape_string($link, $_REQUEST["kategori"]);
    $metin =  $_REQUEST["metin"];
    $images 		= $_FILES["images"]["tmp_name"];
    $images_size 	= $_FILES["images"]["size"];

    $sql = "update yazi set baslik='$baslik', kategori='$kategori', metin='$metin' where id='$id';"; 
    //echo $sql;
    $res = mysqli_query($link, $sql) or die("Sorguda hata ekle ".$sql);

  	if (isset($images_size) && $images_size) {
      $resimname 	= $id.".jpg";
      $yol = HDD_YOLU."/images/yazi/";
      copy ($images, $yol.$resimname);
      chmod ($yol.$resimname,0644);
      $resimname = "images/yazi/".$resimname;
      $sql = "update yazi set resim='$resimname' where id='$id'";
      $res = mysqli_query($link, $sql) or die("Sorguda hata Resim".$sql);
    };
  }

  if ($islem == "delete") {
  	$sql = "delete from yazi where id='$id';";
 	  $res = mysqli_query($link, $sql) or die("Sorguda hata sil1".$sql);

    $resim = HDD_YOLU."/images/yazi/".$id.".jpg";
   	unlink ($resim);
  };
	
  if($islem == "update") {
		$sql 	= "select * from yazi where id='$id';";
    $res 	= mysqli_query($link, $sql) or die("Sorguda hata 11");
		$fields = mysqli_fetch_array($res, MYSQLI_BOTH);
	};
	?>
<div class="col-sm-10">
 <form class="form-horizontal" name="yazi" action="index.php?task=admin&admin=yaziekle&<?php if($islem== "update") { echo "islem=update_save"; } else { echo "islem=ekle"; }; ?>" method="post" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $fields[id]; ?>"> 
 <div class="form-group">
    <label class="control-label col-sm-2" for="baslik">Başlık:</label>
    <div class="col-sm-10">
      <input required type="text" class="form-control" name="baslik" id="baslik" placeholder="Başlık" value="<?php if($islem=='update') { echo $fields[baslik]; }  ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="resim">Resim:</label>
    <div class="col-sm-10">
    <img src="<?php echo $fields["resim"]; ?>" width=350>
    <input class="text_area" type='file' name='images' size='48'>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="kategori">Kategori:</label>
    <div class="col-sm-10">
      <select name="kategori" id="kategori" class="form-control">
        <option value="Mirasımız" <?php if($fields[kategori]=="Mirasımız" and $islem=='update') { echo "selected"; }; ?>>Mirasımız</option>
        <option value="Slider" <?php if($fields[kategori]=="Slider" and $islem=='update') { echo "selected"; }; ?>>Slider</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="metin">Metin:</label>
    <div class="col-sm-10">
  <textarea required class="form-control" rows="10" name="metin" id="metin"><?php if($islem=='update') { echo $fields[metin]; }; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-md">Kaydet</button>
    </div>
  </div>
</form>
</div>
<div class="col-sm-12">
	<table class="table table-striped">
    <thead>
      <tr>
		<th>Id</th>
        <th>Başlık</th>
        <th>Resim</th>
        <th>Kategori</th>
		<th></th>
		<th></th>
      </tr>
    </thead>
    <tbody>
		
	<?php
		$sql = mysqli_query($link,"SELECT * FROM yazi ORDER BY id desc");
		
		while($yazi = mysqli_fetch_array($sql)){
			echo "<tr>";
			echo "<td>".$yazi["id"]."</td>";
			echo "<td>".$yazi["baslik"]."</td>";
			echo "<td>".$yazi["resim"]."</td>";
			echo "<td>".$yazi["kategori"]."</td>";
			echo '<td><a href="index.php?task=admin&admin=yaziekle&islem=update&id='.$yazi["id"].'" class="btn btn-success">Düzelt</a></td>';
			echo '<td><a href="index.php?task=admin&admin=yaziekle&islem=delete&id='.$yazi["id"].'" class="btn btn-danger">Sil</a></td>';
			echo "</tr>";
		}
		
		mysqli_free_result($sql);
	?>

    </tbody>
  </table>
</div>
