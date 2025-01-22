

<?php
include('connection.php');

// Check if the form was submitted
if (isset($_POST['submit'])) {

  // Get the name and image data
  $name = $_POST['name'];
  $image = $_FILES['image'];

  // Validate image (optional, customize as needed)
  $allowed_extensions = array("jpg", "jpeg", "png", "gif");
  $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
  if (!in_array($extension, $allowed_extensions)) {
    echo "Invalid image format. Please upload a jpg, jpeg, png, or gif.";
    exit;
  }

  // Create a unique filename to prevent overwriting
  $new_filename = uniqid() . "." . $extension;

  // Move the uploaded image to a designated directory
  $target_dir = "./img/"; // Adjust the directory path if needed
  $target_file = $target_dir . $new_filename;
  if (move_uploaded_file($image["tmp_name"], $target_file)) {
    // echo "Image uploaded successfully. ";
    header( 'Location: admin-index.php' ) ;
  } else {
    echo "Failed to upload image.";
    exit;
  }

  // Prepare and execute the INSERT query (with prepared statement for security)
  $sql = "INSERT INTO add_package (name, image) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $name, $target_file); // Bind name and image path
  if (mysqli_stmt_execute($stmt)) {
    // echo "Name and image inserted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  mysqli_stmt_close($stmt);

} else {
  echo "Form not submitted.";
}

mysqli_close($conn);
?>
