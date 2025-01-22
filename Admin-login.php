<?php
include("connection.php");
?>
<!Doctype html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style4.css">

	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

	<style>
		.text-wrap {
			background-color: #7AB730 !important;
		}

		.text-primary {
			color: #7AB730 !important;
		}

		.container-fluid {
			width: 80%;
		}

		body {
			font-size: 1.2em;
		}

		img {
			width: 100px;
		}
	</style>

</head>

<body>

	<div class="container-fluid bg-light pt-3 d-none d-lg-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
					<div class="d-inline-flex align-items-center">
						<p><i class="fa fa-envelope mr-2"></i>Traveler8331@gmail.com</p>
						<p class="text-body px-3">|</p>
						<p><i class="fa fa-phone-alt mr-2"></i>+91 9879882388</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid position-relative nav-bar p-0">
		<div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
			<nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
				<img src="./img/1.png" alt="network" srcset="">
				<a href="index.php" class="navbar-brand">
					<h1 class="m-0 text-primary"><span class="text-dark">TRAVEL</span>ER</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
			</nav>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to User login</h2>
								<!-- <p>Don\'t have an account?</p> -->
								<a href="user-login.php" class="btn btn-white btn-outline-white">Sign In</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Admin Sign In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>

							<?php
							if (isset($_POST['login'])) {
								$querry = "SELECT * FROM `admin` WHERE `Username`='$_POST[aname]' AND `Password`='$_POST[apass]'";
								$result = mysqli_query($conn, $querry);
								if (mysqli_num_rows($result) == 1) {
									$row = mysqli_fetch_array($result);
									session_start();
									$_SESSION['Adminid'] = $_POST['aname'];
									$_SESSION['uid'] = $row['Id'];
									$_SESSION['admin_role'] = $row['admin_role'];
									header("location: admin-index.php");
								} else {
									echo "<div class='alert alert-danger'>Username or password does not exist</div>";
								}
							}


							?>
							<form action="Admin-login.php" class="signin-form" method="POST">
								<div class="form-group mb-3">
									<i class="fa-solid fa-user"></i>
									<label class="label" for="name">Username</label>
									<input type="text" name="aname" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group mb-3">
									<i class="fa-solid fa-lock"></i>
									<label class="label" for="password">Password</label>
									<input type="password" name="apass" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Log in</button>
								</div>
								<div class="form-group d-md-flex">
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer Start -->
	<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5 foot" style="margin-top: 90px;">
		<div class="row pt-5">
			<div class="col-lg-3 col-md-6 mb-5">
				<a href="" class="navbar-brand">
					<h1 class="text-primary"><span class="text-white">TRAVEL</span>ER</h1>
				</a>
				<p>Embark on a journey of discovery with our TRAVELER website, where wanderlust meets convenience.</p>
				<h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
				<div class="d-flex justify-content-start">
					<a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
					<a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
					<a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
					<a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-5">
				<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
				<div class="d-flex flex-column justify-content-start">
					<a href="index.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Home </a>
					<a href="guest-user-package-details.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Tour Package</a>
					<a href="guest-user-room-details.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Room Service</a>
					<a href="Querry.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Querry</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-5">
				<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
				<div class="d-flex flex-column justify-content-start">
					<a href="https://www.olacabs.com/" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Cab</a>
					<a href="https://www.goindigo.in/" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Flight</a>
					<a href="https://www.irctc.co.in/" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Train</a>
					<a href="https://www.redbus.com/" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Bus</a>
					<a href="https://maps.google.com/" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Map</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-5">
				<h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
				<p><i class="fa fa-map-marker-alt mr-2"></i>411, Arya Epoch opp. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Passport Seva, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ahmedabad, Gujarat.</p>
				<p><i class="fa fa-phone-alt mr-2"></i>+91 9879882388</p>
				<p><i class="fa fa-envelope mr-2"></i>Traveler8331.com.com</p>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1)">
		<div class="row">
			<div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
				<p class="m-0 text-white-50">Copyright &copy; TRAVELER</a>. All Rights Reserved.</a>
				</p>
			</div>
			<div class="col-lg-6 text-center text-md-right">
				<p class="m-0 text-white-50">Designed by Ayush</a>
				</p>
			</div>
		</div>
	</div>
	<!-- Footer End -->



	<script src="js/jquery2.min.js"></script>
	<script src="js/popper1.js"></script>
	<script src="js/bootstrap2.min.js"></script>
	<script src="js/main2.js"></script>

</body>

</html>