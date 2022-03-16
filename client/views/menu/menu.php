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

	<!-- products -->
	<div class="product-section">
		<div class="container-fluid">
			<div class="row">
				<nav class="col-md-2 d-none d-md-block bg-light sidebar pt-100 pb-5">
					<div class="sidebar-sticky pt-5 pb-3">
						<ul class="nav flex-column table-responsive ul_itens_menu">
							<li class="nav-item teste">
									<h4>John's Blog</h4>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
								Orders
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
								Products
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
								Customers
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
								Reports
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
								Integrations
								</a>
							</li>
						</ul>
					</div>
				</nav>

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-100 px-4">
					<div class="row menu-list pl-5 pr-5">
						<div class="container mt-5 mb-5 content-menu-custom">
						</div>
					</div>
				</main>
			</div>
    	</div>
	</div>
	<!-- end products -->

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

<?php include_once "client/views/includes/footer.php";?>

<!-- conteudo js -->
<script src="client/functions/content/conteudoMenu.js"></script>