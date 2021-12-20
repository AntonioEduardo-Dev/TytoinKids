<?php include_once "client/views/includes/header.php";?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Descupe!</p>
						<h1>Manutenção</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- error section -->
	<div class="full-height-section error-section">
		<div class="full-height-tablecell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="error-text">
							<i class="far fa-sad-cry"></i>
							<h1>Oops! Manutenção.</h1>
							<p>A página solicitada encontra-se em manutenção.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end error section -->

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

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>