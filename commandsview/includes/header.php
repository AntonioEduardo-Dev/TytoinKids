<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<base href="http://localhost/projetos/TytoinKids/" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, nós somos a Tytoin kids, conheça nossos produtos, encomende algo que o agrade para sua filha ou filho.">

	<!-- title -->
	<title>Tytoin Kids</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="commandsview/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="commandsview/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="commandsview/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="commandsview/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="commandsview/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="commandsview/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="commandsview/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="commandsview/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="commandsview/assets/css/responsive.css">

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
							<a href="home">
								<img src="commandsview/assets/img/logo_defined.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a class="cool-hover" href="home">Inicio</a></li>
								<li><a class="cool-hover" href="sobre">Sobre</a></li>
								<li><a class="cool-hover" href="contato">Contato</a></li>
								<li><a class="cool-hover" href="loja">Produtos</a>
									<ul class="sub-menu">
										<li><a href="loja">Produtos</a></li>
										<li><a href="carrinho">Carrinho</a></li>
									</ul>
								</li>
								<?php if (isset($_SESSION["user"]) && $_SESSION["user"]["tipo_user"] === "admin") { ?>
									<li><a class="cool-hover" href="menu/menu">Menu</a>
										<ul class="sub-menu">
											<li><a href="menu/menu">Menu</a></li>
											<li><a href="menu/menu_status">Manutenção</a></li>
										</ul>
									</li>
								<?php } ?>
								<li>
									<div class="header-icons">
										<a class="shopping-cart cool-hover" href="carrinho"><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon cool-hover" href="login"><i class="fas fa-user"></i></a>
										<?php if (isset($_SESSION["user"]) && $_SESSION["user"]["tipo_user"] !== "convidado") { ?>
											<ul class="sub-menu">
												<li><a href="carrinho">Carrinho</a></li>
												<li><a href="menu/menu_usuario">Usuário</a></li>
											</ul>
										<?php } ?>
									</div>
								</li>
							</ul>
						</nav>
                        <a class="mobile-show search-bar-icon" href="login"><i class="fas fa-user"></i></a>
                        <div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->