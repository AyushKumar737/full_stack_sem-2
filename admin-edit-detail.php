<?php
require('connection.php');
?>
<?php
include("connection.php");
session_start();
if (!isset($_SESSION['Adminid'])) {
    header("location: Admin-login.php");
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
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Edit Packages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin-edit-pakage.php" class="nav-item nav-link">Add Packages</a>
                            <a href="admin-edit-detail.php" class="nav-item nav-link active">Edit Package Details</a>
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
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Room</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admi-room.php" class="nav-item nav-link"></i>Add Room</a>
                            <a href="room-edit.php" class="nav-item nav-link">view Room</a>
                            <a href="room-update.php" class="nav-item nav-link">Update Room</a>
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
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">



                <div class="col-sm-12 col-xl-6" style="margin-bottom: 250px;">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Edit Packages</h6>
                        <?php

                        if (isset($_GET['Id'])) {
                            $post_id = $_GET['Id'];
                            $query = "SELECT * FROM add_package WHERE Id='$post_id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $row = mysqli_fetch_array($query_run);

                        ?>



                                <form action="admin-table-package-edit.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="post_id" value="<?php echo $row['Id'] ?>">
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Select Destination</label>
                                        <?php
                                        $dquery = "SELECT * FROM destination";
                                        $dquery_run = mysqli_query($conn, $dquery);


                                        ?>
                                        <select name="destination" class="form-control" id="destination" style="background-color: black; color:white;">
                                            <option value="" selected hidden> Select Destination</option>
                                            <?php if (mysqli_num_rows($query_run) > 0) {
                                                while ($Drow = mysqli_fetch_assoc($dquery_run)) {
                                            ?>
                                                    <option value="<?php echo $Drow['id']; ?>" <?php if ($row['dname'] == $Drow['id']) {
                                                                                                    echo 'selected="selected"';
                                                                                                } ?> class="dest"><?php echo $Drow['name']; ?></option>
                                            <?php
                                                }
                                            } ?>

                                        </select>
                                        <span class="select-arrow"></span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Enter Package Name</label>
                                        <input type="text" name="pname" value="<?php echo $row['pname']; ?>" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Enter Package Price</label>
                                        <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Select Images for Package</label>
                                        <input type="hidden" name="old_image" value="<?php echo $row['image'] ?>" />
                                        <input class="form-control bg-dark" name="image" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Enter place</label>
                                        <input type="text" name="place" value="<?php echo $row['place'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Enter days</label>
                                        <input type="text" name="days" value="<?php echo $row['days'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 1</label>
                                        <input type="hidden" name="old_image1" value="<?php echo $row['image1'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image1'] ?>" name="image1" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 1</label>
                                        <input type="text" name="day1" value="<?php echo $row['day1'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">name 1</label>
                                        <input type="text" name="name1" value="<?php echo $row['name1'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Description 1</label>
                                        <input type="text" value="<?php echo $row['description1'] ?>" name="desc1" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 2</label>
                                        <input type="hidden" name="old_image2" value="<?php echo $row['image2'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image2'] ?>" name="image2" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 2</label>
                                        <input type="text" name="day2" value="<?php echo $row['day2'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 2</label>
                                        <input type="text" name="name2" value="<?php echo $row['name2'] ?>" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 2</label>
                                        <input type="text" value="<?php echo $row['description2'] ?>" name="desc2" class="form-control" id="inputEmail3">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 3</label>
                                        <input type="hidden" name="old_image3" value="<?php echo $row['image3'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image3'] ?>" name="image3" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 3</label>
                                        <input type="text" name="day3" value="<?php echo $row['day3'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 3</label>
                                        <input type="text" name="name3" value="<?php echo $row['name3'] ?>" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 3</label>
                                        <input type="text" value="<?php echo $row['description3'] ?>" name="desc3" class="form-control" id="inputEmail3">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 4</label>
                                        <input type="hidden" name="old_image4" value="<?php echo $row['image4'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image4'] ?>" name="image4" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 4</label>
                                        <input type="text" name="day4" value="<?php echo $row['day4'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 4</label>
                                        <input type="text" name="name4" value="<?php echo $row['name4'] ?>" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 4</label>
                                        <input type="text" value="<?php echo $row['description4'] ?>" name="desc4" class="form-control" id="inputEmail3">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 5</label>
                                        <input type="hidden" name="old_image5" value="<?php echo $row['image5'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image5'] ?>" name="image5" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 5</label>
                                        <input type="text" name="day5" value="<?php echo $row['day5'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 5</label>
                                        <input type="text" name="name5" value="<?php echo $row['name5'] ?>" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 5</label>
                                        <input type="text" value="<?php echo $row['description5'] ?>" name="desc5" class="form-control" id="inputEmail3">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 6</label>
                                        <input type="hidden" name="old_image6" value="<?php echo $row['image6'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image6'] ?>" name="image6" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 6</label>
                                        <input type="text" name="day6" value="<?php echo $row['day6'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 6</label>
                                        <input type="text" value="<?php echo $row['name6'] ?>" name="name6" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 6</label>
                                        <input type="text" value="<?php echo $row['description6'] ?>" name="desc6" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 7</label>
                                        <input type="hidden" name="old_image7" value="<?php echo $row['image7'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image7'] ?>" name="image7" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 7</label>
                                        <input type="text" name="day7" value="<?php echo $row['day7'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 7</label>
                                        <input type="text" value="<?php echo $row['name7'] ?>" name="name7" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 7</label>
                                        <input type="text" value="<?php echo $row['description7'] ?>" name="desc7" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 8</label>
                                        <input type="hidden" name="old_image8" value="<?php echo $row['image8'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image8'] ?>" name="image8" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 8</label>
                                        <input type="text" name="day8" value="<?php echo $row['day8'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 8</label>
                                        <input type="text" value="<?php echo $row['name8'] ?>" name="name8" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 8</label>
                                        <input type="text" value="<?php echo $row['description8'] ?>" name="desc8" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 9</label>
                                        <input type="hidden" name="old_image9" value="<?php echo $row['image9'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image9'] ?>" name="image9" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 9</label>
                                        <input type="text" name="day9" value="<?php echo $row['day9'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 9</label>
                                        <input type="text" value="<?php echo $row['name9'] ?>" name="name9" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 9</label>
                                        <input type="text" value="<?php echo $row['description9'] ?>" name="desc9" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 10</label>
                                        <input type="hidden" name="old_image10" value="<?php echo $row['image10'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image10'] ?>" name="image10" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 10</label>
                                        <input type="text" name="day10" value="<?php echo $row['day10'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 10</label>
                                        <input type="text" value="<?php echo $row['name10'] ?>" name="name10" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 10</label>
                                        <input type="text" value="<?php echo $row['description10'] ?>" name="desc10" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 11</label>
                                        <input type="hidden" name="old_image11" value="<?php echo $row['image11'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image11'] ?>" name="image11" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 11</label>
                                        <input type="text" name="day11" value="<?php echo $row['day11'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 11</label>
                                        <input type="text" value="<?php echo $row['name11'] ?>" name="name11" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 6</label>
                                        <input type="text" value="<?php echo $row['description11'] ?>" name="desc11" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Image 12</label>
                                        <input type="hidden" name="old_image12" value="<?php echo $row['image12'] ?>" />
                                        <input class="form-control bg-dark" value="<?php echo $row['image12'] ?>" name="image12" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">

                                        <label for="packagename" class="form-label">Day 12</label>
                                        <input type="text" name="day12" value="<?php echo $row['day12'] ?>" class="form-control" id="inputEmail3">

                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">name 12</label>
                                        <input type="text" value="<?php echo $row['name12'] ?>" name="name12" class="form-control" id="inputEmail3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="packagename" class="form-label">Description 12</label>
                                        <input type="text" value="<?php echo $row['description12'] ?>" name="desc12" class="form-control" id="inputEmail3">
                                    </div>


                                    <button type="submit" name="update" class="btn btn-primary">Update package</button>
                                </form>
                            <?php
                            } else {
                            ?>
                                <h4>No package found</h4>

                        <?php
                            }
                        } else {
                            echo '<h1 class="mb-20">please select package from Table</h1>';
                        }


                        ?>
                    </div>
                </div>
            </div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="margin-top:467px;">
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