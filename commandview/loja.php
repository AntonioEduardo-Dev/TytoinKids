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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Os melhores produtos</p>
						<h1>Confira os produtos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
 

	<div class="content-page">
		<!-- products -->
		<div class="product-section mt-90 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 mt-3 mb-5">
						<div class="card">
							<h4 class="card-header">Filtros</h4>
							<div class="card-body">
								<div class="list-group product-filter-button" id="list-tab" role="tablist">
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" data-filter="*">
										<i class='fas fa-angle-right'></i>
										Todos
										<span class="badge badge-primary-custom badge-pill">14</span>
									</a>
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
										<i class='fas fa-angle-right'></i>
										Masculino
										<span class="badge badge-primary-custom badge-pill">7</span>
									</a>
									<!--
									<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="loja" role="tab" aria-controls="home">
										<i class='fas fa-angle-right'></i>
										Infantil
										<span class="badge badge-primary-custom badge-pill">1</span>
									</a>-->
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
								<div class="row mb-4">
									<div class="col-md-2">
										<input type="text" value="" placeholder="Min:">
									</div>
									<div class="col-md-2">
										<input type="text" value="" placeholder="Max:">
									</div>
									<div class="col-md-3">
										<input type="text" value="Pesquisar:" disabled>
									</div>
									<div class="col-md-5">
										<input type="text" value="" placeholder="Digite aqui">
									</div>
								</div>
								<div class="row product-lists">
								</div>
								<div class="row mb-5">
									<div class="col text-center">
										<!-- 
										<div class="pagination-wrap">
											<ul>
												<li><a href="#">Anterior</a></li>
												<li><a class="active" href="#">1</a></li>
												<li><a href="#">Próximo</a></li>
											</ul>
										</div>
									-->
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
	<!-- função Modal js -->
	<script src="commandsfunction/content/conteudoModal.js"></script>
	<!-- pagina js -->
	<script src="commandsfunction/content/conteudoPagina.js"></script>
	<!-- main js -->
	<script src="commandview/assets/js/main.js"></script>

</body>
</html>