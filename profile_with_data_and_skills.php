<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

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
                        <a href="user.php" class="nav-item nav-link"><i class="fa-solid fa-house-chimney" style="margin-right:5px;"></i>Home</a>
                        <a href="package.php" class="nav-item nav-link"><i class="fa-solid fa-earth-asia" style="margin-right:5px;"></i>Tour Packages</a>
                        <a href="Room-Details.php" class="nav-item nav-link"><i class="fa-solid fa-hotel" style="margin-right:5px;"></i>Room Servics</a>
                        <a href="profile_with_data_and_skills.php" class="nav-item nav-link active"><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Profile</a>
                        <a href="feedback.php" class="nav-item nav-link"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <img src=".\img\Designer.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="150">
                                <div class="mt-3">
                                    <h4>Traveller</h4>
                                    <p >We humbly welcome to you on our website.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-3">

                    </div>
                </div>
                <?php
                $uid = $_SESSION["id"];
                include('connection.php');
                $sql = "SELECT * from registration where id=" . $uid;
                $result = $conn->query($sql);

                if (!$result) {
                    echo "error";
                }
                $row = $result->fetch_assoc();

                $cnt = 1;
                if ($row) {        
                ?>
                    <form method="POST">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="full_name" class="mb-0">First Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['fname']; ?>" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="full_name" class="mb-0">Last Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['lname']; ?>" disabled>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="email" class="mb-0">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="mobile" class="mb-0">Mobile</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required='true' maxlength='10' disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="address" class="mb-0">Address</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <?php $cnt = $cnt + 1;
                                }
                                    ?>
                                    <a class="btn btn-info" href="profile_edit_data_and_skills.php">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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



                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
                    <script type="text/javascript">

                    </script>
</body>

</html>