<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Encomendas</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../commandview/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../commandview/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../commandview/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../commandview/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../commandview/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../commandview/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../commandview/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../commandview/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../commandview/assets/css/responsive.css">

	<!-- jquery -->
	<script src="../commandview/assets/js/jquery-1.11.3.min.js"></script>

	<!-- scripts table -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <!-- end scripts table -->
	
    <!-- end css table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- end css table -->
	
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="../index">
								<img src="../commandview/assets/img/logo_defined.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						
						<nav class="main-menu">
							<ul>
								<li><a class="cool-hover" href="../sobre">Sobre</a></li>
								<li><a class="cool-hover" href="../contato">Contato</a></li>
								<li><a class="cool-hover" href="../loja">Produtos</a>
									<ul class="sub-menu">
										<li><a href="../loja">Produtos</a></li>
										<li><a href="../carrinho">Carrinho</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart cool-hover" href="../carrinho"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon cool-hover" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Pesquisar:</h3>
							<input type="text" placeholder="Digite aqui">
							<button type="submit">Pesquisar <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Encomendas</h1>
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
											<th class="product-image"><h6>Id</h6></th>
											<th class="product-name"><h6>Quantidade</h6></th>
											<th class="product-price"><h6>Data da encomenda</h6></th>
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
			<div class="conteudo">
				
			</div>
		</div>
	</div>
	</div>
	<!-- End Large modal -->

	<!-- Small modal -->
	<div class="modal fade modal_system_success_class" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
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
	
	<!-- bootstrap -->
	<script src="../commandview/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../commandview/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../commandview/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../commandview/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../commandview/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../commandview/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../commandview/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../commandview/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../commandview/assets/js/main.js"></script>
	
	<!-- pagina js -->
	<script src="../commandsfunction/content/conteudoPagina.js"></script>

	<!-- listar Encomendas js -->
    <script src="../commandsfunction/read/scriptDataTableEncomendas.js"></script>

	<!-- modal listar Encomendas js -->
	<script src="../commandsfunction/read/listarEncomenda.js"></script>


</body>
</html>