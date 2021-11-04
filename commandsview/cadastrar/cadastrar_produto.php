<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Inserir Produto</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../commandsview/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../commandsview/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../commandsview/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../commandsview/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../commandsview/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../commandsview/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../commandsview/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../commandsview/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../commandsview/assets/css/responsive.css">

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
						<p>Os melhores produtos</p>
						<h1>Inserir Produto</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- link section -->
	<div class="row mt-5 ">
		<div class="col-md-2 offset-md-5">
			<a href="../listar/produtos"><input type="submit" value="Listar"></a>
		</div>
	</div>
	<!-- end link section -->

	<!-- check out section -->
	<div class="checkout-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg ml-4 mr-4 mt-5 mb-5">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5>
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Cadastrar Produto
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="mt-4 ml-3 mr-3 mb-2">
										<div class="col pl">
											<div class="row">
												<div class="col-lg">
													<select name="nm_categ" id="id_categ">
														<option value="1" selected style="display: none;">Categoria do produto*</option>
														<option value="1">Infantil</option>
													</select>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg">
													<input type="text" placeholder="Nome do produto*" id="id_nome" required>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-6">
													<input type="text" placeholder="Quantidade disponível*" id="id_qtd" required>
												</div>
												<div class="col-lg-6">
													<input type="text" placeholder="Preço por unidade*" id="id_preco" required>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg">
													<input type="file" placeholder="Imagem do produto*" id="id_imageUpload" name="nm_imageUpload" accept=".png">
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg-6">
													<div class="row mt-2">
														<div class="col-lg">
															<div class="col-lg mt-1">
																<h6 class="">Selecione as cores:</h6>
															</div>
														</div>
													</div>
													<div class="col mt-3">
														<div class="form-check row">
															<input class="form-check-input" type="checkbox" name="btn_nm_cores" value="vermelho" id="btn_id_check_cor_vermelho">
															<label class="form-check-label" for="flexSwitchCheckDefault">Vermelho</label>
														</div>
														<div class="form-check row">
															<input class="form-check-input" type="checkbox" name="btn_nm_cores" value="verde" id="btn_id_check_cor_verde">
															<label class="form-check-label" for="flexSwitchCheckDefault">Verde</label>
														</div>
														<div class="form-check row">
															<input class="form-check-input" type="checkbox" name="btn_nm_cores" value="azul" id="btn_id_check_cor_azul">
															<label class="form-check-label" for="flexSwitchCheckDefault">Azul</label>
														</div>
														<div class="form-check row">
															<input class="form-check-input" type="checkbox" name="btn_nm_cores" value="amarelo" id="btn_id_check_cor_amarelo">
															<label class="form-check-label" for="flexSwitchCheckDefault">Amarelo</label>
														</div>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="row mt-2">
														<div class="col-lg">
															<div class="col-lg mt-1">
																<h6 class="">Selecione os tamanhos:</h6>
															</div>
														</div>
													</div>
													<div class="col">
														<div class="row">
															<div class="col-xl-6 mt-3">
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="p" id="btn_id_check_tam_p">
																	<label class="form-check-label" for="flexSwitchCheckDefault">P</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="m" id="btn_id_check_tam_m">
																	<label class="form-check-label" for="flexSwitchCheckDefault">M</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="g" id="btn_id_check_tam_g">
																	<label class="form-check-label" for="flexSwitchCheckDefault">G</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="gg" id="btn_id_check_tam_gg">
																	<label class="form-check-label" for="flexSwitchCheckDefault">GG</label>
																</div>
															</div>
															<div class="col-xl-6 mt-3">
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="1" id="btn_id_check_tam_1">
																	<label class="form-check-label" for="flexSwitchCheckDefault">1</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="2" id="btn_id_check_tam_2">
																	<label class="form-check-label" for="flexSwitchCheckDefault">2</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="3" id="btn_id_check_tam_4">
																	<label class="form-check-label" for="flexSwitchCheckDefault">4</label>
																</div>
																<div class="form-check row">
																	<input class="form-check-input" type="checkbox" name="btn_nm_tamanho" value="4" id="btn_id_check_tam_6">
																	<label class="form-check-label" for="flexSwitchCheckDefault">6</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-lg">
													<div class="col-lg mt-1">
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
	<script src="../commandsview/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../commandsview/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../commandsview/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../commandsview/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../commandsview/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../commandsview/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../commandsview/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../commandsview/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../commandsview/assets/js/sticker.js"></script>
	<!-- pagina js -->
	<script src="../commandsfunction/content/conteudoPagina.js"></script>
	
	<!-- inserir produtos js -->
	<script src="../commandsfunction/create/insertProduct.js"></script>
	
	<!-- função Modal js -->
	<script src="../commandsfunction/content/conteudoAlerta.js"></script>

	<!-- função Modal js -->
	<script src="commandsfunction/content/conteudoModal.js"></script>
	
	<!-- main js -->
	<script src="../commandsview/assets/js/main.js"></script>

</body>
</html>