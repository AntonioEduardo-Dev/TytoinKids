<?php include_once "client/views/includes/header.php";?>

	<!-- products -->
	<div class="full-height-section error-section">
		<div class="full-height-tablecell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="error-text">
							<i class="fas fa-frown"></i>
							<h1>Modo Manutenção</h1>
							<p>Atenção ativar este modo resutará na desativação temporária do sistema.</p>
							<div class="row">
								<div class="col-sm-6">
									<input type="submit" class="modal_system_open" name="btn_on" value="Ativar">
								</div>
								<div class="col-sm-6">
									<input type="submit" class="modal_system_open" name="btn_off" value="Desativar">
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
	
	<!-- Large modal -->
	<div class="modal fade modal_system_open_class" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="conteudo">
			</div>
		</div>
	</div>
	</div>
	<!-- End Large modal -->

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

<?php include_once "client/views/includes/footer.php";?>

	<style>
		.footer-copyright {
			display: none;
		}
		.footer-copyright-party-end {
			display: none;
		}
	</style>
	
	<!-- conteúdo modal js -->
	<script src="client/functions/content/conteudoManutencao.js"></script>
	<!-- alterar status js -->
	<script src="client/functions/update/statusManutencao.js"></script>
	<!-- função Modal js -->
	<script src="client/functions/content/conteudoModal.js"></script>