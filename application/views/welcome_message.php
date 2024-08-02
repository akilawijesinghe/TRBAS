<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Advanced BillBoard</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/kaiadmin/favicon.ico" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/website_styles.css" rel="stylesheet" />
</head>

<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="main_nav">
		<div class="container">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#responsive_nav" aria-controls="responsive_nav" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars ms-1"></i>
			</button>
			<div class="collapse navbar-collapse" id="responsive_nav">
				<ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
					<li class="nav-item"><a class="nav-link" href="#billboard">billboard</a></li>
					<?php

					if ($this->session->userdata('user_id')) {
					?>
						<li class="nav-item"><a class="nav-link" href="#profile">Profile</a></li>

						<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>

					<?php
					} else {
					?>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/login">Login</a></li>
					<?php
					}

					?>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Masthead-->
	<header class="masthead" style="background-image: url('<?php echo base_url(); ?>assets/img/banner.jpg')">
		<div class="container">
			<div class="masthead-heading">Smart Billboard Management System</div>
			<div class="masthead-subheading text-uppercase">Optimize Ad Displays Based on Real-Time Traffic Conditions for Enhanced Efficiency and Safety</div>
		</div>
	</header>

	<!-- Billbo Grid-->
	<section class="page-section bg-light" id="billboard">
		<div class="container">
			<div class="text-center">
				<h2 class="section-heading text-uppercase">Billboards</h2>
				<h3 class="section-subheading text-muted">Range of billboards</h3>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-6 mb-4">
					<!-- billboard item 1-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal1">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/1.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Threads</div>
							<div class="billboard-caption-subheading text-muted">Illustration</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4">
					<!-- billboard item 2-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal2">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/2.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Explore</div>
							<div class="billboard-caption-subheading text-muted">Graphic Design</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4">
					<!-- billboard item 3-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal3">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/3.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Finish</div>
							<div class="billboard-caption-subheading text-muted">Identity</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
					<!-- billboard item 4-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal4">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/4.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Lines</div>
							<div class="billboard-caption-subheading text-muted">Branding</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
					<!-- billboard item 5-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal5">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/5.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Southwest</div>
							<div class="billboard-caption-subheading text-muted">Website Design</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<!-- billboard item 6-->
					<div class="billboard-item">
						<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal6">
							<div class="billboard-hover">
								<div class="billboard-hover-content"><i class="fas fa-plus fa-3x"></i></div>
							</div>
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/billboard/6.jpg" alt="..." />
						</a>
						<div class="billboard-caption">
							<div class="billboard-caption-heading">Window</div>
							<div class="billboard-caption-subheading text-muted">Photography</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Team-->

	<!-- Footer-->
	<footer class="footer py-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
				<div class="col-lg-4 my-3 my-lg-0">
					<a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
					<a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
					<a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<div class="col-lg-4 text-lg-end">
					<a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
					<a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- billboard Modals-->
	<!-- billboard item 1 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/1.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Threads
									</li>
									<li>
										<strong>Category:</strong>
										Illustration
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- billboard item 2 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/2.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Explore
									</li>
									<li>
										<strong>Category:</strong>
										Graphic Design
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- billboard item 3 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal3" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/3.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Finish
									</li>
									<li>
										<strong>Category:</strong>
										Identity
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- billboard item 4 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal4" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/4.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Lines
									</li>
									<li>
										<strong>Category:</strong>
										Branding
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- billboard item 5 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal5" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/5.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Southwest
									</li>
									<li>
										<strong>Category:</strong>
										Website Design
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- billboard item 6 modal popup-->
	<div class="billboard-modal modal fade" id="billboardModal6" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-bs-dismiss="modal"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg" alt="Close modal" /></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="modal-body">
								<!-- Project details-->
								<h2 class="text-uppercase">Project Name</h2>
								<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<img class="img-fluid d-block mx-auto" src="<?php echo base_url(); ?>assets/img/billboard/6.jpg" alt="..." />
								<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
								<ul class="list-inline">
									<li>
										<strong>Client:</strong>
										Window
									</li>
									<li>
										<strong>Category:</strong>
										Photography
									</li>
								</ul>
								<button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
									<i class="fas fa-xmark me-1"></i>
									Close Project
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/website.js"></script>
	<!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
</body>

</html>