<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}

if ( isset($_POST['previous'])) {
    header("location: new.php");
}

if ( isset($_POST['go'])) {

    if ( strlen($_POST['phone']) < 1 ) {
        $failure = "Phone is required";
    } 
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {      
      $failure = "Invalid Email.";
    }
    elseif ( strlen($_POST['address']) < 1 ) {
        $failure = "Address is required";
    }
    elseif ( strlen($_POST['country']) < 1 ) {
        $failure = "Country name is required";
    } 
    elseif ( strlen($_POST['postalcode']) < 1 ) {
        $failure = "Postal Code is empty";
    } 
    else{
    
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['country'] = $_POST['country'];
        $_SESSION['postalcode'] = $_POST['postalcode'];
        $_SESSION['email'] = $_POST['email'];
        
        header("Location: medicalhistory.php");
    
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
    <li class="active">Contact information</li>
    <li>Medical History</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Contact information</h2>
    <h3 class="fs-subtitle">Enter the following details</h3>
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
    <input type="number" name="phone" placeholder="Phone" />
    <input type="text" name="email" placeholder="Email" />
    <input type="text" name="address" placeholder="Address" />
    <input type="text" name="country" placeholder="Country" />
    <input type="number" name="postalcode" placeholder="Postal Code" />
    <input type="submit" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="go" class="action-button" value="Next" />
  </fieldset>


</form>
</body>
</html>