<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: user.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>User Sign Up</title>
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

    <?php /*
    if (!empty($_POST)) {
        include("connection.php");

        // Validate inputs
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $rpassword = isset($_POST['rpassword']) ? $_POST['rpassword'] : '';

        // Check if passwords match
        if ($password !== $rpassword) {
            die("Passwords do not match.");
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO registration (fname, lname, email, password, rpassword) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssss", $fname, $lname, $email, $password, $rpassword);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='alert alert-danger'>Registration Successful.</div>";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } */
    ?>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Already Have an Account</h2>
                                <a href="user-login.php" class="btn btn-white btn-outline-white">Click here</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">User Sign Up</h3>
                                </div>
                            </div>
                            <?php 
                            include("connection.php");
                            if (isset($_POST["signup"])) {
                                $fname = $_POST["fname"];
                                $lname = $_POST["lname"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                                $rpassword = $_POST["rpassword"];

                                $passwordhash = password_hash($password, PASSWORD_DEFAULT);

                                $errors = array();

                                if (empty($fname) or empty($email) or empty($password) or empty($rpassword)) {
                                    array_push($errors, "all fields are reqiured");
                                }
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    array_push($errors, "email is not valid");
                                }
                                if (strlen($password) < 8) {
                                    array_push($errors, "password must be 8 character long");
                                }
                                if ($password !== $rpassword) {
                                    array_push($errors, "password does not match");
                                }
                                require_once "connection.php";
                                $sql = "SELECT * FROM registration WHERE email = '$email'";
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
//echo $passwordhash; die;

                                    $sql = "INSERT INTO registration (fname,lname, email, password) VALUES ( ?, ?, ?, ? )";
                                    $stmt = mysqli_stmt_init($conn);
                                    $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                                    if ($preparestmt) {
                                        mysqli_stmt_bind_param($stmt, "ssss", $fname,$lname, $email, $passwordhash);
                                        mysqli_stmt_execute($stmt);
                                        echo "<div class = 'alert alert-success'>you are registered succesfully</div>";
                                    } else {
                                        die("something went wrong");
                                    }
                                }
                            }

                            ?>



                            <form class="signin-form" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Your first Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Your first Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Your last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Your last Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Your Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Your " required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="rpassword">Repeat Password</label>
                                    <input type="password" name="rpassword" class="form-control" placeholder="Repeat Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="signup" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>Email
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