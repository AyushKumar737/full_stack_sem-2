<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['p_id'];
$query="DELETE FROM package_booking WHERE p_id=".$Id;
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("deleted"); </script>';
    header("Location: admin-view-pakage.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>

