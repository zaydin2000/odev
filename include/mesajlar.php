<?php
  $islem = strip_tags($_REQUEST['islem']?? '');
  $id = strip_tags($_REQUEST['id']?? '');

  if ($islem == "delete") {
      $sql = "delete from iletisim where id='$id';";
 	  $res = mysqli_query($link, $sql) or die("Sorguda hata sil1".$sql);

  };
	
?>
<div class="col-sm-12">
	<table class="table table-striped">
    <thead>
      <tr>
		<th>Id</th>
        <th>Adı Soyadı</th>
        <th>Email</th>
        <th>Memleketi</th>
		<th>Cinsiyet</th>
		<th>Hobi</th>
		<th>Mesaj</th>
		<th>Tarih</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
		
	<?php
		$sql = mysqli_query($link,"SELECT * FROM iletisim ORDER BY id desc");
		$cinsiyet = array("Kadın","Erkek");

        $memleket=array("","Adana","Adıyaman","Afyonkarahisar","Ağrı","Amasya","Ankara","Antalya","Artvin","Aydın","Balıkesir","Bilecik","Bingöl",
                    "Bitlis","Bolu","Burdur","Bursa","Çanakkale","Çankırı","Çorum","Denizli","Diyarbakır","Edirne","Elazığ","Erzincan","Erzurum",
                    "Eskişehir","Gaziantep","Giresun","Gümüşhane","Hakkâri","Hatay","Isparta","Mersin","İstanbul","İzmir","Kars","Kastamonu","Kayseri","Kırklareli","Kırşehir","Kocaeli","Konya","Kütahya",
                    "Malatya","Manisa","Kahramanmaraş","Mardin","Muğla","Muş","Nevşehir","Niğde","Ordu","Rize","Sakarya","Samsun","Siirt","Sinop","Sivas",
                    "Tekirdağ","Tokat","Trabzon","Tunceli","Şanlıurfa","Uşak","Van","Yozgat","Zonguldak","Aksaray","Bayburt",
                    "Karaman","Kırıkkale","Batman","Şırnak","Bartın","Ardahan","Iğdır","Yalova","Karabük","Kilis","Osmaniye","Düzce");


		while($yazi = mysqli_fetch_array($sql)){
			echo "<tr>";
			echo "<td>".$yazi["id"]."</td>";
			echo "<td>".$yazi["ad"]."</td>";
			echo "<td>".$yazi["email"]."</td>";
			echo "<td>".$memleket[$yazi["memleket"]]."</td>";
			echo "<td>".$cinsiyet[$yazi["cinsiyet"]]."</td>";
			echo "<td>".$yazi["hobi"]."</td>";
			echo "<td>".$yazi["mesaj"]."</td>";
			echo "<td>".$yazi["tarih"]."</td>";
			echo '<td><a href="index.php?task=admin&admin=mesajlar&islem=delete&id='.$yazi["id"].'" class="btn btn-danger]="Sil</a></td>';
			echo "</tr>";
		}
		
		mysqli_free_result($sql);
	?>

    </tbody>
  </table>
</div>
