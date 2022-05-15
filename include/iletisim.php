<?php

  $islem = strip_tags($_REQUEST['islem']?? '');
 
  if($islem=="ekle"){
    $ad         =  mysqli_real_escape_string($link, $_REQUEST["ad"]);
    $email      =  mysqli_real_escape_string($link, $_REQUEST["email"]);
    $memleket   =  mysqli_real_escape_string($link, $_REQUEST["memleket"]);
    $cinsiyet   =  mysqli_real_escape_string($link, $_REQUEST["cinsiyet"]);
    $hobi       =  mysqli_real_escape_string($link, $_REQUEST["hobi"]);
    $mesaj      =  mysqli_real_escape_string($link, $_REQUEST["mesaj"]);

    $sql = "insert into iletisim (ad, email, memleket, cinsiyet, hobi, mesaj, tarih) VALUES ('$ad', '$email', '$memleket', '$cinsiyet', '$hobi', '$mesaj', NOW())";
    $res = mysqli_query($link, $sql) or die("Sorguda hata ekle ".$sql);

    $mesaj = "Mesajınız başarı ile kaydedildi.";

  }

?>
<script type="text/javascript">
                function ValidateEmail(inputText)
                {
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if(inputText.value.match(mailformat))
                    {
                         return true;
                    }
                    else
                    {
                        return false;
                    }
                }

                function Kontrol(){
                Form=document.forms['iletisim'];
 
                //Radio Kontrol
                RadyoSecim=0;
                for(i=0; i<Form.elements['cinsiyet'].length; i++){
                    if(Form.elements['cinsiyet'][i].checked==1){
                        RadyoSecim=1;
                        break;
                    }
                }

                //Checkbox kontrol
                CheckSecim=0;
                for(i=0; i<Form.elements['hobi'].length; i++){
                    if(Form.elements['hobi'][i].checked==1){
                        CheckSecim=1;
                        break;
                    }
                }


                if(Form.elements['ad'].value.length==0) alert("Lütfen isim giriniz"); //text
                else if(Form.elements['memleket'].selectedIndex<1) alert("Lütfen memleket seçiniz"); //select
                else if(RadyoSecim==0) alert("Lütfen cinsiyet seçiniz"); //radio
                else if(CheckSecim==0) alert("Lütfen hobi seçiniz"); //checkbox
                else if(Form.elements['mesaj'].value.length==0) alert("Lütfen mesajınızı giriniz"); //textarea
                else if(ValidateEmail(Form.elements['email'])==false) alert("Lütfen geçerli bir email giriniz");
            
                else Form.submit();
            }
        </script>
<div class="row" style="height:20px;">		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">İLETİŞİMDE KALIN</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="iletisim" action="index.php?task=iletisim&islem=ekle" class="contact-form row" name="iletisim" method="post" >
                        <?php if(strlen($mesaj)>0) { ?>
                            <div class="col-md-12 mesaj center"><?php echo $mesaj; ?></div>
                        <?php } ?>
                        <div class="form-group col-md-6">Adınız :
				                <input type="text" name="ad" class="form-control" placeholder="İsim">
				            </div>
				            <div class="form-group col-md-6">Email :
				                <input type="email" name="email" class="form-control" placeholder="E-posta">
				            </div>
				            <div class="form-group col-md-12">Memleket :
                            <select name="memleket" class="form-control">
                                    <option>-- Memleketiniz --</option>
                                    <?php 
                                    $memleket=array("","Adana","Adıyaman","Afyonkarahisar","Ağrı","Amasya","Ankara","Antalya","Artvin","Aydın","Balıkesir","Bilecik","Bingöl",
                                        "Bitlis","Bolu","Burdur","Bursa","Çanakkale","Çankırı","Çorum","Denizli","Diyarbakır","Edirne","Elazığ","Erzincan","Erzurum",
                                        "Eskişehir","Gaziantep","Giresun","Gümüşhane","Hakkâri","Hatay","Isparta","Mersin","İstanbul","İzmir","Kars","Kastamonu","Kayseri","Kırklareli","Kırşehir","Kocaeli","Konya","Kütahya",
                                        "Malatya","Manisa","Kahramanmaraş","Mardin","Muğla","Muş","Nevşehir","Niğde","Ordu","Rize","Sakarya","Samsun","Siirt","Sinop","Sivas",
                                        "Tekirdağ","Tokat","Trabzon","Tunceli","Şanlıurfa","Uşak","Van","Yozgat","Zonguldak","Aksaray","Bayburt",
                                        "Karaman","Kırıkkale","Batman","Şırnak","Bartın","Ardahan","Iğdır","Yalova","Karabük","Kilis","Osmaniye","Düzce");
                    
                                    for ($i=1; $i<82; $i++) {

                                        echo "<option value=\"".$i."\">".$memleket[$i]."</option>";

                                    }
                                    ?>
                                </select>
				            </div>
                            <div class="form-group col-md-6">Cinsiyet :
                                <input type="radio" name="cinsiyet" value="1" /> Erkek <input type="radio" name="cinsiyet" value="0" /> Kadın
				            </div>
                            <div class="form-group col-md-6">Hobi :
                                <input  type="checkbox" name="hobi" value="Kitap" /> Kitap <input type="checkbox" name="hobi" value="Gezi" /> Gezi
				            </div>                            
				            <div class="form-group col-md-12">Mesajınız :
				                <textarea name="mesaj" id="message" class="form-control" rows="8" placeholder="Mesajınız"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="button" class="btn btn-primary pull-right" value="Kaydet"  onclick="Kontrol()">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    	</div>  

 
 