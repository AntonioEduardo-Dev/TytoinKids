<?php include_once "commandsview/includes/header.php";?>

	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card border-1 shadow rounded-3 mt-80">
					<div class="card-body p-3 p-sm-5 container-custom">
						<h3 class="card-title text-center mb-3"><i class="fas fa-user-plus"></i></h3>
						<form>
							<div class="form-floating mb-3">
								<label for="floatingInput">Email</label>
								<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
							</div>
							<div class="form-floating mb-3">
								<label for="floatingPassword">Senha</label>
								<input type="password" id="floatingPassword" placeholder="Password" autocomplete="on">
							</div>
							<hr>
							<div class="text-center p-sm-2">
								<button class="btn btn-login text-uppercase fw-bold" type="submit">Entrar</button>
								<p class="mt-3">
									Já possui uma conta? <a href="login">Entrar</a>
									<br>Voltar ao <a href="home">Inicio</a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once "commandsview/includes/footer.php";?>

<script>
  $("body").addClass("body-login");
  $(".top-header-area").hide();
  $(".footer-copyright").hide();
  $(".footer-copyright-party-end").hide();
</script>
	