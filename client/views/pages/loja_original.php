<?php include_once "client/views/includes/header.php";?>
	
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
			<div class="ml-5 mr-5">
				<div class="row">
					<div class="col-xl-3 mb-5">
						<div class="ml-3 mr-3">
							<div class="list-group product-filter-button" id="list-tab" role="tablist">
							</div>
							<div class="list-group mt-3">
								<select class="form-control" name="" id="id_personagem_select">
									<option value="vermelho" hidden selected>Personagens:</option>
								</select>
							</div>
							<div class="list-group mt-3">
								<select class="form-control" name="nm_tamanho_select" id="id_tamanho_select">
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
					<div class="col-xl-9">
						<div class="card">
							<h4 class="card-header">Nossos produtos</h4>
							<div class="card-body">
								<div class="row">
									<div class="col ml-4 mr-4">
										<div class="input-group">
											<input type="text" value="" class="form-control" placeholder="Digite aqui" id="btn_de_busca">
											<div class="input-group-append">
												<span class="input-group-text">
													<i class="fas fa-search"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-4 mt-3">
									<div class="col text-center">
										<div class="pagination-wrap col_pagination d-none">
											<ul>
												<li><button class="btn btn-login anterior" href="javascript:void(0)" id="anterior">Anterior</button></li>
												<li><button class="active btn btn-login numeracao" disabled href="javascript:void(0)" id="numeracao">-</button></li>
												<li><button class="btn btn-login proximo" href="javascript:void(0)" id="proximo">Próximo</button></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row product-lists ml-4 mr-4" id="products-content-system">
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
	
<?php include_once "client/views/includes/footer.php";?>

<!-- listar produtos js -->
<script src="client/functions/read/shop.js"></script>	

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>
<!-- pagina js -->
 
<!-- paginação Produtos js -->
<script src="client/functions/read/pagination_search.js" defer></script>

<!-- script pesquisa e paginação js -->
<!-- <script src="client/functions/content/conteudoLoja.js"></script>	 -->
<!-- script pesquisa e paginação js -->