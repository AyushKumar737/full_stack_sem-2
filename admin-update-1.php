<?php
ini_set('display_errors', '1');
include('connection.php');
session_start();


if (isset($_POST['update'])) {
    $post_id = $_POST['post_id'];
    $aname = $_POST['Username'];
    $admin_role = $_POST['admin_role'];
    $apass = $_POST['Password'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];

    $targetDir = "./img/";                   
    $Image = $_FILES['Image']['name'];
    if (!empty($Image)) {
        $fileName = basename($_FILES['Image']['name']);
        $targetFilePath1 = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFilePath1)) {

            $update_filename1 = $fileName;
        }
    }


    $errors = array();

    if (empty($aname) or empty($apass)) {
        array_push($errors, "all fields are reqiured");
    }

    if (strlen($apass) < 8) {
        array_push($errors, "password must be 8 character long");
    }
    $sql = "SELECT * FROM admin WHERE Username = '$aname'";
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {


       $query = "UPDATE admin SET Username='$aname', admin_role='$admin_role',mobile='$mobile',email='$email',Image='$Image' ,Password='$apass' WHERE Id='$post_id' ";
       $query_run = mysqli_query($conn, $query);

        if ($query_run) {

            $_SESSION['message'] = "Admin updated succesfully";
            header('Location: admin-index.php?Id=' . $post_id);
            exit(0);
        } else {
            $_SESSION['message'] = "Admin not updates succesfully";
            header('Location: admin-index.php?Id=' . $post_id);
            exit(0);
        }
    }
}
?>