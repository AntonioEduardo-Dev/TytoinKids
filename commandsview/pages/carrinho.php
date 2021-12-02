<?php include_once "commandsview/includes/header.php";?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Visualize suas escolhas</p>
						<h1>Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-5 mb-5">
		<div class="container cart-class">
			<div class="row">
				<div class="col-lg-8 col-md-12 mt-5 mb-5">
					
					<div class="card bg-light">
						<div class="card-body">
							<h5 class="card-title">Carrinho</h5>
							<div class="cart-table-wrap">
								<table class="cart-table">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="product-image">Produto</th>
											<th class="product-name">Nome</th>
											<th class="product-price">Preço por unidade</th>
											<th class="product-quantity">Quantidade</th>
											<th class="product-total">personagem</th>
											<th class="product-total">Tamanho</th>
											<th class="product-remove"></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if (isset($_SESSION["cart"])){
											foreach ($_SESSION['cart'] as $key => $value) {
												echo '<tr class="table-body-row">
															<td class="product-image"><img src="commandsview/assets/img/images/'.$value["imgProduto"].'" alt=""></td>
															<td class="product-name">'.$value["nomeProduto"].'</td>
															<td class="product-price">'.$value["preco_produto"].'</td>
															<td class="product-quantity"><input type="number" placeholder="0" value="'.$value["qtd_produto"].'" disabled></td>
															<td class="product-personagem">'.$value["personagem"].'</td>
															<td class="product-tamanho">'.$value["tamanho"].'</td>
															<td class="product-remove"><h5><a class="delete_item_cart" data-filter="'.$key.'"><i class="far fa-window-close mt-4"></i></a></h5><input type="text" hidden value="'.$key.'"></td>
														</tr>';
											};
										}else{
											echo '<tr class="table-body-row">
														<td colspan="7">Carrinho Vazio!</td>
													</tr>';
										}; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 mt-5 mb-5">
					<div class="total-section">
						<div class="card bg-light">
							<div class="card-body">
								<h6 class="card-title">Adicionar Cupom</h6>
								<p class="card-text">
									<input type="text" class="btn_nm_cupom" name="Cupom" placeholder="Cupom" required>
								</p>
							</div>
						</div>
						<div class="card bg-light mt-4">
							<div class="card-body text-center">
								<table class="total-table">
									<thead class="total-table-head">
										<tr class="table-total-row">
											<th>Produto</th>
											<th>Preço</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											if (isset($_SESSION["cart"])){
												$total = 0;
												foreach ($_SESSION['cart'] as $key => $value) {
													echo '<tr class="total-data">
																<td><strong>'.$value["nomeProduto"].' : </strong></td>
																<td>R$ '.$value["preco_produto"].'</td>
															</tr>';
													$total = $total + $value["preco_produto"];
												};
												echo '	<tr class="total-data">
															<td><strong>Total : </strong></td>
															<td>R$ '.number_format($total, 2).'</td>
														</tr>';
											}else{
												echo '<tr class="table-body-row">
															<td colspan="2">Carrinho Vazio!</td>
														</tr>';
											};
										?>
									</tbody>
								</table>
								<div class="cart-buttons">
									<a class="boxed-btn black add_item_cart">Encomendar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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

<!-- conteudo modal js -->
<script src="commandsfunction/content/conteudoCart.js"></script>
<!-- inserir produtos js -->
<script src="commandsfunction/create/insertOrder.js"></script>
<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>