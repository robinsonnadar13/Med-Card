<?php
require_once "pdo.php";
session_start();

if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}


if ( isset($_POST['go'])) {

if ( strlen($_POST['serialnumber']) < 1 ) {
    $failure = "Scan the card.";
} 
else{
    $_SESSION['serialnumber'] = $_POST['serialnumber'];

    $sql = "SELECT * FROM users
            WHERE serialnumber = :qid ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':qid' => $_POST['serialnumber']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row === false) {
              $failure = "Unregistered Med-Card.";
            }
            else {
                header("Location: medicalhistory1.php?sno=".urlencode($_POST['serialnumber']));
                return;
            }
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
    <!-- <script src="js/new.js"></script> -->
    </head>
<body>
<!-- multistep form -->
<form id="msform" method="post">
  <!-- progressbar -->
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Update Patient Info</h2>
    <h3 class="fs-subtitle">Scan the Card</h3>
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
    <input type="text" name="serialnumber">
    <input type="submit" name="go" class="action-button" value="Next" />
  </fieldset>

</form>
</body>
</html>