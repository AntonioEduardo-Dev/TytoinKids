<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Produtos</title>

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
	</div>
	<!-- end header -->
 
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Produtos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- link section -->
	<div class="row mt-5 ">
		<div class="col-md-2 offset-md-5">
			<a href="../cadastrar/cadastrar_produto"><input type="submit" value="Cadastrar"></a>
		</div>
	</div>
	<!-- end link section -->

	<!-- content page -->
	<div class="table-section mt-5 mb-5">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h4>Produtos</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col col-md-12"> 
							<div class="cart-table-wrap">
								<table class="cart-table" id="table_dinamic_js">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="product-image"><h6>Produto</h6></th>
											<th class="product-name"><h6>Nome</h6></th>
											<th class="product-price"><h6>Preço</h6></th>
											<th class="product-quantity"><h6>Quantidade</h6></th>
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
			<div class="conteudo_modal_lg">
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
	<!-- listar Produtos js -->
    <script src="../commandsfunction/read/scriptDataTableProdutos.js"></script>
	<!-- função Modal js -->
	<script src="../commandsfunction/content/conteudoModal.js"></script>
	<!-- editar/apagar Produtos js -->
    <script src="../commandsfunction/update_delete/produto.js"></script>
	<!-- main js -->
	<script src="../commandview/assets/js/main.js"></script>


</body>
</html>