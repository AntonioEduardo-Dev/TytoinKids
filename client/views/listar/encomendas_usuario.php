<?php include_once "client/views/includes/header.php";?> 
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Minhas encomendas</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- content page -->
	<div class="table-section mt-5 mb-5">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h4>Encomendas</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col col-md-12"> 
							<div class="cart-table-wrap">
								<table class="cart-table" id="table_dinamic_js">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="order-cod"><h6>Cód</h6></th>
											<th class="order-name"><h6>Nome produto</h6></th>
											<th class="order-date"><h6>Data do pedido</h6></th>
											<th class="order-qtd"><h6>Quantidade</h6></th>
											<th class="order-status"><h6>Status</h6></th>
											<th class="order-view"><h6></h6></th>
										</tr>
									</thead>
									<tbody id="tbody_data">
									</tbody>
								</table>
								<input type="text" id="id_usuario" value="<?php echo ((isset($_SESSION["user"]) && $_SESSION["user"]["tipo_user"] != "convidado") ? $_SESSION["user"]["id"] : ""); ?>" disabled hidden>
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
				<div class="conteudo">
					
				</div>
			</div>
		</div>
	</div>
	<!-- End Large modal -->

<?php include_once "client/views/includes/footer.php";?>

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>

<!-- listar Encomendas js -->
<script src="client/functions/read/listar_encomendas.js"></script>