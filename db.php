<?php

  // Show All Errors 
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // error_reporting(0);

date_default_timezone_set('Asia/Dhaka');
$date_time = date('Y-m-d H:i:s');   
$date_today = date('Y-m-d'); 

// MYSQLI Connection
$db_host = "localhost";
$db_name = "grs";
$db_username = "root";
$db_user_pass = "";
$con = mysqli_connect($db_host , $db_username, $db_user_pass , $db_name);
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// PDO Connection
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "grs";

try {
  $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}

?>
