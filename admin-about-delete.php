<?php
include('connection.php'); // Include the database connection
error_reporting(0);

if (isset($_GET['a_id'])) {
    $a_id = intval($_GET['a_id']); // Sanitize the input to ensure it's a valid integer

    // Prepare the delete query
    $query = "DELETE FROM about WHERE a_id = ?";
    $stmt = $conn->prepare($query); // Use a prepared statement to prevent SQL injection
    $stmt->bind_param("i", $a_id);

    if ($stmt->execute()) {
        echo '<script>alert("Record deleted successfully");</script>';
        header("Location: admin-view-details.php");
        exit(); // Stop further script execution after redirect
    } else {
        echo '<script>alert("Error: Record not deleted.");</script>';
    }
} else {
    echo '<script>alert("Error: a_id parameter is missing.");</script>';
    header("Location: admin-view-about.php");
    exit();
}
