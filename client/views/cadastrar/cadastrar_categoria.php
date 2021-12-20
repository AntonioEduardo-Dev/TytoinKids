<?php include_once "client/views/includes/header.php";?> 

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Os melhores Categorias</p>
						<h1>Inserir Categoria</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- link section -->
	<div class="row mt-5 ">
		<div class="col-md-2 offset-md-5">
			<a href="listar/categorias"><input type="submit" value="Listar"></a>
		</div>
	</div>
	<!-- end link section -->

	<!-- check out section -->
	<div class="checkout-section mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg ml-4 mr-4 mt-5 mb-5">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5>
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Cadastrar Categoria
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="mt-2 ml-3 mr-3 mb-2">
										<div class="col">
											<div class="row">
												<div class="col-lg">
													<input type="text" placeholder="Nome da Categoria*" id="id_nome" required>
													
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg">
													<div class="col-lg mt-2">
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

<?php include_once "client/views/includes/footer.php";?>

<!-- inserir Categorias js -->
<script src="client/functions/create/insertCategorie.js"></script>

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>

<!-- função Modal js -->
<script src="client/functions/content/conteudoAlerta.js"></script>
	