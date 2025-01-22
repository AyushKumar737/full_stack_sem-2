<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['Id'];
$query="UPDATE  feedback set show_feedback=1 WHERE Id='$Id' ";	
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("Showed"); </script>';
    header("Location: admin-index.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>