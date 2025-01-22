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
<html>

<head>
    <title>Payment Confirmation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style4.css">

    <script src="https://kit.fontawesome.com/8c7e0740b8.js" crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
        h1{
            margin-top: -20px;
            font-weight: 700;
        }
        .text-white-50{
            font-size: 1em;
        }
        p{
            font-size: 1.5em;
        }
        a{
            font-size: 1.5em !important;
            font-weight:700 !important;
            padding: 4px;
        }
    </style>
</head>

<body style="background-repeat: no-repeat;">

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

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title align-item-center">Payment Confirmation </h4>
                    </div>
                    <div class="panel-body">

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

                        <!-- <form action=""> -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name" value="<?php echo $rowuser['fname'] ?> <?php echo $rowuser['lname'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email" value="<?php echo $rowuser['email'] ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="billing_mobile" id="billing_mobile" min-length="10" max-length="10" value="<?php echo $rowuser['mobile'] ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label>Payment Amount</label>
                            <?php
                            include('connection.php');

                            // $id = $_SESSION["Id"];
                            $query = "SELECT * FROM add_package";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                    <input type="text" class="form-control" name="payAmount" id="payAmount" value="<?php echo $row['price'] ?>" disabled>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>
                        </div>

                        <!-- submit button -->
                        <button id="PayNow" class="btn btn-success btn-lg btn-block">Confirm & Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5 foot" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">TRAVEL</span>ER</h1>
                </a>
                <p style="margin-top: 50px;">Embark on a journey of discovery with our TRAVELER website, where wanderlust meets convenience.</p>
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
                <p><i class="fa fa-map-marker-alt mr-2"></i>411, Arya Epoch opp.&nbsp;Passport Seva,&nbsp;&nbsp;Ahmedabad, Gujarat.</p>
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


    <script>
        //Pay Amount
        jQuery(document).ready(function($) {

            jQuery('#PayNow').click(function(e) {

                var paymentOption = '';
                let billing_name = $('#billing_name').val();
                let billing_mobile = $('#billing_mobile').val();
                let billing_email = $('#billing_email').val();
                var shipping_name = $('#billing_name').val();
                var shipping_mobile = $('#billing_mobile').val();
                var shipping_email = $('#billing_email').val();
                var paymentOption = "netbanking";
                var payAmount = $('#payAmount').val();

                var request_url = "submitpayment.php";
                var formData = {
                    billing_name: billing_name,
                    billing_mobile: billing_mobile,
                    billing_email: billing_email,
                    shipping_name: shipping_name,
                    shipping_mobile: shipping_mobile,
                    shipping_email: shipping_email,
                    paymentOption: paymentOption,
                    payAmount: payAmount,
                    action: 'payOrder'
                }

                $.ajax({
                    type: 'POST',
                    url: request_url,
                    data: formData,
                    dataType: 'json',
                    encode: true,
                }).done(function(data) {

                    if (data.res == 'success') {
                        var orderID = data.order_number;
                        var orderNumber = data.order_number;
                        var options = {
                            "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
                            "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "Traveller", //your business name
                            "description": data.userData.description,
                            "image": "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80",
                            "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
                            "handler": function(response) {

                                window.location.replace("your-booking.php?oid=" + orderID + "&rp_payment_id=" + response.razorpay_payment_id + "&rp_signature=" + response.razorpay_signature);

                            },
                            "modal": {
                                "ondismiss": function() {
                                    window.location.replace("your-booking.php?oid=" + orderID);
                                }
                            },
                            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                                "name": data.userData.name, //your customer's name
                                "email": data.userData.email,
                                "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
                            },
                            "notes": {
                                "address": "Tutorialswebsite"
                            },
                            "config": {
                                "display": {
                                    "blocks": {
                                        "banks": {
                                            "name": 'Pay using ' + paymentOption,
                                            "instruments": [

                                                {
                                                    "method": paymentOption
                                                },
                                            ],
                                        },
                                    },
                                    "sequence": ['block.banks'],
                                    "preferences": {
                                        "show_default_blocks": true,
                                    },
                                },
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function(response) {

                            window.location.replace("payment-failed.php?oid=" + orderID + "&reason=" + response.error.description + "&paymentid=" + response.error.metadata.payment_id);

                        });
                        rzp1.open();
                        e.preventDefault();
                    }

                });
            });
        });
    </script>

</body>

</html>