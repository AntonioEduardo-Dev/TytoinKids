<?php include_once "client/views/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>MENU</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- options -->
	<div class="product-section mt-5 mb-5">
		<div class="container">
			<div class="row menu-list">
				<div class="row mt-5 mb-5">
					<div class="col-lg-4 col-md-6 text-center">
						<div class="">
							<div class="product-image">
								<a href="listar/encomendas_usuario"><img src="client/views/assets/img/menu/image_menu_encomenda.png" alt="" style="width: 300px; height: 300px;"></a>
							</div>
                            <a href="listar/encomendas_usuario" name=""><h4>Encomendas</h4></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="">
							<div class="product-image">
								<a href="#" onclick="return false;"><img src="client/views/assets/img/menu/image_menu_encomenda.png" alt="" style="width: 300px; height: 300px;"></a>
							</div>
                            <a href="#" name=""><h4>""</h4></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="">
							<div class="product-image">
								<a href="sair"><img src="client/views/assets/img/menu/image_menu_encomenda.png" alt="" style="width: 300px; height: 300px;"></a>
							</div>
                            <a href="sair" name=""><h4>Sair</h4></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end options -->

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

<?php include_once "client/views/includes/footer.php";?>