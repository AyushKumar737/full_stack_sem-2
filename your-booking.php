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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

    <script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

    <style>
        .edit {
            margin-top: 20px;
            padding-top: 9px;
            border-radius: 6px;
            border: 0px;
            height: 45px;
            width: 70px;
            justify-content: center;
            color: white;
            background: #08b542;
            font-size: 1em;
        }

        .cancel {
            margin-top: 20px;
            margin-left: 20px;
            padding-top: 9px;
            border-radius: 6px;
            border: 0px;
            height: 45px;
            width: 80px;
            justify-content: center;
            color: white;
            background: red;
            font-size: 1em;
        }

        @media (min-width: 1200px) {
            .col-xl-6 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 50%;
                flex: 0 0 100%;
                max-width: 80%;
            }
        }

        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: 1.5rem;
                padding-left: .5rem;
            }
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
                        <p style="font-weight: 600; font-size:1em; color: #656565;"><i class="fa fa-envelope mr-2"></i>Traveler8331@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p style="font-weight: 600; font-size:1em; color: #656565;"><i class="fa fa-phone-alt mr-2"></i>+91 9879882388</p>
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
                    <h1 class="m-0" style="color:#7AB730"><span class="text-dark">TRAVEL</span>ER</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="user.php" class="nav-item nav-link" style="color: #212121;"><i class="fa-solid fa-house-chimney" style="margin-right:5px;"></i>Home</a>
                        <a href="package.php" class="nav-item nav-link" style="color: #212121;"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
                        <a href="Room-Details.php" class="nav-item nav-link" style="color: #212121;"><i class="fa-solid fa-hotel" style="margin-right:5px;"></i>Room Servics</a>
                        <a href="your-booking.php" class="nav-item nav-link active" style="color:#7AB730"><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Your Booking</a>
                        <a href="feedback.php" class="nav-item nav-link" style="color: #212121;"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Your Booking</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="user.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Your Booking</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Packages Start -->

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <?php

                    include('connection.php');
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM package_booking where approve_status=1 AND user_id=" . $_SESSION['id'];
                        $query_run = mysqli_query($conn, $query);
                        // if ($query_run) {
                        $check_package = mysqli_num_rows($query_run) > 0;

                        if ($check_package) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                // echo "<pre>";
                                // print_r($row);
                    ?>
                                <div class="card user-card-full" style="display:inline-block">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src="./img/Designer.png" class="img-radius" alt="User-Profile-Image" style="width:130px">
                                                </div>
                                                <h6 class="f-w-600">Traveller</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Booking Information</h6>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">First Name</p>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $row['first_name']; ?>" style="border:0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Last Name</p>
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Email" value="<?php echo $row['email']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Mobile</p>
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Phone" value="<?php echo $row['mobile']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">package</p>
                                                        <input type="text" class="form-control" name="package" id="package" placeholder="Pakage" value="<?php echo $row['select_package']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Adults</p>
                                                        <input type="email" class="form-control" name="adults" id="adults" placeholder="Adults" value="<?php echo $row['adults']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Child</p>
                                                        <input type="email" class="form-control" name="child" id="child" placeholder="Childrens" value="<?php echo $row['child']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem;" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Room</p>
                                                        <input type="email" class="form-control" name="Room" id="Room" placeholder="Type of Room" value="<?php echo $row['room']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem; width:220px" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Services</p>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Type of Services" value="<?php echo $row['room']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem; width:220px" disabled>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Amount Paid</p>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Type of Services" value="<?php echo $row['price']; ?>" style="border: 0px; background:transparent; font-size: 1.2rem; width:220px" disabled>
                                                    </div>
                                                </div>
                                                <?php echo "<td><a class='btn btn-success btn-sm edit' href='edited-package-booking.php?p_id=$row[p_id]'>Edit</a></td>" ?>
                                                <?php echo " <td><a class='btn btn-danger btn-sm cancel' href='cancel_booking.php?p_id=$row[p_id]'>Cancel</a></td>" ?>


                                            </div>
                                            <a href="Terms.php" style="margin:20px;">Terms & Conditions</a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    } else {
                        echo "no record found";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>









    <!-- Footer Start -->
    <div class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px; width:80vw; background-color:#212121;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 style="color:#7AB730"><span class="text-white">TRAVEL</span>ER</h1>
                </a>
                <p>Embark on a journey of discovery with our TRAVELER website, where wanderlust meets convenience.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class=" d-flex justify-content-start">
                    <a class="btn mr-2" style="border-color:#7AB730; color:#7AB730;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn mr-2" style="border-color:#7AB730; color:#7AB730;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn mr-2" style="border-color:#7AB730; color:#7AB730;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn mr-2" style="border-color:#7AB730; color:#7AB730;" href="#"><i class="fab fa-instagram"></i></a>
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
                <p><i class="fa fa-map-marker-alt mr-2"></i>411, Arya Epoch opp. &nbsp;Passport Seva, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ahmedabad, Gujarat.</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+91 9879882388</p>
                <p><i class="fa fa-envelope mr-2"></i>Traveler8331.com.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white border-top py-4 px-sm-3 px-md-5" style="border-color:#212121 !important; width:80vw; margin-bottom:40px; background-color:#212121;">
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


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a> -->
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src=""></script>
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
</body>

</html>