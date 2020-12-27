<?php
require_once "pdo.php";
session_start();

if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}

if ( isset($_POST['adduser'])) {

	$gender = test_input($_POST["gender"]);
	$_SESSION['gender'] = $gender;

	echo'<script>console.log($gender);</script>;';
	
    if ( strlen($_POST['username']) < 1 ) {
        $failure = "User Name is required";
    } 
    elseif ( strlen($_POST['serialnumber']) < 5 ) {
        $failure = "Serial number is required";
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {      
        $failure = "Invalid Email.";
    }
    else{
          $sql = "INSERT INTO users (username, serialnumber, gender, email)
          VALUES (:username, :serialnumber, :gender, :email)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
          ':username' => $_POST['username'],
		  ':serialnumber' => $_POST['serialnumber'],
		  ':gender' => $_POST['gender'],
          ':email' => $_POST['email']));
        //   ':bloodgroup' => $_POST['bloodgroup']));
          $comment = "Successfully registered.";    
    }
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	        crossorigin="anonymous">
	</script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_users.js"></script>
	<!-- <script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    },5000);
	  });
	</script> -->
</head>
<body>
<?php include'header.php';?>
<main>
	<h1 class="slideInDown animated">Add a new User or update his information <br> or remove him</h1>
	<div class="form-style-5 slideInDown animated">
	<?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
		<form enctype="multipart/form-data" method="post">
			<!-- <div class="alert_user"><?php htmlentities($failure) ?></div> -->
			<fieldset>
				<legend><span class="number">1</span> User Info</legend>
				<input type="text" name="serialnumber" id="number" placeholder="Serial Number...">
				<input type="text" name="username" id="name" placeholder="User Name...">
				<input type="email" name="email" id="email" placeholder="User Email...">
			</fieldset>
			<fieldset>
			<legend><span class="number">2</span> Additional Info</legend>
			<label>
				<!-- <label for="blood"><b>Blood Group:</b></label>
                    <select class="dev_sel" name="blood" id="dev_sel" style="color: #000;">
                      <option value="0">A+</option>
                      <option value="1">B+</option>
                      <option value="2">O+</option>
					  <option value="3">AB+</option>
					  <option value="4">A-</option>
                      <option value="5">B-</option>
                      <option value="6">O-</option>
					  <option value="7">AB-</option>
                    </select> -->
					<label for="blood"><b>Gender:</b></label>
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> class="gender" value="Male">Male
				    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> class="gender" value="Female">Female
	      	        </label >
			        </fieldset>
			<button type="button" name="adduser">Add User</button>
			<button type="button" name="user_upd" class="user_upd">Update User</button>
			<button type="button" name="user_rmo" class="user_rmo">Remove User</button>
		</form>
	</div>

	<!-- User table -->
	<div class="section">
		
		<div class="slideInRight animated">
			<div id="manage_users"></div>
		</div>
	</div>
</main>
</body>
</html>