<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>profile edit data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem !important;
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
                        <a href="profile_edit_data_and_skills.php" class="nav-item nav-link active"><i class="fa-solid fa-address-card" style="margin-right:5px;"></i>Profile Update</a>
                        <a href="feedback.php" class="nav-item nav-link"><i class="fa-solid fa-comment" style="margin-right:5px;"></i>Feedback</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    <div class="container" style="margin-top: 20px;">
        <div class="main-body">
            <?php
            include('connection.php');
            if (!empty($_POST)) {
                $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);

                $update_query = "UPDATE registration SET fname='$fname',lname='$lname' , email='$email', mobile='$mobile', address='$address' WHERE id='$post_id'";
                $query_run = mysqli_query($conn, $update_query);

                if ($query_run) {
                    echo "Profile updated successfully!";
                    header("Location: profile_with_data_and_skills.php");
                } else {
                    echo "Error updating profile: " . mysqli_error($conn);
                }
            }

            $user_data = null;
            if ($conn) {
                $user_id = (isset($_SESSION['id'])) ? $_SESSION['id'] : null;
                if ($user_id) {
                    $user_data_query = "SELECT fame, lname, email, mobile, address FROM registration WHERE id='$user_id'";
                    $user_data_result = mysqli_query($conn, $user_data_query);
                    if ($user_data_result && mysqli_num_rows($user_data_result) > 0) {
                        $user_data = mysqli_fetch_assoc($user_data_result);
                    }
                }
            }
            ?>
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

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src=".\img\Designer.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="150">
                                        <div class="mt-3">
                                            <h4>Traveller</h4>
                                            <p>We humbly welcome to you on our website.</p>
                                            <p class="text-muted font-size-sm">You can Update your personal Information here.</p>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="hidden" name="post_id" value="<?php echo $user_id; ?>">
                                            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="hidden" name="post_id" value="<?php echo $user_id; ?>">
                                            <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>">">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php $cnt = $cnt + 1;
            }
            ?>

            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript">

            </script>
</body>

</html>