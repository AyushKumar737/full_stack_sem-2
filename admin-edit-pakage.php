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

<?php
require('connection.php');

if (isset($_POST['submit'])) {

    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $price = $_POST['price'];
    $image = $_POST['image'];

    $select_product_name = mysqli_query($conn, "SELECT name FROM `add_package` WHERE pname = '$pname'") or die('query failed');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'product name already added';
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `add_package`(pname, price, image) VALUES('$pname', '$price', '$image')") or die('query failed');

        if ($add_product_query) {
            if ($image_size > 2000000) {
                $message[] = 'image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'product added successfully!';
            }
        } else {
            $message[] = 'product could not be added!';
        }
    }
}
?>

<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissiable fade show" role="alert">
        <strong>Hey!</strong><?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
<?php
    unset($_SESSION['message']);
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

    <Style>
        .dest {
            color: white;
            background-color: #2b2a27;
        }
    </Style>
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
                    <a href="admin-index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>View Packages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-view-pakage.php" class="nav-item nav-link">view user booking</a>
                            <a href="admin-view-details.php" class="nav-item nav-link">View Package Details</a>
                            <!-- <a href="admin-view-room.php" class="nav-item nav-link">View Room Services</a> -->
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Edit Packages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-edit-pakage.php" class="nav-item nav-link active">Add Packages</a>
                            <a href="admin-edit-detail.php" class="nav-item nav-link">Edit Package Details</a>
                            <!-- <a href="admin-edit-room.php" class="nav-item nav-link">Edit Room Services</a> -->
                        </div>
                    </div>

                    <?php if ($_SESSION['admin_role'] == 'Admin') {  ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Admin section</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="admin-blank.php" class="nav-item nav-link"></i>Add admin</a>
                                <a href="admin-update.php" class="nav-item nav-link">Edit admin details</a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Destination</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="desitination_add.php" class="nav-item nav-link"></i>Add Destination</a>
                            <a href="admin_view_destination.php" class="nav-item nav-link">view destination</a>
                        </div>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Room</a>
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
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>

            </nav>
            <!-- Navbar End -->

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Form to add package</h6>


                            <form action="admin_package_add.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Select Destination</label>
                                    <?php
                                    $query = "SELECT * FROM destination";
                                    $query_run = mysqli_query($conn, $query);


                                    ?>
                                    <select name="destination" class="form-control" id="destination" style="background-color: black; color:white;">
                                        <option value="" selected hidden> Select Destination</option>
                                        <?php if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>" class="dest"><?php echo $row['name']; ?></option>
                                        <?php
                                            }
                                        } ?>

                                    </select>
                                    <span class="select-arrow"></span>

                                </div>


                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Package Name</label>
                                    <input type="text" name="pname" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter Package Price</label>
                                    <input type="text" name="price" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Select Images for Package</label>
                                    <input class="form-control bg-dark" name="image" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter place</label>
                                    <input type="text" name="place" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Enter days</label>
                                    <input type="text" name="days" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 1</label>
                                    <input class="form-control bg-dark" name="image1" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day1 </label>
                                    <input type="text" name="day1" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">name 1</label>
                                    <input type="text" name="name1" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Description 1</label>
                                    <input type="text" name="description1" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 2</label>
                                    <input class="form-control bg-dark" name="image2" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 2</label>
                                    <input type="text" name="day2" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 2</label>
                                    <input type="text" name="name2" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 2</label>
                                    <input type="text" name="description2" class="form-control" id="inputEmail3">
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 3</label>
                                    <input class="form-control bg-dark" name="image3" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 3</label>
                                    <input type="text" name="day3" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 3</label>
                                    <input type="text" name="name3" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 3</label>
                                    <input type="text" name="description3" class="form-control" id="inputEmail3">
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 4</label>
                                    <input class="form-control bg-dark" name="image4" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 4</label>
                                    <input type="text" name="day4" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 4</label>
                                    <input type="text" name="name4" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 4</label>
                                    <input type="text" name="description4" class="form-control" id="inputEmail3">
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 5</label>
                                    <input class="form-control bg-dark" name="image5" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 5</label>
                                    <input type="text" name="day5" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 5</label>
                                    <input type="text" name="name5" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 5</label>
                                    <input type="text" name="description5" class="form-control" id="inputEmail3">
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 6</label>
                                    <input class="form-control bg-dark" name="image6" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 6</label>
                                    <input type="text" name="day6" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 6</label>
                                    <input type="text" name="name6" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 6</label>
                                    <input type="text" name="description6" class="form-control" id="inputEmail3">
                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 7</label>

                                    <input class="form-control bg-dark" value="" name="image7" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 7</label>
                                    <input type="text" name="day7" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 7</label>
                                    <input type="text" value="" name="name7" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 7</label>
                                    <input type="text" value="" name="desc7" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 8</label>
                                    <input class="form-control bg-dark" value="" name="image8" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 8</label>
                                    <input type="text" name="day8" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 8</label>
                                    <input type="text" value="" name="name8" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 8</label>
                                    <input type="text" value="" name="desc8" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 9</label>
                                    <input class="form-control bg-dark" value="" name="image9" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 9</label>
                                    <input type="text" name="day9" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 9</label>
                                    <input type="text" value="" name="name9" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 9</label>
                                    <input type="text" value="" name="desc9" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 10</label>
                                    <input class="form-control bg-dark" value="" name="image10" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 10</label>
                                    <input type="text" name="day10" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 10</label>
                                    <input type="text" value="" name="name10" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 10</label>
                                    <input type="text" value="" name="desc10" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 11</label>
                                    <input class="form-control bg-dark" value="" name="image11" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 11</label>
                                    <input type="text" name="day11" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 11</label>
                                    <input type="text" value="" name="name11" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 6</label>
                                    <input type="text" value="" name="desc11" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Image 12</label>
                                    <input class="form-control bg-dark" value="" name="image12" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mb-3">

                                    <label for="packagename" class="form-label">Day 12</label>
                                    <input type="text" name="day12" value="" class="form-control" id="inputEmail3">

                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">name 12</label>
                                    <input type="text" value="" name="name12" class="form-control" id="inputEmail3">
                                </div>
                                <div class="mb-3">
                                    <label for="packagename" class="form-label">Description 12</label>
                                    <input type="text" value="" name="desc12" class="form-control" id="inputEmail3">
                                </div>

                                <button type="submit" name="add" class="btn btn-primary">Add package</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Form End -->



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
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
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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