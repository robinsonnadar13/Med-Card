<?php
$pdo = new PDO('mysql:host=localhost;port=3308;dbname=rfidattendance', 'root','root');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
