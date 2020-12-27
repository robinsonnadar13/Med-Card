<?php
require_once "pdo.php";
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}

if ( isset($_POST['previous'])) {
    header("location: contact.php");
}

if ( isset($_POST['next'])) {

    if ( strlen($_POST['allergies']) < 1 ) {
        $failure = "Allergies field is empty";
    
    } 
    elseif ( strlen($_POST['majordiagnoses']) < 1 ) {
        $failure = "Major Diagnosis field is empty";
    }
    elseif ( strlen($_POST['medication']) < 1 ) {
        $failure = "Medication field is empty";
    } 
    elseif ( strlen($_POST['reason']) < 1 ) {
        $failure = "Reason field is empty";
    } 
    else{
    
        $serialnumber = $_SESSION['serialnumber'];
        $_SESSION['allergies'] = $_POST['allergies'];
        $_SESSION['majordiagnoses'] = $_POST['majordiagnoses'];
        $_SESSION['medication'] = $_POST['medication'];
        $_SESSION['reason'] = $_POST['reason'];

        date_default_timezone_set("Asia/Kolkata");
        $lastupdatetime = date("h:i:sa");
        $_SESSION['lastupdatetime'] = $lastupdatetime;
        $lastupdatedate = date("Y-m-d");
        $_SESSION['lastupdatedate'] = $lastupdatedate;
        $age = floor((time() - strtotime($dob)) / 31556926);
        $_SESSION['age'] = $age;
    
          $sql = "UPDATE users
          SET allergies = :allergies, 
          majordiagnoses = :majordiagnoses, 
          medication = :medication,
          lastupdatetime = :lastupdatetime,
          lastupdatedate = :lastupdatedate,
          reason = :reason
          WHERE serialnumber = :sn ";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
          ':sn' => $serialnumber,
          ':allergies' => $_POST['allergies'],
          ':majordiagnoses' => $_POST['majordiagnoses'],
          ':medication' => $_POST['medication'],
          ':lastupdatetime' => $lastupdatetime,
          ':lastupdatedate' => $lastupdatedate,
          ':reason' => $_POST['reason']));
          header("Location: mail1.php");  
    }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/new.css">
    <script src="js/new.js"></script>
    </head>
<body>
<?php include'header.php';?>
<!-- multistep form -->
<form id="msform" method="post">
  <!-- progressbar -->
  <ul id="progressbar">
    <li>Demographics</li>
    <li>Contact information</li>
    <li class="active">Medical History</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Medical History</h2>
    <h3 class="fs-subtitle">Enter current treatment details</h3>
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
    <input type="text" name="allergies" placeholder="Allergies"></input>
    <input type="text" name="majordiagnoses" placeholder="Major Diagnoses" />
    <input type="text" name="medication" placeholder="Ongoing Medication" />
    <input type="text" name="reason" placeholder="Reason for last visit....." />
    <input type="submit" name="previous" class="action-button" value="Previous" />
    <input type="submit" name="next" class="action-button" value="Next" />
  </fieldset>

</form>
</body>
</html>