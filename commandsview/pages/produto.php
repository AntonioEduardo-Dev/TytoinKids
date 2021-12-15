<?php
	if(empty($_GET['id'])){
		echo '<script>window.location="loja"</script>';
		exit;
	}
	if($_GET['id'] < 1 || $_GET['id'] == null || is_int($_GET['id'])){
		echo '<script>window.location="loja"</script>';
		exit;
	}
?>
<?php include_once "commandsview/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Detalhes do produto</p>
						<h1>Produto</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- Produto -->
	<div class="single-product mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mt-5 mb-5">
					<div class="single-product-img">
						<img id="imagem_produto" src="commandsview/assets/img/images/productind.jpg" alt="" style="height: 625px; width: 470px;">
					</div>
				</div>
				<div class="col-md-7 mt-5 mb-5">
					<div class="single-product-content">
						<input type="text" id="id_produto_inp" hidden>
						<h3 id="id_nome_produto"></h3>
						<p class="single-product-pricing"><span>P/Quantidade</span> R$ <a id="id_preco_produto"></a></p>
						<div class="single-product-form">
							<div class="row">
								<div class="col">
									Disponíveis: <a id="id_qtd_produto"></a>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 mt-1 mb-1">
									<select class="form-control mt-2" name="" placeholder="Ex: 1" id="id_tamanho_selecionado">
										<option value="1" hidden selected>Tamanho:</option>
									</select>
									<select class="form-control mt-2" name="" placeholder="Ex: 5" id="id_personagem_selecionado">
										<option value="" hidden selected>Personagem:</option>
									</select>
									<input class="form-control mt-2" type="text" placeholder="Quant. Ex: 5" id="id_qtd_produto_inp">
								</div>
							</div>
							<div class="form-group row">
								<div class="col mt-3">
									<a class="cart-btn addToCart"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
								</div>
							</div>
							<p><strong>Categoria: </strong><a id="id_categoria_produto"></a></p>
						</div>
						<h4>Compartilhe:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end Produto -->

	<!-- more products -->
	<div class="more-products mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Mais</span> Procurados</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto"><img src="commandsview/assets/img/images/productind.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>P/Quantidade</span> R$85 </p>
						<a href="carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto"><img src="commandsview/assets/img/images/productind.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>P/Quantidade</span> R$85 </p>
						<a href="carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto"><img src="commandsview/assets/img/images/productind.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>P/Quantidade</span> R$85 </p>
						<a href="carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

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

<!-- functions js -->

<!-- função Modal js -->
<script src="commandsfunction/content/conteudoModal.js"></script>
<!-- listar produtos js -->
<script src="commandsfunction/read/produto.js"></script>

<!-- end functions js -->