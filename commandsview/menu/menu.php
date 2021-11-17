<?php include_once "commandsview/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>MENU ADMINISTRADOR</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-5 mb-5">
		<div class="container">
			<div class="row menu-list">
				<div class="container mt-5 mb-5">
					<div class="row">
						<div class="col-lg-4 col-md-6 text-center">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_categoria"><img src="commandsview/assets/img/menu/image_menu.png" alt=""></a>
								</div>
								<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_categoria"><h3>Categorias</h3></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 text-center">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_produto"><img src="commandsview/assets/img/menu/image_menu.png" alt=""></a>
								</div>
								<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_produto"><h3>Produtos</h3></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_encomenda"><img src="commandsview/assets/img/menu/image_menu.png" alt=""></a>
								</div>
								<a href="#" onclick="return false;" class="modal_system_open" name="btn_nm_encomenda"><h3>Encomendas</h3></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end products -->

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

<!-- conteudo js -->
<script src="commandsfunction/content/conteudoMenu.js"></script>