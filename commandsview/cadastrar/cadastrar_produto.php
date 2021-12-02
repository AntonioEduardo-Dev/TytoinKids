<?php include_once "commandsview/includes/header.php";?> 
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Os melhores produtos</p>
						<h1>Inserir Produto</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- link section -->
	<div class="row mt-5 ">
		<div class="col-md-2 offset-md-5">
			<a href="listar/produtos"><input type="submit" value="Listar"></a>
		</div>
	</div>
	<!-- end link section -->

	<!-- check out section -->
	<div class="checkout-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg ml-4 mr-4 mt-5 mb-5">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5>
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Cadastrar Produto
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="mt-4 ml-3 mr-3 mb-2">
										<div class="col pl">
											<div class="row">
												<div class="col-lg">
													<select name="nm_categ" id="id_categ">
														<option value="1" selected style="display: none;">Categoria do produto*</option>
														<option value="1">Infantil</option>
													</select>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-8">
													<input type="text" placeholder="Nome do produto*" id="id_nome" required>
												</div>
												<div class="col-lg-4">
													<input type="text" placeholder="Preço por unidade*" id="id_preco" required>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg">
													<input type="file" placeholder="Imagem do produto*" id="id_imageUpload" name="nm_imageUpload" accept=".png">
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-4">
													<div class="row mt-2">
														<div class="col-lg">
															<div class="col-lg mt-1">
																<h6 class="">Selecione os personagens:</h6>
															</div>
														</div>
													</div>
													<div class="col-lg">
														<select class="mt-3" name="nm_personagem" id="id_personagem">
															<option value="" selected style="display: none;">Personagem*</option>
															<option value="Peppa">Peppa</option>
														</select>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="row mt-2">
														<div class="col-lg">
															<div class="col-lg mt-1">
																<h6 class="">Selecione os tamanhos:</h6>
															</div>
														</div>
													</div>
													<div class="col">
														<div class="row">
															<div class="col mt-3 content-tamanhos">
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="row mt-2">
												<div class="col-lg">
													<div class="col-lg mt-1">
														<h6 class="">Itens com * são obrigatórios</h6>
													</div>
												</div>
											</div>	
											<div class="row mt-3">
												<div class="col-lg conteudo_alerta">
												</div>
											</div>										
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-4 offset-md-4">
											<input type="submit" name="cadastrar" value="Cadastrar" id="id_cad">
										</div>
									</div>
								</div>
						    </div>
						  </div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

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

<!-- inserir produtos js -->
<script src="commandsfunction/create/insertProduct.js"></script>

<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>

<!-- função Modal js -->
<script src="commandsfunction/content/conteudoAlerta.js"></script>