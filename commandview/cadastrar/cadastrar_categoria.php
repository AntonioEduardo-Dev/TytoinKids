<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive - Tytoin_kids">

	<!-- title -->
	<title>Inserir Categoria</title>

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
			<a href="../listar/categorias"><input type="submit" value="Listar"></a>
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
						  <div class="card single-accordion">
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
	
	<!-- jquery -->
	<script src="../commandview/assets/js/jquery-1.11.3.min.js"></script>
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
	<!-- pagina js -->
	<script src="../commandsfunction/content/conteudoPagina.js"></script>
	
	<!-- inserir Categorias js -->
	<script src="../commandsfunction/create/insertCategorie.js"></script>

	<!-- funcao Modal js -->
	<script src="../commandsfunction/content/conteudoAlerta.js"></script>
	
	<!-- main js -->
	<script src="../commandview/assets/js/main.js"></script>

</body>
</html>