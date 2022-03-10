<?php include_once "client/views/includes/header.php";?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Suporte 24/5</p>
						<h1>Contate-nos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mt-5 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Você tem alguma sugestão?</h2>
						<p>Se possuir alguma sugestão ou pedido personalizado nos informe, e entraremos em contato!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<div class="row mt-3">
							<div class="col">
								<input type="text" placeholder="Nome*" name="name" id="id_name" required>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-6">
								<input type="email" placeholder="Email*" name="Email" id="id_email" required>
							</div>
							<div class="col-sm-6">
								<input type="tel" placeholder="WhatsApp*" name="WhatsApp" id="id_phone" required>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col">
								<textarea name="message" id="id_message" rows="1" placeholder="Mensagem*" maxlength="255"></textarea>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-lg conteudo_alerta">
							</div>
						</div>	
						<div class="row mt-3">
							<div class="col-sm-3">
								<button class="btn btn-login text-uppercase fw-bold" id="id_cad_duvida" type="submit" value="Enviar">Enviar</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mt-5 mb-5">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Endereço da loja</h4>
						<p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Horário de funcionamento</h4>
						<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contato</h4>
						<p>Phone: +00 111 222 3333 <br> Email: support@tkids.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Encontre nossa localização</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->
	
<?php include_once "client/views/includes/footer.php";?>

<!-- função Modal js -->
<script src="client/functions/content/conteudoModal.js"></script>

<!-- função Modal js -->
<script src="client/functions/content/conteudoAlerta.js"></script>

<!-- inserir Dúvida js -->
<script src="client/functions/create/insertDoubt.js"></script>