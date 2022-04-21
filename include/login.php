	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Giriş yapın</h2>
						<form action="index.php?task=login_check" name="giris" onsubmit="return check_login()" method="post">
							<input type="email" name="email" placeholder="E-posta adresi" />
							<input type="password" name="parola" placeholder="Şifre" />
							<span>
								<input type="checkbox" class="checkbox" name="hatirla"> 
								Beni hatırla
							</span>
							<button type="submit" class="btn btn-default">Giriş</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
