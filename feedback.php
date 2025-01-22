<?php
session_start();

// Set the session timeout duration (in seconds)
$timeout_duration = 1800; // 30 minutes

// Check if the session variable 'last_activity' exists
if (isset($_SESSION['last_activity'])) {
	// Check if the session has expired
	if (time() - $_SESSION['last_activity'] > $timeout_duration) {
		// Unset all session variables and destroy the session
		session_unset();
		session_destroy();
		// Redirect to the login page
		header("Location: user-login.php");
		exit();
	}
}

// Update the last activity time
$_SESSION['last_activity'] = time();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
	header("Location: user-login.php");
	exit();
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Feedback</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style5.css">


	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

	<style>
		.container-fluid {
			width: 80%;
		}
	</style>


</head>

<body>


	<!-- Topbar Start -->
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
				<div class="col-lg-6 text-center text-lg-right">
					<div class="d-inline-flex align-items-center">
						<a class="text-primary pl-3" href="user-logout.php">
							<i class="fas fa-sign-out-alt" style="color: #7AB730;"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Topbar End -->


	<!-- Navbar Start -->
	<div class="container-fluid position-relative nav-bar p-0">
		<div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
			<nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
				<a href="user.php" class="navbar-brand">
					<h1 class="m-0 text-primary"><span class="text-dark">TRAVEL</span>ER</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
					<div class="navbar-nav ml-auto py-0">
						<a href="user.php" class="nav-item nav-link "><i class="fa-solid fa-house-chimney" style="margin-right:5px;"></i>Home</a>
						<a href="package.php" class="nav-item nav-link"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
						<a href="Room-Details.php" class="nav-item nav-link"><i class="fa-solid fa-hotel" style="margin-right:5px;"></i>Room Servics</a>
						<a href="your-booking.php" class="nav-item nav-link"><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Your Booking</a>
						<a href="feedback.php" class="nav-item nav-link active"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->




	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Feedback</h3>
									<div id="form-message-warning" class="mb-4"></div>


									<?php

									if (isset($_POST["submit"])) {
										$fname = $_POST["fname"];
										$email = $_POST["email"];
										$subject = $_POST["subject"];
										$message = $_POST["message"];


										$errors = array();

										if (empty($fname) or empty($email) or empty($subject) or empty($message)) {
											array_push($errors, "all fields are required");
										}
										if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
											array_push($errors, "email is not valid");
										}
										require_once "connection.php";
										if (count($errors) > 0) {
											foreach ($errors as $error) {
												echo "<div class='alert alert-danger'>$error</div>";
											}
										} else {

											$sql = "INSERT INTO feedback (fname, email, subject, message) VALUES ( ?, ?, ?, ? )";
											$stmt = mysqli_stmt_init($conn);
											$preparestmt = mysqli_stmt_prepare($stmt, $sql);
											if ($preparestmt) {
												mysqli_stmt_bind_param($stmt, "ssss", $fname, $email, $subject, $message);
												mysqli_stmt_execute($stmt);
												echo "<div class = 'alert alert-success'>Your feedback is appreciated</div>";
											} else {
												die("something went wrong");
											}
										}
									}

									?>
									<?php
									$uid = $_SESSION["id"];
									include('connection.php');
									$sql = "SELECT * from registration where id=" . $uid;
									$result = $conn->query($sql);

									if (!$result) {
										echo "error";
									}
									$row = $result->fetch_assoc();

									$cnt = 1;
									if ($row) {
									?>

										<form action="feedback.php" method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>" name="fname" id="fname" placeholder="Name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="subject">Subject</label>
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Send Message" name="submit" class="btn" style="background-color: #7AB730; color:aliceblue; border-radius:10px;">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									<?php $cnt = $cnt + 1;
									}
									?>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Let's get in touch</h3>
									<p class="mb-4">We're open for any suggestion or just to have a chat</p>
									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-map-marker"></span>
										</div>
										<div class="text pl-3">
											<p><span>Address:</span> Christ University, lavasa, pune.</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Phone:</span>+91 9879882388</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-paper-plane"></span>
										</div>
										<div class="text pl-3">
											<p><span>Email:</span>Traveler8331@gmail.com</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-globe"></span>
										</div>
										<div class="text pl-3">
											<p><span>Website</span> <a href="">Traveler.com</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer Start -->
	<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
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
					<a href="user.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>home</a>
					<a href="package.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Tour Package</a>
					<a href="Room-Details.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Room Services</a>
					<a href="your-booking.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Your Booking</a>
					<a href="feedback.php" class="text-white-50 mb-2" style="text-decoration: none;"><i class="fa fa-angle-right mr-2"></i>Feedback</a>
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
	<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
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
	<!-- Start of ChatBot (www.chatbot.com) code -->
	<script>
		window.__ow = window.__ow || {};
		window.__ow.organizationId = "d8c73eac-3119-4b42-baa6-97c8c2f8699c";
		window.__ow.template_id = "ba594983-01dc-44f9-82dd-bd5441427fc5";
		window.__ow.integration_name = "manual_settings";
		window.__ow.product_name = "chatbot";;
		(function(n, t, c) {
			function i(n) {
				return e._h ? e._h.apply(null, n) : e._q.push(n)
			}
			var e = {
				_q: [],
				_h: null,
				_v: "2.0",
				on: function() {
					i(["on", c.call(arguments)])
				},
				once: function() {
					i(["once", c.call(arguments)])
				},
				off: function() {
					i(["off", c.call(arguments)])
				},
				get: function() {
					if (!e._h) throw new Error("[OpenWidget] You can't use getters before load.");
					return i(["get", c.call(arguments)])
				},
				call: function() {
					i(["call", c.call(arguments)])
				},
				init: function() {
					var n = t.createElement("script");
					n.async = !0, n.type = "text/javascript", n.src = "https://cdn.openwidget.com/openwidget.js", t.head.appendChild(n)
				}
			};
			!n.__ow.asyncInit && e.init(), n.OpenWidget = n.OpenWidget || e
		}(window, document, [].slice))
	</script>
	<noscript>You need to <a href="https://www.chatbot.com/help/chat-widget/enable-javascript-in-your-browser/" rel="noopener nofollow">enable JavaScript</a> in order to use the AI chatbot tool powered by <a href="https://www.chatbot.com/" rel="noopener nofollow" target="_blank">ChatBot</a></noscript>
	<!-- End of ChatBot code -->



	<script src="js/jquery3.min.js"></script>
	<script src="js/popper2.js"></script>
	<script src="js/bootstrap3.min.js"></script>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/tempusdominus/js/moment.min.js"></script>
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Contact Javascript File -->
	<script src="mail/jqBootstrapValidation.min.js"></script>
	<!-- <script src="mail/contact.js"></script> -->

	<!-- Template Javascript -->
	<!-- <script src="js/main.js"></script> -->

</body>

</html>