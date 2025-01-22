<?php
include("connection.php");
session_start();

// Regenerate session ID to prevent session fixation attacks
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

// Session timeout (30 minutes)
$timeout_duration = 1800;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
    session_unset();
    session_destroy();
    header("location: Admin-login.php");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time

// Check if Admin is logged in
if (!isset($_SESSION['Adminid'])) {
    header("location: Admin-login.php");
    exit();
}

// Ensure the database connection is valid
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib3/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib3/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap5.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/admin-style.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 260px;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="admin-index.php" class="navbar-brand mx-4 mb-3">
                    <h3 style="color:#28a745;"><i class="fa fa-user-edit me-2"></i>TRAVELER</h3>
                </a>

                <?php
                $uid = $_SESSION["uid"];

                include('connection.php');
                $sql = "SELECT * from admin where id=" . $uid;
                $result = $conn->query($sql);

                if (!$result) {
                    echo "error";
                }
                $row = $result->fetch_assoc();

                $cnt = 1;
                if ($row) {
                ?>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/<?php echo $row['Image']; ?>" alt="" style="width: 80px; height: 75px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                            </div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?php echo $row['Username']; ?></h6>
                            <span><?php echo $row['admin_role']; ?></span>
                        </div>
                    </div>
                <?php $cnt = $cnt + 1;
                }
                ?>

                <div class="navbar-nav w-100">
                    <a href="admin-index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>View Packages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-view-pakage.php" class="nav-item nav-link">view user booking</a>
                            <a href="admin-view-details.php" class="nav-item nav-link">View Package Details</a>
                            <!-- <a href="admin-view-room.php" class="nav-item nav-link">View Room Services</a> -->
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>About Us</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-add-about-package.php" class="nav-item nav-link active">Add About Us</a>
                            <a href="admin-view-about.php" class="nav-item nav-link">View About Us</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Edit Packages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-edit-pakage.php" class="nav-item nav-link">Add Packages</a>
                            <a href="admin-edit-detail.php" class="nav-item nav-link">Edit Package Details</a>
                            <!-- <a href="admin-edit-room.php" class="nav-item nav-link">Edit Room Services</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Admin section</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-blank.php" class="nav-item nav-link"></i>Add admin</a>
                            <a href="admin-update.php" class="nav-item nav-link">Edit admin details</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Destination</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="desitination_add.php" class="nav-item nav-link"></i>Add Destination</a>
                            <a href="admin_view_destination.php" class="nav-item nav-link">view destination</a>
                        </div>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Room</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admi-room.php" class="nav-item nav-link"></i>Add Room</a>
                            <a href="room-edit.php" class="nav-item nav-link">view Room</a>
                            <a href="room-update.php" class="nav-item nav-link ">Update Room</a>
                        </div>

                    </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="admin-index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="Admin-login.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <?php

            if (isset($_POST["add"])) {
                $main_desc = trim($_POST["main_desc"]);
                $desc_1 = trim($_POST["desc_1"]);
                $desc_2 = trim($_POST["desc_2"]);
                $desc_3 = trim($_POST["desc_3"]);
                $desc_4 = trim($_POST["desc_4"]);

                $errors = array();

                // Check if any required field is empty
                if (empty($main_desc) || empty($desc_1) || empty($desc_2) || empty($desc_3) || empty($desc_4)) {
                    array_push($errors, "All fields are required.");
                }

                require_once "connection.php";

                // Check if main description already exists in the database
                $sql = "SELECT * FROM about WHERE main_desc = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $main_desc);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    array_push($errors, "Main description already exists.");
                }

                // Display errors if any
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    $targetDir = "./img/";
                    $image = $image2 = $image3 = "";

                    // Handle image upload for `image`
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $image = basename($_FILES['image']['name']);
                        $targetFilePath1 = $targetDir . $image;
                        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath1)) {
                            array_push($errors, "Failed to upload image.");
                        }
                    }

                    // Handle image upload for `image2`
                    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
                        $image2 = basename($_FILES['image2']['name']);
                        $targetFilePath2 = $targetDir . $image2;
                        if (!move_uploaded_file($_FILES["image2"]["tmp_name"], $targetFilePath2)) {
                            array_push($errors, "Failed to upload image2.");
                        }
                    }

                    // Handle image upload for `image3`
                    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
                        $image3 = basename($_FILES['image3']['name']);
                        $targetFilePath3 = $targetDir . $image3;
                        if (!move_uploaded_file($_FILES["image3"]["tmp_name"], $targetFilePath3)) {
                            array_push($errors, "Failed to upload image3.");
                        }
                    }

                    // Check again for errors before inserting into the database
                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    } else {
                        // Insert into the database
                        $sql = "INSERT INTO about (image, image2, image3, main_desc, desc_1, desc_2, desc_3, desc_4) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "ssssssss", $image, $image2, $image3, $main_desc, $desc_1, $desc_2, $desc_3, $desc_4);
                            if (mysqli_stmt_execute($stmt)) {
                                echo "<div class='alert alert-success'>Added successfully</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Failed to add data to the database.</div>";
                            }
                        } else {
                            die("Something went wrong with the database query.");
                        }
                    }
                }
            }
            ?>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Create new admin</h6>



                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Select Images 1 for About Us </label>
                                    <input class="form-control bg-dark" name="image" type="file" id="formFileMultiple" multiple>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Select Images 2 for About Us </label>
                                    <input class="form-control bg-dark" name="image2" type="file" id="formFileMultiple" multiple>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Select Images 3 for About Us </label>
                                    <input class="form-control bg-dark" name="image3" type="file" id="formFileMultiple" multiple>
                                </div>

                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Main Description.</label>
                                    <input type="text" name="main_desc" class="form-control" id="inputEmail3">

                                </div>

                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Description 1</label>
                                    <input type="text" name="desc_1" class="form-control" id="inputEmail3">

                                </div>


                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Description 2</label>
                                    <input type="text" name="desc_2" class="form-control" id="inputEmail3">

                                </div>

                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Description 3</label>
                                    <input type="text" name="desc_3" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Description 4</label>
                                    <input type="text" name="desc_4" class="form-control" id="inputEmail3">

                                </div>

                                <button type="submit" name="add" class="btn btn-primary">Add About Us</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="margin-top:230px;">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">TRAVELER</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="">Ayush</a>
                            <br>Distributed By: <a href="index.php" target="_blank">TRAVELER</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top " style="margin-left:10px;" !important><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib3/chart/chart.min.js"></script>
    <script src="lib3/easing/easing.min.js"></script>
    <script src="lib3/waypoints/waypoints.min.js"></script>
    <script src="lib3/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib3/tempusdominus/js/moment.min.js"></script>
    <script src="lib3/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib3/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main5.js"></script>
</body>

</html>