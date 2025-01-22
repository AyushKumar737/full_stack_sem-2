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

    <?php
    include('connection.php');
    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];
        $query = "SELECT * FROM add_package where Id =" . $_GET['Id'];
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $check_package = mysqli_num_rows($query_run) > 0;

            if ($check_package) {
                while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
                    <!-- Header Start -->
                    <div class="container-fluid page-header">
                        <div class="container">
                            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                                <h3 class="display-4 text-white text-uppercase"><?php echo $row['place']; ?></h3>
                                <div class="d-inline-flex text-white">
                                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                                    <p class="m-0 text-uppercase"><?php echo $row['place']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header End -->

                    <!-- Package Details -->
                    <div class="container-fluid py-5">
                        <div class="container py-5">
                            <div class="text-center mb-3 pb-3">
                                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;"><?php echo $row['place']; ?></h6>
                                <h1>Explore About <?php echo $row['place']; ?></h1>
                            </div>
                            <div class="row">

                                <div class="col-lg-8">
                                    <div class="row pb-3">

                                        <?php if (!empty($row['name1'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty(trim($row['image1']))) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image1']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day1']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name1']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description1']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name2'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty(trim($row['image2']))) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image2']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day2']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name2']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description2']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name3'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty(trim($row['image3']))) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image3']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day3']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name3']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description3']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name4'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image4'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image4']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day4']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name4']; ?></p>

                                                        </div>

                                                        <p><?php echo $row['description4']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name5'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image5'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image5']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day5']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name5']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description5']; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name6'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image4'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image6']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day6']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name6']; ?></p>

                                                        </div>
                                                        <p><?php echo $row['description6']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name7'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image7'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image7']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day7']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name7']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description7']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name8'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image8'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image8']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day8']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name8']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description8']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name9'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image9'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image9']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day9']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name9']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description9']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name10'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image10'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image10']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day10']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name10']; ?></p>

                                                        </div>

                                                        <p><?php echo $row['description10']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name11'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image11'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image11']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day11']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name11']; ?></p>
                                                        </div>
                                                        <p><?php echo $row['description11']; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($row['name12'])) { ?>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="blog-item">
                                                    <?php if (!empty($row['image12'])) { ?>
                                                        <div class="position-relative">
                                                            <img class="img-fluid w-100" src="./img/<?php echo trim($row['image12']); ?>" alt="Network Error" style="width: 500px; height: 235px;">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="bg-white p-4">
                                                        <p><?php echo $row['day12']; ?></p>
                                                        <div class="d-flex mb-2">
                                                            <p class="text-primary text-uppercase text-decoration-none"><?php echo $row['name12']; ?></p>

                                                        </div>
                                                        <p><?php echo $row['description12']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                <?php
                }
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
                    <!-- Package Details-->

                    <a href="package-booking.php?pID=<?php echo $_GET['Id']; ?>"> <button class="neon-button">Book Now</button> </a>

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
                    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important; width:75vw; margin-bottom:80px;">
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