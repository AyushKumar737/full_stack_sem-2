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
        h1 {
            display: block;
            font-size: 2em;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
            color: black;
        }
    </style>
</head>

<body>

    <h1 style="text-align:center"> Report </h1>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                            <th scope="col">Id</th>
                            <th scope="col">fname</th>
                            <th scope="col">email</th>
                            <th scope="col">subject</th>
                            <th scope="col">message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Feedback</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                            // echo "connected";
                        } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM feedback";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["Id"] . "</td>
                                        <td>" . $row["fname"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["subject"] . "</td>
                                        <td>" . $row["message"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">subject</th>
                            <th scope="col">message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Query</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                        } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM querry";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["Id"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["subject"] . "</td>
                                        <td>" . $row["message"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Place</th>
                            <th scope="col">Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Packages</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                        } else {
                            echo "error";
                        }
                        $sql = "SELECT add_package.*,destination.name as destinationName FROM add_package LEFT JOIN destination on destination.id = add_package.dname";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["Id"] . "</td> 
                                        <td>" . $row["destinationName"] . "</td>
                                        <td>" . $row["pname"] . "</td>
                                        <td>" . $row["price"] . "</td>
                                        <td>" . $row["image"] . "</td>
                                        <td>" . $row["place"] . "</td>
                                        <td>" . $row["days"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                    </thead>
                    <tbody>
                        <h2>Destination</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                        } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM destination";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["id"] . "</td> 
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["image"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">first name</th>
                            <th scope="col">last name</th>
                            <th scope="col">check_in</th>
                            <th scope="col">check_out</th>
                            <th scope="col">select_package</th>
                            <th scope="col">adults</th>
                            <th scope="col">child</th>
                            <th scope="col">email</th>
                            <th scope="col">mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Booking</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                        } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM package_booking";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            if ($row['approve_status'] == 1) {
                                $button = "Approved";
                            } else {
                                $button = "<a class='btn btn-success btn-sm' href='aprove-booking.php?Id=" . $row['p_id'] . "'>Approve</a>";
                            }
                            echo "<tr>
                                        
                                        <td>" . $row["p_id"] . "</td> 
                                        <td>" . $row["first_name"] . "</td>
                                        <td>" . $row["last_name"] . "</td>
                                        <td>" . $row["check_in"] . "</td>
                                        <td>" . $row["check_out"] . "</td>
                                        <td>" . $row["select_package"] . "</td>
                                        <td>" . $row["adults"] . "</td>
                                        <td>" . $row["child"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["mobile"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">

               </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">mobile</th>
                            <th scope="col">address</th>
                            <th scope="col">password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Users</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                           } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM registration";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["mobile"] . "</td>
                                        <td>" . $row["address"] . "</td>
                                        <td>" . $row["password"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">

                </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col"> Room Name</th>
                            <th scope="col">Bed</th>
                            <th scope="col">Bathroom</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2>All Rooms</h2>
                        <?php
                        include('connection.php');

                        if ($conn) {
                            } else {
                            echo "error";
                        }
                        $sql = "SELECT * FROM room";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "error";
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        
                                        <td>" . $row["id"] . "</td> 
                                        <td>" . $row["image"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["bed"] . "</td>
                                        <td>" . $row["bathroom"] . "</td>
                                        <td>" . $row["description"] . "</td>
                                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>