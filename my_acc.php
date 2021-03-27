<?php
    session_start();
	include 'php/config.php';
	include 'php/update.php';
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
	<!-- Pickadate CSS -->
	<link rel="stylesheet" href="css/classic.css">
	<link rel="stylesheet" href="css/classic.date.css">
	<link rel="stylesheet" href="css/classic.time.css">
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
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<?php if (!empty($_SESSION['user'])) {?>
						<li class="nav-item dropdown">
							<a class="nav-link active dropdown-toggle" id="dropdown-a" data-toggle="dropdown">
								<?php $details = $_SESSION['user']; echo $details['first_name'] ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="my_acc.php">My Account</a>
								<a class="dropdown-item" href="php/logout.php">Logout</a>
							</div>
						</li>
						<?php } else{
						echo "<li class='nav-item'><a class='nav-link' href='register.php'>Register</a></li>";
						echo "<li class='nav-item active'><a class='nav-link' href='my_acc.php'>My Account</a></li>";
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
					<h1>My Account</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	<?php if(empty($_SESSION['user'])){ ?>
	<div class='form-container'>
		<div class='msg'>
			<?php
                include 'php/login.php';
            ?>
		</div>
		<!-- Start Login Form -->
		<form method="post" action="" id="form-info">
			<fieldset>
				<legend>Login</legend>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" required>
				</div>
				<input type="checkbox" name="remember" id="remember">
				<label for="remember-me">Remember me</label>
				<p>Don't have an account yet? Register <a href="register.php">here</a></p>
				<div class="submit-button text-center">
					<button type="submit" class="btn" name="login">Login</button>
				</div>
			</fieldset>
		</form>
		<!-- End Login Form -->
	</div>
	<?php } else {
		 $details = $_SESSION['user'];
		 ?>
	<!-- start Account Details -->
	<div id="my-info" class="info-box">
	<form method="post" action="" id="form-info">
			<fieldset>
				<legend>Account Details</legend>
				<div class="form-group">
					<label for="fname">First Name</label>
					<input type="text" name="fname" value="<?php echo $details['first_name']; ?>">
				</div>
				<div class="form-group">
					<label for="lname">Last Name</label>
					<input type="text" name="lname" value="<?php echo $details['last_name']; ?>">
				</div>
				<div class="form-group">
					<label for="cnum">Contact Number</label>
					<input type="text" name="cnum" value="<?php echo $details['contact_num']; ?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="<?php echo $details['email']; ?>"> 
				</div>
				
			</fieldset>
			<!-- strat popup password -->
			<div class="popup password">
			<button type="button" class="close" id="btn_close">&times;</button>
				<div class="form-group">
					<label for="verifyPassword">Enter Password to save changes</label>
					<input type="password" class="form-control" id="verifyPassword" placeholder="Current Password" name="verifyPassword" required>
				</div>
				<div class="alert alert-dismissible alert-danger" id="form-alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
				</div>
				<div class="submit-button text-center">
					<button type="submit" class="btn btn-primary" name="verify">Verify</button>
				</div>
			</div>
			<!-- end password confirm -->
		</form>
		<div class="submit-button text-center">
			<button type="submit" class="btn" name="" id="btn_update">Update</button>
		</div>
	</div>
    <?php } ?>

	<!-- end Account Details -->

	<div class="info-box">
		<form method="post" action="">
		<fieldset>
			<legend>Change Password</legend>
			<div class="form-group">
				<label for="old_password">Current Password</label>
				<input type="password" name="old_password" value="">
			</div>
			<div class="form-group">
				<label for="new_password1">New Password</label>
				<input type="password" name="new_password1" value="">
			</div>
			<div class="form-group">
				<label for="new_password2">Confirm New Password</label>
				<input type="password" name="new_password2" value="">
			</div>
			<div class="submit-button text-center">
				<button type="submit" class="btn" name="change_pass" id="">Change Password</button>
			</div>
		</fieldset>
		</form>
	</div>

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
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..."
								type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
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
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/main.js"></script>
</body>

</html>