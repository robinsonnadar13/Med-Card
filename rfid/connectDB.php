<?php
/* Database connection settings */
	$servername = "127.0.0.1:3308";
    $username = "root";		//put your phpmyadmin username.(default is "root")
    $password = "root";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "rfidattendance";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>