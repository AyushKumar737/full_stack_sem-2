<?php
include('connection.php');

if(isset($_POST['update']))
{
    $post_id = $_POST['post_id'];
    $aname = $_POST['Username'];
    $apass = $_POST['Password'];
    $errors = array();

						if(empty($aname) OR empty($apass))
						{
							array_push($errors,"all fields are reqiured");
						}
						
						if (strlen($apass)<8)
						{
							array_push($errors,"password must be 8 character long");
						}
						
						require_once "connection.php";
						$sql = "SELECT * FROM admin WHERE Username = '$aname'";
						$result = mysqli_query($conn, $sql);
						$rowcount = mysqli_num_rows($result);
						if($rowcount>0)
						{
							array_push($errors, "Username is not available");
                            
						}
						if(count($errors)>0)
						{
							foreach ($errors as $error) {
								echo "<div class='alert alert-danger'>$error</div>";
							}
						}
						else
						{

   
    $query = "UPDATE admin SET Username='$aname', Password='$apass' WHERE Id='$post_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        
        $_SESSION['message'] = "Admin updated succesfully";
        header('Location: admin-index.php?Id='.$post_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin not updates succesfully";
        header('Location: admin-update.php?Id='.$post_id);
        exit(0);
    }
}
}



?>