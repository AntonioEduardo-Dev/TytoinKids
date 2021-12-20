<?php include_once "client/views/includes/header.php";?>

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
							<button type="submit">Search <i class="fas fa-search"></i></button>
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
						<p>Os melhores produtos</p>
						<h1>Confira os produto</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Endereço de cobrança
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
									<div class="form-group row">
										<div class="col">
											<input type="text" placeholder="Nome*" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col">
											<input type="email" placeholder="Email">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
											<input type="cpf" placeholder="Cadastro de pessoa física*" required>
										</div>
										<div class="col-md-6">
											<input type="tel" placeholder="Telefone*" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-lg-12">
											<input type="text" placeholder="Endereço">
										</div>
										<div class="col-lg-12">
											<textarea name="speak" id="speak" cols="30" rows="3" placeholder="Dizer algo:"></textarea>
										</div>
									</div>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Endereço de entrega
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Seu formulário de endereço de entrega está aqui.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card bg-light single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Detalhes do cartão
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Os detalhes do seu cartão vão aqui.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Detalhes do seu pedido</th>
									<th>Preço</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Produto</td>
									<td>Total</td>
								</tr>
								<tr>
									<td>Strawberry</td>
									<td>$85.00</td>
								</tr>
								<tr>
									<td>Berry</td>
									<td>$70.00</td>
								</tr>
								<tr>
									<td>Lemon</td>
									<td>$35.00</td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>$190</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>$50</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>$240</td>
								</tr>
							</tbody>
						</table>
						<a href="#" class="boxed-btn">Encomendar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

<?php include_once "client/views/includes/footer.php";?>

 
