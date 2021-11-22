<?php include_once "commandsview/includes/header.php";?>

	<div class="container">
		<div class="row">
			<div class="col-sm-10 mx-auto mb-3">
				<div class="card border-1 shadow rounded-3 mt-4">
					<div class="card-body p-3 p-sm-5 container-custom">
						<h3 class="card-title text-center"><i class="fas fa-user-plus"></i></h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-floating">
									<label for="floatingInput">Email</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-floating">
									<label for="floatingPassword">Senha</label>
									<input type="password" id="floatingPassword" placeholder="Password" autocomplete="on">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Nome</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">CPF</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Data</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Whatsapp</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-floating">
									<label for="floatingInput">Endereço</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Bairro</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">CEP</label>
									<input type="email" id="floatingInput" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
						</div>
						<hr>
						<div class="text-center p-sm-2">
							<button class="btn btn-login text-uppercase fw-bold" type="submit">Cadastrar</button>
							<p class="mt-3">
								Já possui uma conta? <a href="login">Entrar</a>
								<br>Voltar ao <a href="home">Inicio</a>
							</p>
						</div>
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
	