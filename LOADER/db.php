<?php                

// Enable error reporting on html page
error_reporting(E_ALL);
ini_set('display_errors', '1');

$MYSQL_HOST = "81.19.215.5";
$MYSQL_PORT = "3306";
$MYSQL_DATABASE = "hibrebihercom_database";
$MYSQL_USERNAME = "hibrebihercom_user";
$MYSQL_PASSWORD = "76DNP-N.IYen";

$MYSQLI_CONNECTION = mysqli_connect(
  $MYSQL_HOST . ":" . $MYSQL_PORT,
  $MYSQL_USERNAME,
  $MYSQL_PASSWORD,
  $MYSQL_DATABASE
);

if (mysqli_connect_errno()) 
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
