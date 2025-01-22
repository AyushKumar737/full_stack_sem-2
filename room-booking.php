<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>TRAVELER</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap2.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style3.css" />

	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

     <!-- home button -->
	<a href="user.php"><i class="fa-solid fa-house"></i></a>
     <!-- end -->

	 <!-- Tour package -->
	<a href="room-details.php"><i class="fa-solid fa-backward-step"></i></a>
	<!-- end -->

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>

						<?php
						
						if(isset($_POST['submit']))
						{
							$name = mysqli_real_escape_string($conn, $_POST['name']);
							$check_in  = mysqli_real_escape_string ($conn,$_POST["datei"]);
							$check_out  = mysqli_real_escape_string ($conn,$_POST["dateo"]);
							$select_room  = mysqli_real_escape_string ($conn,$_POST["room"]);
							$adults = mysqli_real_escape_string ($conn,$_POST["adults"]);
							$child  = mysqli_real_escape_string ($conn,$_POST["child"]);
							$email  = mysqli_real_escape_string ($conn,$_POST["email"]);
							$mobile  = mysqli_real_escape_string ($conn,$_POST["mobile"]);
							
							$query = mysqli_query($conn, "INSERT INTO `hotel_booking`(`name`, `check_in`, `check_out`, `room`, `adults`, `child`, `email`, `mobile`)
							 VALUES ('$name','$check_in','$check_out','$select_room','$adults','$child','$email','$mobile')");
							 
							 if($query)
							 {
								$message[]='sucess';
							 }
							 else
							 {
								$message[]='error';

							 }
						}
					
						?> 

						<form action="hotel-booking.php" method="POST">
							<div class="form-group">
								<input class="form-control" name="name" type="text" placeholder="Enter Your Name">
								<span class="form-label">Your name</span>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="datei" type="date" required>
										<span class="form-label">Check In</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="dateo" type="date" required>
										<span class="form-label">Check out</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<select  name="room" class="form-control" required>
											<option value="" selected hidden>type of room</option>
											<option>Junior Suite</option>
											<option>Executive Suite</option>
											<option>Super Deluxe</option>
											<option>Beachfront</option>
											<option>Presidential Suites</option>
											<option>Penthouse Suites</option>
											<option>Honeymoon Suites</option>
											<option>Standard Suites</option>
											<option>Resort</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Rooms</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<input name="adults" class="form-control" type="number" size="2" value="0" min="1" placeholder="No. of Adults">
									<span class="form-label">Adults</span>
										<!-- <select class="form-control" required>
											<option value="" selected hidden>no of adults</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
										</select> -->
										<!-- <span class="select-arrow"></span>
										<span class="form-label">Adults</span> -->
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<input name="child" class="form-control" type="number" size="2" value="0" min="0" placeholder="No. of child">
									
										<!-- <select class="form-control" required>
											<option value="" selected hidden>no of children</option>
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>-->
										<span class="select-arrow"></span>
										<span class="form-label">Children</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" class="form-control" type="email" placeholder="Enter your Email">
										<span class="form-label">Email</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="mobile" class="form-control" type="mobile" placeholder="Enter you Phone">
										<span class="form-label">Phone</span>
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

	<script src="js/jquery1.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
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

</body>

</html>
