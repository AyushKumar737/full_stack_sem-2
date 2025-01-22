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
    <script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>
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
                        <a href="package.php" class="nav-item nav-link active"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
                        <a href="Room-Details.php" class="nav-item nav-link"><i class="fa-solid fa-hotel" style="margin-right:5px;"></i>Room Servics</a>
                        <a href="your-booking.php" class="nav-item nav-link" ><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Your Booking</a>
                        <a href="feedback.php" class="nav-item nav-link"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
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
                <h3 class="display-4 text-white text-uppercase">Tour Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="user.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Hill destination</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tour Packages</h6>
                <h1>Pefect Pilgrimage places</h1>
            </div>
            <div class="row">
                <?php
                include('connection.php');

                $query = "SELECT * FROM add_package limit 3";
                $query_run = mysqli_query($conn, $query);

                $check_package = mysqli_num_rows($query_run) > 0;

                if ($check_package) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="package-item bg-white mb-2">
                                <img class="img-fluid" src="./img/<?php echo $row['image']; ?>" alt="Network Error" style="width: 500px; height:230px;">
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row['place']; ?></small>
                                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['days']; ?></small>
                                       </div>
                                    <a class="h5 text-decoration-none" href="package-details.php?Id=<?php echo $row['Id']; ?>"><?php echo $row['pname']; ?></a>
                                    <div class="border-top mt-4 pt-4">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="m-0"><?php echo $row['price']; ?></h5>
                                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="package-booking.php">Book Now</a>
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

                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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