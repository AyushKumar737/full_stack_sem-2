<!doctype html>
<html lang="en">

<head>
	<title>TRAVELER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style1.css">

	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

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
	<style>
		i {
			margin-bottom: 37px;
			/* margin-right: 50px; */
		}
	</style>

</head>

<body>
	<!-- Topbar Start -->
	<div class="container-fluid bg-light pt-3 d-none d-lg-block" style="margin:0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
					<div class="d-inline-flex align-items-center">
						<p><i class="fa fa-envelope mr-2"></i>Traveler8331@gmail.com</p>
						<p><i class="fa fa-phone-alt mr-2"></i>+91 9879882388</p>
					</div>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<div class="d-inline-flex align-items-center">
						<p style="color:#7AB730; font-size:1.4em; padding-top:13px;">Login</p>
						<a class="text-primary px-3" href="user-login.php">
							<i class="fa-solid fa-circle-user"></i>
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
				<a href="index.php" class="navbar-brand">
					<h1 class="m-0 text-primary"><span class="text-dark">TRAVEL</span>ER</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" style="height:90px;">
					<div class="navbar-nav ml-auto py-0">
						<a href="index.php" class="nav-item nav-link "><i class="fa-solid fa-house-chimney" style="margin-right:5px;"></i>Home</a>
						<a href="guest-user-package-details.php" class="nav-item nav-link"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
						<a href="guest-user-room-details.php" class="nav-item nav-link"><i class="fa-solid fa-hotel" style="margin-right:5px; margin-bottom:35px;"></i>Room Services</a>
						<a href="Querry.php" class="nav-item nav-link active"><i class="fa-solid fa-person-circle-question" style="margin-right:5px;"></i>Query</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3>Ask us</h3>
									<p class="mb-4">We're open for any suggestion or just to have a chat</p>
									<div class="row mb-4">
										<div class="col-md-4">
											<div class="dbox w-100 d-flex align-items-start">
												<div class="text">
													<p><span>Address:</span> christ University, lavasa, Pune.</p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="dbox w-100 d-flex align-items-start">
												<div class="text">
													<p><span>Email:</span> <a>Traveler8331@gmail.com</a></p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="dbox w-100 d-flex align-items-start">
												<div class="text">
													<p><span>Phone:</span> +91 9879882388</p>
												</div>
											</div>
										</div>
									</div>

									<?php

									if (isset($_POST["submit"])) {
										$name = $_POST["name"];
										$email = $_POST["email"];
										$subject = $_POST["subject"];
										$message = $_POST["message"];


										$errors = array();

										if (empty($name) or empty($email) or empty($subject) or empty($message)) {
											array_push($errors, "all fields are reqiured");
										}
										// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
										// 	array_push($errors, "email is not valid");
										// }
										require_once "connection.php";
										$sql = "SELECT * FROM querry WHERE email = '$email'";
										$result = mysqli_query($conn, $sql);
										$rowcount = mysqli_num_rows($result);
										if ($rowcount > 0) {
											array_push($errors, "email already exist");
										}
										if (count($errors) > 0) {
											foreach ($errors as $error) {
												echo "<div class='alert alert-danger'>$error</div>";
											}
										} else {

											$sql = "INSERT INTO querry (name, email, subject, message) VALUES ( ?, ?, ?, ? )";
											$stmt = mysqli_stmt_init($conn);
											$preparestmt = mysqli_stmt_prepare($stmt, $sql);
											if ($preparestmt) {
												mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
												mysqli_stmt_execute($stmt);
												echo "<div class = 'alert alert-success'>Your Querry will be solved by our professional</div>";
											} else {
												die("something went wrong");
											}
										}
									}

									?>

									<form action="Querry.php" method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Create a message here"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" name="submit" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5 img" style="background-image: url(img/img.jpg);">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- navbar scripts -->
	<!-- Back to Top -->
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


	<!-- contact-us scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>