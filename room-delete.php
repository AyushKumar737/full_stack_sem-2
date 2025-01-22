<?php
include('connection.php');
error_reporting(0);

$Id = $_GET['id'];
$query="DELETE FROM room WHERE id=".$Id;
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("deleted"); </script>';
    header("Location: room-edit.php");
}
else
{
    echo '<script> alert("not deleted"); </script>';
}
?>

