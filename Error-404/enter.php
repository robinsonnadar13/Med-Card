<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
$ht = $_POST['ht'];
$wt = $_POST['wt'];
$bp = $_POST['bp'];
$dname = $_POST['dname'];
$ds = $_POST['ds'];
$dp = $_POST['dp'];
$ins = $_POST['ins'];
$al1 =  $_POST['al1'];
$sh = $_POST['sh'];

if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "youtube";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT phone From enter Where phone = ? Limit 1";
     $INSERT = "INSERT Into enter (username, password, gender, email, phoneCode, phone,ht,wt,bp,dname,ds,dp,ins,al1,sh) values( ?,?,?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $phone);
     $stmt->execute();
     $stmt->bind_result($phone);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssiisssssssss", $username, $password,$gender, $email, $phoneCode, $phone,$ht,$wt,$bp,$dname,$ds,$dp,$ins,$al1,$sh);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this Phone";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
