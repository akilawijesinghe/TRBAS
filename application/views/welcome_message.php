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
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('user_role'); ?>">Dashboard</a></li>

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
				<?php foreach ($billboards as $billboard) { ?>
					<div class="col-lg-4 col-sm-6 mb-4 billboard_c">
						<div class="billboard-item">
							<div class="billboard-caption">
								<a class="billboard-link" data-bs-toggle="modal" href="#billboardModal1">
									<div class="billboard-caption-heading"><?php echo $billboard['location']; ?></div>
									<div class="billboard-caption-subheading text-muted">Size : <?php echo $billboard['size']; ?></div>
									<div class="billboard-caption-subheading text-muted">Type : <?php echo $billboard['type']; ?></div>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/website.js"></script>
	<!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
</body>

</html>