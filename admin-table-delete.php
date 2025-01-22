<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['Id'];
$query="DELETE FROM feedback WHERE Id='$Id' ";	
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("deleted"); </script>';
    header("Location: admin-table.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>

