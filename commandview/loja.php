<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<base href="http://localhost/projetos/TytoinKids/" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Produtos</title>

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
	<div class="top-header-area top-header-area-cs" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="home">
								<img src="commandview/assets/img/logo_defined.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a class="cool-hover" href="sobre">Sobre</a></li>
								<li><a class="cool-hover" href="contato">Contato</a></li>
								<li><a class="cool-hover" href="loja">Produtos</a>
									<ul class="sub-menu">
										<li><a href="loja">Produtos</a></li>
										<li><a href="carrinho">Carrinho</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart cool-hover" href="carrinho"><i class="fas fa-shopping-cart"></i></a>
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
 

	<div class="content-page">
		<!-- carousel 
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block" src="https://cdn.pixabay.com/photo/2015/11/02/18/34/banner-1018816_960_720.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="https://cdn.pixabay.com/photo/2015/11/02/18/34/banner-1018816_960_720.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		 end carousel -->
		<!-- products -->
		<div class="product-section mt-90 mb-5">
			<div class="container">
				<!-- 
				<div class="row">
					<div class="col">
						<div class="product-filters">
						</div>
					</div>
				</div>
				-->
				<div class="row">
					<div class="col-xl-3 mt-3 mb-5">
						<div class="card">
							<h4 class="card-header">Filtros</h4>
							<div class="card-body">
								<div class="list-group" id="list-tab" role="tablist">
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Todos
										<span class="badge badge-primary-custom badge-pill">14</span>
									</a>
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Masculino
										<span class="badge badge-primary-custom badge-pill">7</span>
									</a>
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Feminino
										<span class="badge badge-primary-custom badge-pill">6</span>
									</a>
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Infantil
										<span class="badge badge-primary-custom badge-pill">1</span>
									</a>
								</div>
								<div class="list-group mt-3">
									<select class="form-control" name="" id="">
										<option value="vermelho" hidden selected>Cor:</option>
										<option value="vermelho">Vermelho</option>
										<option value="verde">Verde</option>
										<option value="azul">Azul</option>
										<option value="amarelo">Amarelo</option>
									</select>
								</div>
								<div class="list-group mt-3">
									<select class="form-control" name="" id="">
										<option value="1" hidden selected>Tamanho:</option>
										<!-- <option value="p">P</option> -->
										<!-- <option value="m">M</option> -->
										<!-- <option value="g">G</option> -->
										<!-- <option value="gg">GG</option> -->
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="4">4</option>
										<option value="6">6</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 mt-3">
						<div class="card">
							<h4 class="card-header">Nossos produtos</h4>
							<div class="card-body">
								<div class="row mt-3 mb-4">
									<div class="col-md-3">
										<input type="text" value="Pesquisar:" disabled>
									</div>
									<div class="col-md-9">
										<input type="text" value="" placeholder="Digite aqui">
									</div>
								</div>
								<div class="row product-lists">
								</div>
								<div class="row mb-5">
									<div class="col text-center">
										<div class="pagination-wrap">
											<ul>
												<li><a href="#">Anterior</a></li>
												<li><a class="active" href="#">1</a></li>
												<li><a href="#">Próximo</a></li>
											</ul>
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
	</div>
	<!-- footer -->
	<div class="footer-area footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Sobre nós</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Como nos encontrar</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@tkids.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box">
						<h2 class="widget-title">Serviços</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@tkids.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Páginas</h2>
						<ul>
							<li><a class="cool-hover" href="home">Início</a></li>
							<li><a class="cool-hover" href="sobre">Sobre</a></li>
							<li><a class="cool-hover" href="loja">Produtos</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	
	<div class="copyright footer-copyright-party-end">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a href="tytoin_kids_link_copyright">Tytoin</a>,  Todos os direitos reservados.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<!-- <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<!-- <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li> -->
							<!-- <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
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
	<!-- listar produtos js -->
	<script src="commandsfunction/read/shop.js"></script>
	<!-- main js -->
	<script src="commandview/assets/js/main.js"></script>

</body>
</html>