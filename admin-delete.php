<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['Id'];
$query="DELETE FROM admin WHERE Id='$Id' ";	
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("deleted"); </script>';
    header("Location: admin-index.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>