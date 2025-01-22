<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

// Include database connection
include('connection.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Validate and sanitize GET parameter
if (!isset($_GET['Id']) || empty($_GET['Id'])) {
    die('Invalid or missing package ID.');
}

$Id = intval($_GET['Id']); // Sanitize input

// Update query to approve the package booking
$query = "UPDATE package_booking SET approve_status = 1 WHERE p_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $Id);
$query_run = $stmt->execute();

if ($query_run) {
    // Fetch the user email for the approved booking
    $query = "SELECT email FROM package_booking WHERE p_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $Id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

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

            // Email settings
            $mail->setFrom('tanu12149@gmail.com', 'Traveler'); // Corrected email
            $mail->addAddress($email, 'User');
            $mail->addAttachment('terms.pdf'); // Ensure this file exists

            $mail->isHTML(true);
            $mail->Subject = 'Booking Confirmation';
            $mail->Body = 'Hi User, Thank you for booking a package from our website. We are glad to serve you.<br>Please read our terms & conditions carefully.';

            // Enable debugging
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No email found for the provided package ID.';
    }
} else {
    echo 'Error updating booking: ' . $conn->error;
}

// Redirect or display appropriate message
if ($query_run) {
    echo '<script> alert("Approved"); </script>';
    header("Location: admin-view-pakage.php");
    exit;
} else {
    echo '<script> alert("Approval failed."); </script>';
}
?>
