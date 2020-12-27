<?php
require_once "pdo.php";
session_start();

if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}

$serialnumber = $_SESSION['serialnumber'];

    $sql = "SELECT * FROM users
            WHERE serialnumber = :qid ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':qid' => $serialnumber));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


if ( isset($_POST['go'])) {


if ( strlen($_POST['name']) < 1 ) {
    $failure = "Name is required";

} 
elseif (preg_match('~[0-9]~', $_POST['name'])){
    $failure = "Name should not contain any numeric value.";
}
elseif ( strlen($_POST['gender']) < 1 ) {
    $failure = "Gender is required";
}
elseif ( strlen($_POST['bloodgroup']) < 1 ) {
    $failure = "Blood Group is required";
} 
elseif ( strlen($_POST['familydoctor']) < 1 ) {
    $failure = "Family Doctor field is empty";
} 
else{

    $_SESSION['serialnumber'] = $_POST['serialnumber'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['bloodgroup'] = $_POST['bloodgroup'];
    $_SESSION['familydoctor'] = $_POST['familydoctor'];
    $_SESSION['dob'] = $_POST['dob'];
    
    header("Location: contact1.php");

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
<?php include'header.php';?>
<!-- multistep form -->
<form id="msform" method="post">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Demographics</li>
    <li>Contact information</li>
    <li>Medical History</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">patients demographic data</h2>
    <h3 class="fs-subtitle">Scan Card and Enter the following details</h3>
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
    <?php
                        include 'connectDB.php';
                        $stmt = $conn->prepare("SELECT * FROM users where serialnumber = ? ");
                        $stmt->bind_param("i",$serialnumber); 
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while  ($row = $result->fetch_assoc()):
            
                    ?>

    <input type="text" name="name" placeholder="Name" /><?php $row['name']; ?>
    <input type="date" id="dob" name="dob">
    <input type="text" name="gender" placeholder="Gender" />
    <input type="text" name="bloodgroup" placeholder="Blood Group" />
    <input type="text" name="familydoctor" placeholder="Family Doctor" />
    <input type="submit" name="go" class="action-button" value="Next" />
  </fieldset>
  <?php
      
    endwhile;
    // if  ($row == 0){
                
  ?>
</form>
</body>
</html>