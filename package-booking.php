<?php
session_start();
include('connection.php');
// echo $_SESSION['id']; 
$sql = "select * from registration where id=" . $_SESSION['id'];
$query_user = mysqli_query($conn, $sql);

if (mysqli_num_rows($query_user) > 0) {
	$rowuser = mysqli_fetch_array($query_user);
	// print_r($rowuser);die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>TRAVELER</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free HTML Templates" name="keywords">
	<meta content="Free HTML Templates" name="description">

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

	<!-- Booking Starts-->

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap2.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style3.css" />

	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

	<style>
		#bar {
			font-weight: bold;
			font-size: 1.575rem;
		}

		.error {
			color: red;
			font-size: 0.9em;
		}

		.valid {
			color: green;
			font-size: 0.9em;
		}
		a{
			text-decoration: none;
			color: white;
		}
	</style>
</head>

<body>

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
						<a href="user.php" class="nav-link" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-house-chimney" style="margin-right:3.5px;"></i>Home</a>
						<a href="package.php" class="nav-link" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-earth-asia" style="margin-right:3.5px;"></i>Tour Packages</a>
						<a href="Room-Details.php" class="nav-link" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-hotel" style="margin-right:3.5px;"></i>Room Servics</a>
						<a href="your-booking.php" class="nav-link" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-address-card" style="margin-right:3.5px;"></i>Your Booking</a>
						<a href="package-booking.php" class="nav-link active" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-registered" style="margin-right:3.5px;"></i>Booking</a>
						<a href="feedback.php" class="nav-link" style="font-size:1.2em; font-weight:bolder;"><i class="fa-solid fa-comment" style="margin-right:3.5px;"></i>Feedback</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->


	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Book Your Travel Package</h1>
						</div>

						<?php

						if (isset($_POST['submit'])) {
							$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
							$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
							$check_in  = mysqli_real_escape_string($conn, $_POST['datei']);
							$check_out  = mysqli_real_escape_string($conn, $_POST['dateo']);
							$select_package  = mysqli_real_escape_string($conn, $_POST['select_package']);
							$adults = mysqli_real_escape_string($conn, $_POST['adults']);
							$child  = mysqli_real_escape_string($conn, $_POST['child']);
							$room  = mysqli_real_escape_string($conn, $_POST['room']);
							$service  = mysqli_real_escape_string($conn, $_POST['service']);
							$email  = mysqli_real_escape_string($conn, $_POST['email']);
							$mobile  = mysqli_real_escape_string($conn, $_POST['mobile']);
							$price  = mysqli_real_escape_string($conn, $_POST['price']);
							$user_id = $_SESSION['id'];

							$query = mysqli_query($conn, "INSERT INTO `package_booking`(`first_name`, `last_name`, `check_in`, `check_out`, `select_package`, `adults`, `child`, `room`, `service`, `email`, `mobile`,`price`,`user_id`)
							 VALUES ('$first_name','$last_name','$check_in','$check_out','$select_package','$adults','$child', '$room','$service','$email','$mobile','$price','$user_id')");
                              
							if ($query) {
								header("location: payment.php");
								echo "<div class = 'alert alert-success'>you are Booking succesfuled</div>";
							} else {
								$message[] = 'error';
							}
						}

						?>

						<?php

						if (isset($_GET['pID'])) {
							$post_id = $_GET['pID'];
							$query = "SELECT * FROM add_package WHERE Id='$post_id' LIMIT 1";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								$rowpackage = mysqli_fetch_array($query_run);
							}
						}

						?>

						<form method="POST">
							<div class="form-group">
								<input name="id" value="" class="form-control" type="hidden">
							</div>
							<div class="form-group">
								<input name="first_name" value="<?php echo $rowuser['fname'] ?>" class="form-control" type="text" placeholder="Enter Your First Name">
								<span class="form-label">FIRST NAME</span>
							</div>
							<div class="form-group">
								<input name="last_name" value="<?php echo $rowuser['lname'] ?>" class="form-control" type="text" placeholder="Enter Your First Name">
								<span class="form-label">LAST NAME</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="datei" id="checkInDate" class="form-control" type="date" required>
										<span class="form-label">Check In</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="dateo" id="checkOutDate" class="form-control" type="date" required>
										<span class="form-label">Check out</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name="select_package" value="<?php echo $rowpackage['place']; ?>">
										<span class="select-arrow"></span>
										<span class="form-label">PACKAGES</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input name="adults" class="form-control" type="number" size="2" value="0" min="1" placeholder="No. of Adults" max="10">
										<span class="form-label">Adults</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input name="child" class="form-control" type="number" size="2" value="0" min="0" max="10" placeholder="No. of Children">
										<span class="select-arrow"></span>
										<span class="form-label">Children</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="room" class="form-control" required>
											<span class="form-label"></span>
											<option value="" selected hidden>Type Of room</option>
											<option disabled></option>
											<option>Junior Suite</option>
											<option>Executive Suite</option>
											<option>Super Deluxe</option>
											<option>Beachfront</option>
											<option>Presidential Suites</option>
											<option>Penthouse Suites</option>
											<option>Honeymoon Suites</option>
											<option>Standard Suites</option>
											<option>Resort</option>
											<option disabled></option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Type Room</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="service" class="form-control" required>
											<option value="" selected hidden>Type of Service</option>
											<option disabled></option>
											<option>None</option>
											<option>Rooms & Appartment</option>
											<option>Food & Restaurant</option>
											<option>Spa & Fitnesst</option>
											<option>Sports & Gaming</option>
											<option>Event & Party</option>
											<option>GYM & Yoga</option>
											<option disabled></option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Type Of services</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" value="<?php echo $rowuser['email'] ?>" class="form-control" type="email" placeholder="Enter your Email">
										<span class="form-label">Email</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="mobile" id="phoneNumber" id="billing_mobile" value="<?php echo $rowuser['mobile'] ?>" class="form-control" type="text" placeholder="Enter your Phone" oninput="validatePhoneNumber(this)" aria-describedby="phoneNumberError">
										<span class="form-label">Phone Number</span>
										<span id="phoneNumberError" class="error" role="alert"></span>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<?php
										include('connection.php');

										// $id = $_SESSION["Id"];
										$query = "SELECT * FROM add_package";
										$query_run = mysqli_query($conn, $query);

										if (mysqli_num_rows($query_run) > 0) {
											while ($row = mysqli_fetch_assoc($query_run)) {
										?>
												<input name="price" value="<?php echo $row['price'] ?>" class="form-control" type="text" disabled>
										<?php
											}
										} else {
											echo "No records found";
										}
										?>
										<span class="form-label">Price</span>
										<span class="error" role="alert"></span>

									</div>
								</div>

							</div>
							<div class="form-btn">
								<button name="submit" class="submit-btn">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

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
	<script src="mail/contact.js"></script>

	<!-- Template Javascript -->
	<script src="js/main.js"></script>

	<script src="js/jquery1.min.js"></script>

	<!-- required validation -->
	<script>
		$('.form-control').each(function() {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function() {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>
	<!-- end of required validation -->



	<!-- validation for dates  -->
	<script>
		// Function to validate and set date constraints
		function updateCheckOutMinDate() {
			var checkInDateInput = document.getElementById('checkInDate');
			var checkOutDateInput = document.getElementById('checkOutDate');
			var checkInDate = new Date(checkInDateInput.value);

			if (!isNaN(checkInDate)) {
				// Set minimum Check-Out date to 4 days after Check-In date
				var minCheckOutDate = new Date(checkInDate);
				minCheckOutDate.setDate(minCheckOutDate.getDate() + 4);
				checkOutDateInput.min = minCheckOutDate.toISOString().split('T')[0]; // Set min attribute

				// If Check-Out date is less than min, reset it
				if (new Date(checkOutDateInput.value) < minCheckOutDate) {
					alert('Check-Out date must be at least 4 days after Check-In date.');
					checkOutDateInput.value = ''; // Reset Check-Out date
				}
			}
		}

		// Add event listeners to the input fields
		document.getElementById('checkInDate').addEventListener('change', function() {
			var currentDate = new Date();
			var selectedDate = new Date(this.value);

			// Validate Check-In date
			if (selectedDate < currentDate) {
				alert('Please select a future date for Check In');
				this.value = '';
				document.getElementById('checkOutDate').value = ''; // Reset Check-Out if Check-In is invalid
			} else {
				updateCheckOutMinDate(); // Update Check-Out constraints based on Check-In
			}
		});

		document.getElementById('checkOutDate').addEventListener('change', function() {
			var currentDate = new Date();
			var selectedDate = new Date(this.value);

			// Validate Check-Out date
			if (selectedDate < currentDate) {
				alert('Please select a future date for Check Out');
				this.value = '';
			}
		});
	</script>
	<!-- end of validation for date  -->


	<!-- validation for mobile number  -->
	<script>
		function validatePhoneNumber(input) {
			// Remove non-numeric characters except for '+'
			var phoneNumber = input.value.replace(/[^0-9+]/g, '');

			// Check if the phone number starts with '+'
			var isInternational = phoneNumber.startsWith('+');

			// Format the phone number
			if (isInternational) {
				// Allow country code (e.g., +91 9876543210)
				phoneNumber = phoneNumber.replace(/(\+\d{2})(\d{0,10})/, '$1 $2');
			} else {
				// Format for Indian mobile numbers (e.g., 98765-43210)
				phoneNumber = phoneNumber.replace(/(\d{5})(\d{0,5})/, '$1-$2');
			}

			// Update the input value with the formatted phone number
			input.value = phoneNumber;

			// Validate length for Indian numbers
			var digitsOnly = phoneNumber.replace(/\D/g, ''); // Get only digits
			if (isInternational) {
				if (digitsOnly.length === 12 && digitsOnly.startsWith('91')) {
					document.getElementById('phoneNumberError').textContent = 'Valid Indian phone number.';
					document.getElementById('phoneNumberError').className = 'valid';
				} else {
					document.getElementById('phoneNumberError').textContent = 'Please enter a valid Indian phone number with country code.';
					document.getElementById('phoneNumberError').className = 'error';
				}
			} else {
				if (digitsOnly.length === 10 && /^[789]\d{9}$/.test(digitsOnly)) {
					document.getElementById('phoneNumberError').textContent = 'Valid Indian mobile number.';
					document.getElementById('phoneNumberError').className = 'valid';
				} else if (digitsOnly.length === 0) {
					document.getElementById('phoneNumberError').textContent = '';
					document.getElementById('phoneNumberError').className = 'error';
				} else {
					document.getElementById('phoneNumberError').textContent = 'Please enter a valid 10-digit Indian mobile number.';
					document.getElementById('phoneNumberError').className = 'error';
				}
			}
		}
	</script>

	<!--end of validation for mobile number  -->
	
</body>

</html>