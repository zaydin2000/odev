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
                                    <option>------</option>
                                    <option value="1">Adana</option>
                                    <option value="2">Adıyaman</option>
                                    <option value="3">Afyonkarahisar</option>
                                    <option value="4">Ağrı</option>
                                    <option value="5">Amasya</option>
                                    <option value="6">Ankara</option>
                                    <option value="7">Antalya</option>
                                    <option value="8">Artvin</option>
                                    <option value="9">Aydın</option>
                                    <option value="10">Balıkesir</option>
                                    <option value="11">Bilecik</option>
                                    <option value="12">Bingöl</option>
                                    <option value="13">Bitlis</option>
                                    <option value="14">Bolu</option>
                                    <option value="15">Burdur</option>
                                    <option value="16">Bursa</option>
                                    <option value="17">Çanakkale</option>
                                    <option value="18">Çankırı</option>
                                    <option value="19">Çorum</option>
                                    <option value="20">Denizli</option>
                                    <option value="21">Diyarbakır</option>
                                    <option value="22">Edirne</option>
                                    <option value="23">Elazığ</option>
                                    <option value="24">Erzincan</option>
                                    <option value="25">Erzurum</option>
                                    <option value="26">Eskişehir</option>
                                    <option value="27">Gaziantep</option>
                                    <option value="28">Giresun</option>
                                    <option value="29">Gümüşhane</option>
                                    <option value="30">Hakkâri</option>
                                    <option value="31">Hatay</option>
                                    <option value="32">Isparta</option>
                                    <option value="33">Mersin</option>
                                    <option value="34">İstanbul</option>
                                    <option value="35">İzmir</option>
                                    <option value="36">Kars</option>
                                    <option value="37">Kastamonu</option>
                                    <option value="38">Kayseri</option>
                                    <option value="39">Kırklareli</option>
                                    <option value="40">Kırşehir</option>
                                    <option value="41">Kocaeli</option>
                                    <option value="42">Konya</option>
                                    <option value="43">Kütahya</option>
                                    <option value="44">Malatya</option>
                                    <option value="45">Manisa</option>
                                    <option value="46">Kahramanmaraş</option>
                                    <option value="47">Mardin</option>
                                    <option value="48">Muğla</option>
                                    <option value="49">Muş</option>
                                    <option value="50">Nevşehir</option>
                                    <option value="51">Niğde</option>
                                    <option value="52">Ordu</option>
                                    <option value="53">Rize</option>
                                    <option value="54">Sakarya</option>
                                    <option value="55">Samsun</option>
                                    <option value="56">Siirt</option>
                                    <option value="57">Sinop</option>
                                    <option value="58">Sivas</option>
                                    <option value="59">Tekirdağ</option>
                                    <option value="60">Tokat</option>
                                    <option value="61">Trabzon</option>
                                    <option value="62">Tunceli</option>
                                    <option value="63">Şanlıurfa</option>
                                    <option value="64">Uşak</option>
                                    <option value="65">Van</option>
                                    <option value="66">Yozgat</option>
                                    <option value="67">Zonguldak</option>
                                    <option value="68">Aksaray</option>
                                    <option value="69">Bayburt</option>
                                    <option value="70">Karaman</option>
                                    <option value="71">Kırıkkale</option>
                                    <option value="72">Batman</option>
                                    <option value="73">Şırnak</option>
                                    <option value="74">Bartın</option>
                                    <option value="75">Ardahan</option>
                                    <option value="76">Iğdır</option>
                                    <option value="77">Yalova</option>
                                    <option value="78">Karabük</option>
                                    <option value="79">Kilis</option>
                                    <option value="80">Osmaniye</option>
                                    <option value="81">Düzce</option>
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

 
 