<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<h2 class="title text-center">İLETİŞİMDE KALIN</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="iletisim" action="php/mail.php" class="contact-form row" name="iletisim" onsubmit="return check_iletisim()" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="ad" class="form-control" required="required" placeholder="İsim">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="E-posta">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="konu" class="form-control" required="required" placeholder="Konu">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="mesaj" id="message" required="required" class="form-control" rows="8" placeholder="Mesajınız"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Kaydet">
				            </div>
				        </form>
	    			</div>
	    		</div>

	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

        <script type="text/javascript">
            function Kontrol(){
                Form=document.forms['giris'];

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
                else if(Form.elements['oz_gecmis'].value.length==0) alert("Lütfen öz geçmiş giriniz"); //textarea
                else Form.submit();
            }
        </script>
    </head>

    <body>

        <form name="giris">
            <div>Adınız <input type="text" name="ad" /></div>
            <div>Memleketiniz <select name="memleket">
            <option>Seçiniz</option><option>İstanbul</option><option>Mersin</option><option>Malatya</option></select></div>
            <div>Cinsiyet <input type="radio" name="cinsiyet" value="1" /> Erkek <input type="radio" name="cinsiyet" value="0" /> Kadın</div>
            <div>Hobi <input type="checkbox" name="hobi" /> Kitap <input type="checkbox" name="hobi" /> Gezi</div>
            <div>Öz Geçmiş <div><textarea name="oz_gecmis" rows="2" cols="30"></textarea></div></div>
            <div><input type="button" value="Tamam" onclick="Kontrol()"></div>

        </form>
    </body>

</html>