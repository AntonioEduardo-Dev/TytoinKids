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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<base href="http://localhost/projetos/TytoinKids/" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Produto</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="commandview/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="commandview/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="commandview/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="commandview/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="commandview/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="commandview/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="commandview/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="commandview/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="commandview/assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
	</div>
	<!-- end header -->
 
	
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
						<img id="imagem_produto" src="commandview/assets/img/images/productind.jpg" alt="">
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
									Disponiveis: <a id="id_qtd_produto"> </a>
								</div>
							</div>
							<div class="row">
								<div class="col mt-1">
									<input type="number" placeholder="Ex: 5" id="id_qtd_produto_inp">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
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
							<a href="produto"><img src="commandview/assets/img/images/productind.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>P/Quantidade</span> R$85 </p>
						<a href="carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto"><img src="commandview/assets/img/images/productind.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>P/Quantidade</span> R$85 </p>
						<a href="carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto"><img src="commandview/assets/img/images/productind.jpg" alt=""></a>
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

	<!-- footer -->
	<div class="footer-area footer-copyright">
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	
	<div class="copyright footer-copyright-party-end">
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="commandview/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="commandview/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="commandview/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="commandview/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="commandview/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="commandview/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="commandview/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="commandview/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="commandview/assets/js/sticker.js"></script>
	<!-- pagina js -->
	<script src="commandsfunction/content/conteudoPagina.js"></script>
	<!-- listar produtos js -->
	<script src="commandsfunction/read/produto.js"></script>
	<!-- função Modal js -->
	<script src="commandsfunction/content/conteudoModal.js"></script>
	<!-- main js -->
	<script src="commandview/assets/js/main.js"></script>

</body>
</html>