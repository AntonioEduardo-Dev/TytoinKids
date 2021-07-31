<?php
	/*
	echo "Nome: ".$_SESSION["user"]["nome"]."</br>";
	echo "Status: ".$_SESSION["user"]["status"];
	*/
	if (!(isset($_SESSION["cart"]))):
		// echo '<script>alert("Carrinho vazio!!")</script>';
		// echo '<script>window.location="loja"</script>';
	else:
		// var_dump($_SESSION["cart"]);
		// unset($_SESSION["cart"][0]);
		// session_destroy();
    endif;
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
	<title>Carrinho</title>

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
											<th class="product-price">Preço</th>
											<th class="product-quantity">Quantidade</th>
											<th class="product-total">Total</th>
											<th class="product-remove"></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if (isset($_SESSION["cart"])):
											foreach ($_SESSION['cart'] as $key => $value) :
												$query = explode(',', $value);
												echo '<tr class="table-body-row">
															<td class="product-image"><img src="commandview/assets/img/images/'.$query[1].'" alt=""></td>
															<td class="product-name">'.$query[2].'</td>
															<td class="product-price">'.$query[3].'</td>
															<td class="product-quantity"><input type="number" placeholder="0" value="'.$query[4].'" disabled></td>
															<td class="product-total">'.$query[5].'</td>
															<td class="product-remove"><h5><a class="delete_item_cart" data-filter="'.$key.'"><i class="far fa-window-close mt-4"></i></a></h5><input type="text" hidden value="'.$key.'"></td>
														</tr>';
											endforeach;
										endif; ?>
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
						<div class="card bg-light">
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
											if (isset($_SESSION["cart"])):
												$total = 0;
												foreach ($_SESSION['cart'] as $key => $value) :
													$query = explode(',', $value);
													echo '<tr class="total-data">
																<td><strong>'.$query[2].': </strong></td>
																<td>$'.$query[3].'</td>
															</tr>';
													$total = $total + $query[3];
												endforeach;
												echo '	<tr class="total-data">
															<td><strong>Total: </strong></td>
															<td>$'.number_format($total, 2).'</td>
														</tr>';
											endif;
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
	<!-- conteudo modal js -->
	<script src="commandsfunction/content/conteudoCart.js"></script>
	<!-- inserir produtos js -->
	<script src="commandsfunction/create/insertOrder.js"></script>
	<!-- função Modal js -->
	<script src="commandsfunction/content/conteudoModal.js"></script>
	<!-- main js -->
	<script src="commandview/assets/js/main.js"></script>

</body>
</html>