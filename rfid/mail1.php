<?php

require_once "pdo.php";
session_start();
$serialnumber = $_SESSION['serialnumber'];

$sql = "SELECT * FROM users WHERE serialnumber = $serialnumber";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':ag' => $_POST['email'],
            ':rn' => $_POST['name'],
            ':em' => $_POST['medication'],
            ':pw' => $_POST['reason']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


$email = $row['email'];
$User = $row['name'];
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
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Update from Med-Card';
$mail->Body    = '<!DOCTYPE html>
<html>
<title>Med-Card</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">

  <div class="w3-card-4" style="width:50%;">
    <header class="w3-container w3-blue">
      <h1>Med-Card</h1>
    </header>

    <div class="w3-container">
    	<h3>Hi <b>'.$User.'</b>,</h3>
      <p>Your Med-Card account was updated.</p>
      <p><b>Details of Update:</b></p>
      <p><b>Date</b> : At '.$lastupdatetime.' on '.$lastupdatedate.'</p>
      <p><b>Allergies:</b> '.$_SESSION["allergies"].'</p>
      <p><b>Major Diagnosis:</b> '.$_SESSION["majordiagnoses"].'</p>
      <p><b>Ongoing Medication:</b> '.$_SESSION["medication"].'</p>
      <p><b>Reason for Last Visit:</b> '.$_SESSION["reason"].'</p>
      <p>If it was not you please revert back.</p>
    </div>

    <footer class="w3-container w3-blue">
      <h4>Thanks,</h4>
      <h4>Med-Card team</h4>
    </footer>
  </div>
</div>

</body>
</html>
';




if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location: index.php");
}