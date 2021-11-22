<?php include_once "commandsview/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Produtos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- link section -->
	<div class="row mt-5 ">
		<div class="col-md-2 offset-md-5">
			<a href="cadastrar/cadastrar_produto"><input type="submit" value="Cadastrar"></a>
		</div>
	</div>
	<!-- end link section -->

	<!-- content page -->
	<div class="table-section mt-5 mb-5">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h4>Produtos</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col col-md-12"> 
							<div class="cart-table-wrap">
								<table class="cart-table" id="table_dinamic_js">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="product-image"><h6>Produto</h6></th>
											<th class="product-name"><h6>Nome do produto</h6></th>
											<th class="product-price"><h6>Preço</h6></th>
											<th class="product-quantity"><h6>Quantidade Disponível</h6></th>
											<th class="product-remove"><h6></h6></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end content page -->

	<!-- Large modal -->
	<div class="modal fade modal_system_open_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="conteudo_modal_lg">
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
	
	<!-- Large modal -->
	<div class="modal fade modal_system_delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="conteudo_delete">
					<div class="card">
						<div class="card-header">
							<div class="form-group row mt-3">
								<div class="col mr-3">
									<h4><a><i class="fas fa-window-close close-btn float-right" data-dismiss="modal"></i></a></h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row mt-2 ml-3 mr-3">`;
								<div class="col text-center">
									<h4>Voçê tem certeza da sua escolha?</h4>
									<div class="form-group row">
										<div class="col">
											<button class="btn btn-login text-uppercase fw-bold" id="id_opc_delete" type="submit">
												Confirmar
											</button>
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
	<!-- End Large modal -->

<?php include_once "commandsview/includes/footer.php";?>

<!-- scripts table -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<!-- end scripts table -->

<!-- end css table -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<!-- end css table -->

<!-- listar Produtos js -->
<script src="commandsfunction/read/scriptDataTableProdutos.js"></script>
<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>
<!-- editar/apagar Produtos js -->
<script src="commandsfunction/update_delete/produto.js"></script>