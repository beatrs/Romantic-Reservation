<?php
    session_start();
	include 'php/config.php';
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

<body id="override">
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
						<li class="nav-item active"><a class="nav-link" href="reservation.php">Reservation</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> -->
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
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
							//echo isset($_SESSION['login']);
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
					<h1>Reservation</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start My Reservation -->
	<?php if (!empty($_SESSION['user']) && $_SESSION['type'] == 0) {?>
		<div class="submit-button text-center">
			<button class="btn btn-secondary" onclick="toggleDiv('my-res')" >Show/Hide My Reservations</button>
		</div>
		<div class="hide" id="my-res">
		<?php
			echo "<br><div class='text-center'><h2>Welcome! ".$details['first_name']."</h2></div><br><br><br><br>";
			include 'php/my_reserve.php';
			echo "<br><br><br><br><br><br><br>";
		?>
		</div>
	<?php } else if(!empty($_SESSION['user']) && $_SESSION['type'] == 1) { 
			echo "<br><div class='text-center'><h2>ACTIVE RESERVATIONS</h2></div><br><br>"; ?>
		<div>
			<div class='center text-center'>
				<p>Type something in the input field to search the table for first names, last names or emails:</p>  
				<input id="myInput" type="text" placeholder="Search..">
				<br><br>
			</div>
			<div>
			<?php
				include 'php/all_reserve.php';
				echo "<br><br><br><br><br><br><br>";
			?>
			</div>
		</div>
	<?php } ?>

	<!-- End My Reservations -->



	<!-- Start Alert Messages -->
	<div class="modal" tabindex="-1" role="dialog" id="success-dialog" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Success!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeSuccessMsg()">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="sMsg">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeSuccessMsg()">Okay</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="login-prompt" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Unable to book a table</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeMsg()">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="">
					<p>Please sign up/sign in to book a table.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeMsg()">Okay</button>
				</div>
			</div>
		</div>
	</div>

	<div class="alert alert-dismissible alert-danger" id="reserve-alert" style="display:none;">
		<button type="button" class="close" data-dismiss="alert" id="" style="display:block;">&times;</button>
		<strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
	</div>
	<!-- End Alert Messages -->


	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="" method='post' action=''>
							<div class="row">
								<div class="col-md-6">
								<?php if (empty($_SESSION['type']) || $_SESSION['type'] == 0){ ?>
									<h3>Book a table</h3>
								<?php } else{?>
									<h3>Check Table Availability</h3>
								<?php } ?>
									<form id='see-tables' method='post' action=''>

										<!-- PICK DATE -->
										<div class="col-md-12">
											<div class="form-group">
												<!-- <input id="input_date" class="datepicker picker__input form-control" name="res_date" type="date" value="" required data-error="Please enter Date"> -->

												<input type='date' id='date' name='res_date' class="form-control" <?php if(isset($_POST['edit'])) {echo "disabled";}?>
													value="<?php if(isset($_POST['res_date'])) {echo $_POST['res_date'];}
													else if(isset($_POST['reserve_det'])) {
														$dets = $_POST['reserve_det'];
														$dets = explode(",", $dets);
														echo $dets[2];
													} 
													else {echo "";}?>" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<!-- lunch/dinner -->
										<div class="col-md-12">
											<div class="form-group">
												<select class="custom-select d-block form-control" id="time" name='time'
													selected="" data-error="Please select time" <?php if(isset($_POST['edit'])) {echo "disabled";}?>>
													<?php 
													if(isset($_POST['time'])) {echo '<option selected>'.$_POST['time'].'</option>';}
													else if(isset($_POST['reserve_det'])) {
														$dets = $_POST['reserve_det'];
														$dets = explode(",", $dets);
														echo '<option disabled selected>'.$dets[3].'</option>';
													}
													else {echo '<option disabled selected>Select Time*</option>';}?>
													<option value="Lunch">Lunch</option>
													<option value="Dinner">Dinner</option>
												</select>
												<div class="help-block with-errors"></div>
											</div>
										</div>

										<!-- SEE AVAILABLE SEATS -->
										<?php if (!isset($_POST['edit'])) {?>
										<div class="col-md-12">
											<div class="submit-button text-center">
												<button class="btn btn-gray" id="see" type="submit" name='see'>See Available Tables</button>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
												<div class="clearfix"></div>
											</div>
										</div>
										<?php } else{} ?>

										<input type='text' id='seats' value='' name='reserved' style="display:none;">
										<?php if((empty($_SESSION['user']) || (!empty($_SESSION['user']) && $_SESSION['type'] == 0)) && isset($_POST['see']) || isset($_POST['edit'])) {?>
										<div class="col-md-12">
											<div class="submit-button text-center">
												<button class="btn btn-common" id="save" type="submit" name='save' onclick='book_table()'>Book Table</button>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
												<div class="clearfix"></div>
											</div>
										</div>
										<?php } else{} ?>
								</div>
						</form>
						<form method="post" action="">
							<div class="col-md-6">
								<div style="border:1px solid grey; width:508px; height:400; border-radius: 2%;">
									<table>
										<!--<tr>
												#<td colspan="4"></td>
												<td align="right"> <div id="driver"></div> </td>
											</tr>*/ -->

										<tr>
											<td>
												<div class="seat" value='a1'>A1</div>
											</td>
											<td class="walk"> <br><br><br> </td>
											<td>
												<div class="seat" value='a2'>A2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='a3'>A3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='a4'>A4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='b1'>B1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='b2'>B2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='b3'>B3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='b4'>B4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='c1'>C1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='c2'>C2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='c3'>C3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='c4'>C4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='d1'>D1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='d2'>D2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='d3'>D3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='d4'>D4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='e1'>E1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='e2'>E2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='e3'>E3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='e4'>E4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='f1'>F1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='f2'>F2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='f3'>F3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='f4'>F4</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="seat" value='g1'>G1</div>
											</td>
											<td class="walk"> <br><br><br></td>
											<td>
												<div class="seat" value='g2'>G2</div>
											</td>
											<td class="walk2"> </td>
											<td>
												<div class="seat" value='g3'>G3</div>
											</td>
											<td class="walk"> </td>
											<td>
												<div class="seat" value='g4'>G4</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	</div>
	<!-- End Reservation -->

	<!--popup warning -->
	<div class="modal" tabindex="-1" role="dialog" id="cancel-confirm">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Cancel Reservation</h5>
					<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close" onclick="closeCancelConfirm()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="cancel-confirm-msg">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<form method="post" action="">
						<button type="submit" name="cancel-confirm" class="btn btn-primary" style='background-color: #ed1d23; color: white;'>Save changes</button>
					</form>
						<button type="button" class="btn btn-secondary btn-close" data-dismiss="modal" onclick="closeCancelConfirm()">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--popup warning -->



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
							romanticbaboy.ph
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
					<p><span class="text-color">Monday - Sunday : </span>Closed</p>
					<p><span class="text-color">Hours :</span> 11:00 AM - 2:00 AM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ground Level, Double Dragon Plaza, Pasay, Metro Manila</p>
					<p class="lead"><a href="contact.php">(02) 8374 7948</a></p>
					<p><a href="contact.php"> romanticbaboy.ph</a></p>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	<script>
	$(document).ready(function(){
	$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#allRes-table tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	});
	</script> 
</body>
<?php
	include 'php/reserve.php';
?>

</html>