<?php include_once "client/views/includes/header.php";?>
	<style>
		.top-header-area {
			background-image: linear-gradient(to right, #402b65, #783171);
		}
		@media (max-width: 992px) {
			.top-header-area {
				background-color: #fff;
				background-image: linear-gradient(to right, #fff, #fff);
			}
		}
	</style>
	<section class="hero pt-150 pb-100">
		<div class="container pl-5 pr-4">
			<div class="row">
				<div class="col-lg-3 mb-3">
					<div class="hero__categories">
						<div class="list-group product-filter-button overflow-auto" id="list-tab" role="tablist" style="max-height: 350px;">
						</div>
						<div class="list-group mt-3">
							<select class="form-control" name="" id="id_personagem_select">
								<option value="vermelho" hidden selected>Personagens:</option>
							</select>
						</div>
						<div class="list-group mt-3">
							<select class="form-control" name="nm_tamanho_select" id="id_tamanho_select">
								<option hidden selected>Tamanho:</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="4">4</option>
								<option value="6">6</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<section class="cart-banner rounded">
						<div class="container pt-5 pb-5 pl-5 pr-5">
							<div class="row clearfix">
								<!--Image Column-->
								<div class="image-column col-lg-6">
									<div class="image">
										<div class="price-box">
											<div class="inner-price">
												<span class="price">
													<strong>30%</strong> <br> de desconto
												</span>
											</div>
										</div>
										<img src="client/views/assets/img/a.jpg" alt="">
									</div>
								</div>
								<!--Content Column-->
								<div class="content-column col-lg-6">
									<h3><span class="orange-text">Indicado</span> do mês</h3>
									<h4>Hikan Strwaberry</h4>
									<div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
									<!--Countdown Timer-->
									<div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<!-- products -->
		<div class="col-xl">
				<div class="">
					<div class="row">
						<div class="col ml-4 mr-4">
							<div class="input-group">
								<input type="text" value="" class="form-group shadow" placeholder="Digite aqui" id="btn_de_busca">
							</div>
						</div>
					</div>
					<div class="row mb-4 mt-2 pagination_div">
						<div class="col text-center">
							<div class="pagination-wrap col_pagination d-none">
								<ul>
									<li>
										<button class="btn btn-login anterior form-group" href="javascript:void(0)" id="anterior">
											<i class="fas fa-angle-left"></i>
										</button></li>
									<li>
										<button class="active btn btn-login numeracao form-group" disabled href="javascript:void(0)" id="numeracao">
											-
										</button>
									</li>
									<li>
										<button class="btn btn-login proximo form-group" href="javascript:void(0)" id="proximo">
											<i class="fas fa-angle-right"></i>
										</button>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row product-lists ml-2 mr-2" id="products-content-system">
					</div>
				</div>
		</div>
	</div>

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
	
<?php include_once "client/views/includes/footer.php";?>

<!-- listar produtos js -->
<script src="client/functions/read/shop.js"></script>	

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>
<!-- pagina js -->
 
<!-- paginação Produtos js -->
<script src="client/functions/read/pagination_search.js" defer></script>

<!-- script pesquisa e paginação js -->
<!-- <script src="client/functions/content/conteudoLoja.js"></script>	 -->
<!-- script pesquisa e paginação js -->