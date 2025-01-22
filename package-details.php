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

    <!-- Stylesheet For Booking Button-->
    <link href="css/style-btn.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>Ayush@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 7376468331</p>
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
                        <a href="package.php" class="nav-item nav-link active"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
                        <a href="Room-Details.php" class="nav-item nav-link"><i class="fa-solid fa-hotel" style="margin-right:5px;"></i>Room Servics</a>
                        <a href="your-booking.php" class="nav-item nav-link"><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Your Booking</a>
                        <a href="feedback.php" class="nav-item nav-link"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>Top Rated Tour Packages</h1>
            </div>
            <div class="row">
                <?php
                include('connection.php');
                if (!empty($_GET['dId'])) {
                    $query = "SELECT * FROM add_package where dname=" . $_GET['dId'];
                } else {
                    $query = "SELECT * FROM add_package ";
                }

                $query_run = mysqli_query($conn, $query);

                $check_package = mysqli_num_rows($query_run) > 0;

                if ($check_package) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="package-item bg-white mb-2">
                                <img class="img-fluid" src="img/<?php echo $row['image']; ?>" alt="Image" style="width: 500px; height: 230px;">
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row['place']; ?></small>
                                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['days']; ?></small>
                                        <!-- <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.9 <small>(8789)</small> -->
                                        </h6>
                                    </div>
                                    <a class="h5 text-decoration-none" href="packagedetail.php?Id=<?php echo $row['Id']; ?>"><?php echo $row['pname']; ?></a>
                                    <div class="border-top mt-4 pt-4">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="m-0"><?php echo $row['price']; ?></h5>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="package-booking.php?pID=<?php echo $row['Id'] ?>">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php

                    }
                } else {
                    echo "no record found";
                }

                ?>


            </div>
        </div>
    </div>
    </div>
    <!-- Package Details-->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px; width:75vw;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">TRAVEL</span>ER</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed
                    vero lorem dolor dolor</p>
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
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>About</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Destination</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Services</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Packages</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Guides</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Testimonial</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>About</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Destination</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Services</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Packages</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Guides</p>
                    <p class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Testimonial</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Ampics Ganpat University</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+91 7376468331</p>
                <p><i class="fa fa-envelope mr-2"></i>Ayush@gmail.com.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important; width:75vw; margin-bottom:80px;">
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