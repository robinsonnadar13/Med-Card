<?php

require_once "pdo.php";
session_start();

$email = $_SESSION['email'];
$User = $_SESSION['name'];
$lastupdatedate = $_SESSION['lastupdatedate'];
$lastupdatetime = $_SESSION['lastupdatetime'];
$age = $_SESSION['age'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'quizzoneforyou@gmail.com';                 // SMTP username
$mail->Password = 'quizzoneforyou810@';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('quizzoneforyou@gmail.com', 'Med-Card');
$mail->addAddress($email, $User);     // Add a recipient

// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
if ($age <= 16){
$mail->addAttachment('icons/vaccines.jpg', 'Vaccine.jpg');    // Optional name
}
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Update from Med-Card';
$mail->Body    = "Hii ".$User.", Your Med-Card account was successfully created on ".$lastupdatedate." at ".$lastupdatetime.". If it wasn't you please revert back.";


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location: index.php");
}