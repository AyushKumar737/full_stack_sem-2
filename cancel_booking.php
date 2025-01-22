<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include PHPMailer files
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

// Database connection
include('connection.php');
error_reporting(E_ALL);

if (!isset($_GET['p_id']) || empty($_GET['p_id'])) {
    die('Invalid or missing package ID.');
}

$p_id = intval($_GET['p_id']);

// Fetch user email
$query = "SELECT * FROM package_booking WHERE p_id = $p_id";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_array($query_run);
    $email = $row['email'];
} else {
    die('No record found for the provided package ID.');
}

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tanu12149@gmail.com'; // Replace with your email
    $mail->Password = 'eqoszipagmlfaina';     // Replace with your App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('tanu12149@gmail.com', 'Traveler');
    $mail->addAddress($email, 'User');
    $mail->addAttachment('terms.pdf');

    $mail->isHTML(true);
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = 'Hi User, Thank you for booking a package from our website. We are glad to serve you.<br>Please read our terms & conditions carefully.';

    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debugging for production
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Delete record
$query = "DELETE FROM package_booking WHERE p_id = $p_id";
if (mysqli_query($conn, $query)) {
    header("Location: your-booking.php");
    exit;
} else {
    echo 'Error deleting record: ' . mysqli_error($conn);
}
?>
