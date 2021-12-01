<?php include_once "commandsview/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Os melhores vestidos</p>
						<h1>Confira nosso estoque</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
 

	<div class="content-page">
		<!-- products -->
		<div class="product-section mt-90 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 mt-3 mb-5">
						<div class="card">
							<h4 class="card-header">Filtros</h4>
							<div class="card-body">
								<div class="list-group product-filter-button" id="list-tab" role="tablist">
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" data-filter="*">
										<i class='fas fa-angle-right'></i>
										Todos
										<span class="badge badge-primary-custom badge-pill">14</span>
									</a>
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
										<i class='fas fa-angle-right'></i>
										Masculino
										<span class="badge badge-primary-custom badge-pill">7</span>
									</a>
									<!--
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Infantil
										<span class="badge badge-primary-custom badge-pill">1</span>
									</a>-->
								</div>
								<div class="list-group mt-3">
									<select class="form-control" name="" id="">
										<option value="vermelho" hidden selected>Personagens:</option>
										<option value="vermelho">Vermelho</option>
										<option value="verde">Verde</option>
										<option value="azul">Azul</option>
										<option value="amarelo">Amarelo</option>
									</select>
								</div>
								<div class="list-group mt-3">
									<select class="form-control" name="" id="">
										<option hidden selected>Tamanho:</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="4">4</option>
										<option value="6">6</option>
										<option value="8">8</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 mt-3">
						<div class="card">
							<h4 class="card-header">Nossos produtos</h4>
							<div class="card-body">
								<div class="row mb-4">
									<div class="col-md-2">
										<input type="text" value="" placeholder="Min:">
									</div>
									<div class="col-md-2">
										<input type="text" value="" placeholder="Max:">
									</div>
									<div class="col-md-3">
										<input type="text" value="Pesquisar:" disabled>
									</div>
									<div class="col-md-5">
										<input type="text" value="" placeholder="Digite aqui">
									</div>
								</div>
								<div class="row product-lists">
								</div>
								<div class="row mb-5">
									<div class="col text-center">
										<!-- 
										<div class="pagination-wrap">
											<ul>
												<li><a href="#">Anterior</a></li>
												<li><a class="active" href="#">1</a></li>
												<li><a href="#">Próximo</a></li>
											</ul>
										</div>
									-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

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

<!-- listar produtos js -->
<script src="commandsfunction/read/shop.js"></script>	
<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>
<!-- pagina js -->
 