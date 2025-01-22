<?php
//use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
function send_email($toemail='',$message='',$subject='')
{


    //use PHPMailer\PHPMailer\PHPMailer;

//require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

$mail = new PHPMailer();
// configure an SMTP
$mail->isSMTP();
$mail->Host = 'mail.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'traveller.tour.331@gmail.com';
$mail->Password = 'Ayush@12149';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('traveller.tour.331@gmail.com', 'Your Hotel');
$mail->addAddress('receiver@gmail.com', 'Me');
$mail->Subject = 'Thanks for choosing Our Hotel!';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
$mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
// add attachment 
// just add the '/path/to/file.pdf'
// $attachmentPath = './confirmations/yourbooking.pdf';
// if (file_exists($attachmentPath)) {
//     $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
// }

// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}