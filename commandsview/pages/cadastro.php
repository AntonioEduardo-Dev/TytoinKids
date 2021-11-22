<?php include_once "commandsview/includes/header.php";?>

	<div class="container">
		<div class="row">
			<div class="col-sm-11 mx-auto mb-3">
				<div class="card border-1 shadow rounded-3 mt-4">
					<div class="card-body p-3 p-sm-5 container-custom">
						<h3 class="card-title text-center"><i class="fas fa-user-plus"></i></h3>
						<div class="row">
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Nome*</label>
									<input type="text" id="id_nome" placeholder="Seu nome" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">CPF*</label>
									<input type="text" id="id_cpf" placeholder="Ex: 000.000.000-00" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingInput">Email*</label>
									<input type="email" id="id_email" placeholder="email@exemplo.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-floating">
									<label for="floatingPassword">Senha*</label>
									<input type="password" id="id_senha" placeholder="Senha">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Telefone*</label>
									<input type="text" id="id_fone" placeholder="(00) 00000-0000">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Whatsapp*</label>
									<input type="text" id="id_whatsapp" placeholder="(00) 00000-0000">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Instagram</label>
									<input type="text" id="id_insta" placeholder="@TytoinKids">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">CEP*</label>
									<input type="text" id="id_cep" placeholder="00000-000" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Cidade*</label>
									<input type="text" id="id_cidade_fk" placeholder="Cidade" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Endereço*</label>
									<input type="text" id="id_endereco" placeholder="Endereço" autocomplete="on">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Bairro*</label>
									<input type="text" id="id_bairro" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Complemento</label>
									<input type="text" id="id_complemento" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating">
									<label for="floatingInput">Número*</label>
									<input type="text" id="id_numero" placeholder="name@example.com" autocomplete="on">
								</div>
							</div>
						</div>
						<hr>
						<div class="row mt-3">
							<div class="col-lg conteudo_alerta">
							</div>
						</div>	
						<div class="text-center p-sm-2">
							<button class="btn btn-login text-uppercase fw-bold" id="id_cad_user" type="submit">Cadastrar</button>
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

	<!-- Large modal -->
	<div class="modal fade modal_system_open_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="conteudo">
				</div>
			</div>
		</div>
	</div>
	<!-- End Large modal -->

<?php include_once "commandsview/includes/footer.php";?>

<script>
  $("body").addClass("body-login");
  $(".top-header-area").hide();
  $(".footer-copyright").hide();
  $(".footer-copyright-party-end").hide();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>

<!-- função Modal js -->
<script src="commandsfunction/content/conteudoAlerta.js"></script>

<!-- inserir Dúvida js -->
<script src="commandsfunction/create/insertUser.js"></script>