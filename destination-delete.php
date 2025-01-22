<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['id'];
$query="DELETE FROM destination WHERE id='$Id' ";	
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("deleted"); </script>';
    header("Location: admin_view_destination.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>

