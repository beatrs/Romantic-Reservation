<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Romantic Reservation</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
					aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="reservation.php">Reservation</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> -->
						<li class="nav-item active"><a class="nav-link" href="about.php">About</a></li>
						<?php if (!empty($_SESSION['user'])) {?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown">
								<?php $details = $_SESSION['user']; echo $details['first_name'] ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="my_acc.php">My Account</a>
								<a class="dropdown-item" href="php/logout.php">Logout</a>
							</div>
						</li>
						<?php } else{
						echo "<li class='nav-item'><a class='nav-link' href='register.php'>Register</a></li>";
						echo "<li class='nav-item'><a class='nav-link' href='my_acc.php'>My Account</a></li>";
							echo isset($_SESSION['login']);
							} ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>About</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->


	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Romantic Restaurant</span></h1>
						<h4>Little Story</h4>
						<p>Romantic Baboy opened its doors to the public last January 19, 2018, with its first branch at
							Tomas Morato. They’re one of the first Korean barbecue restaurants to offer unlimited pork
							and beef with cheese. This restaurant is different from other Korean BBQ, “We adopted an
							authentic modern-style Korean barbecue place with our own meat cuts and recipes. We wanted a
							place that will appeal to Filipino customers so we named it ‘Romantic Baboy’ instead of the
							usual Korean restaurant names.” In just a few weeks after opening, Romantic Baboy became
							very famous because of their unlimited pork and beef with cheese for only 499 pesos. Not
							only that, they also offer a no-time-limit-policy!</p>

						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Many options to choose from!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".drinks">Drinks</button>
							<button data-filter=".lunch">BBQ</button>
							<button data-filter=".dinner">Others</button>
						</div>
					</div>
				</div>
			</div>

			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-01.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Fresh Fruit Smoothies</h4>
							<p>drink made from pureed raw fruit</p>
							<h5> ₱120.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-02.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Soju</h4>
							<p>cold lemon tea sweetened with sugar, syrup and/or apple slices</p>
							<h5> ₱250.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="images/img-03.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Iced Tea</h4>
							<p>cold lemon tea sweetened with sugar, syrup and/or apple slices</p>
							<h5> ₱80.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-04.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Woo Samgyup</h4>
							<p>thin slice of beef brisket</p>
							<h5> ₱330.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-05.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Spicy Beef / Curry Beef</h4>
							<p>thin sliced beef dipped in curry or spicy sauce</p>
							<h5> ₱340.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="images/img-06.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Romantic Bulgogi</h4>
							<p>sweet marinated korean-style beef</p>
							<h5> ₱340.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-07.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Kimchi</h4>
							<p>spicy fermented cabbage dish</p>
							<h5> ₱120.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-08.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Fish Cakes</h4>
							<p>made of ground white fish, potato starch, sugar and vegetables</p>
							<h5> ₱150.00</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="images/img-09.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Romantic Cheese</h4>
							<p>melted cheese for dipping kbbq</p>
							<h5> ₱120.00</h5>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Menu -->

	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+02 8374 7948
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							romanticbaboy@gmail.ph
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							Double Dragon Plaza, Pasay, Metro Manila
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Romantic Baboy is a restaurant chain in Metro Manila that serves unlimited Korean BBQ since 2019.
						Their main menu includes ready-to-grill meats and assorted side dishes!</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday - Sunday : </span>OPEN</p>
					<p><span class="text-color">Hours :</span> 11:00 AM - 2:00 AM</p>

				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ground Level, Double Dragon Plaza, Pasay, Metro Manila</p>
					<p class="lead"><a href="contact.php">(02) 8374 7948</a></p>
					<p><a href="contact.php"> romanticbaboy@gmail.ph</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>SOCIALS</h3>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="https://web.facebook.com/RomanticBaboy/?_rdc=1&_rdr"><i
									class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a
								href="https://web.facebook.com/RomanticBaboy/?_rdc=1&_rdr">Romantic Baboy Restaurant</a>
						</p>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>