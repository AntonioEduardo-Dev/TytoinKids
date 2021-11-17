<?php include_once "commandsview/includes/header.php";?>

	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card border-1 shadow rounded-3 mt-80">
					<div class="card-body p-3 p-sm-5 container-custom">
						<h3 class="card-title text-center mb-3"><i class="fas fa-user-check"></i></h3>
						<div class="form-floating mb-3">
							<label for="floatingInput">Email</label>
							<input type="email" id="floatingInputEmail" placeholder="name@example.com">
						</div>
						<div class="form-floating mb-3">
							<label for="floatingPassword">Senha</label>
							<input type="text" id="floatingInputPassword" placeholder="Password">
						</div>
						<div class="text-center p-sm-2">
							<button class="btn btn-login text-uppercase fw-bold btn_logar_now" type="submit">Entrar</button>
							<p class="mt-3">
								Não possui uma conta? <a href="cadastro">Cadastre-se</a>
								<br>Voltar ao <a href="home">Inicio</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Small modal -->
	<div class="modal fade modal_system_success_class" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content">
				<div class="conteudo_modal_sm">
				</div>
			</div>
		</div>
	</div>
	<!-- End Small modal -->

<?php include_once "commandsview/includes/footer.php";?>

<!-- login js -->
<script src="commandsfunction/read/logar-se.js"></script>
<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>

<script>
  $("body").addClass("body-login");
  $(".top-header-area").hide();
  $(".footer-copyright").hide();
  $(".footer-copyright-party-end").hide();
</script>