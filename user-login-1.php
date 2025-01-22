<!doctype html>
<html lang="en">
  <head>
  	<title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style4.css">
	
	<script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

	</head>
	<body>
		<a href="index.php"><i class="fa-solid fa-house"></i></a>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Don't Have Account?</h2>
								<a href="new-user-login.php" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">User Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
					<?php
					if(isset($_POST["login"]))
					{
						$email = $_POST["email"];
						$password = $_POST["password"];
						require_once "connection.php";
						$sql = "SELECT * FROM registration WHERE email = '$email'";
						$result = mysqli_query($conn, $sql);
						$user = mysqli_fetch_array($result, MYSQLI_ASSOC);	
						if($user)
						{
							 if(password_verify($password, $user["password"]))
							 {
							    session_start();
								$_SESSION["user"] = "yes";
								$_SESSION['id'] = $user['id'];
								header("Location: user.php");
								die();
							 }
							 else
							 {
								echo "<div class='alert alert-danger'>password does not exist</div>";
							 }
						}
						else
						{
							echo "<div class='alert alert-danger'>Email does not exist</div>";
						}
					}
					
					?>
							<form action="user-login.php" class="signin-form" method="POST">
			      		<div class="form-group mb-3">
							<i class="fa-solid fa-user"></i>
			      			<label class="label" for="name">Username</label>
			      			<input type="email" name="email" class="form-control" placeholder="Username/Email" required>
			      		</div>
		            <div class="form-group mb-3">
						<i class="fa-solid fa-lock"></i>
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery2.min.js"></script>
	<script src="js/popper1.js"></script>
	<script src="js/bootstrap2.min.js"></script>
	<script src="js/main2.js"></script>

	</body>
</html>

