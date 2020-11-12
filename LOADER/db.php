<?php                

// Enable error reporting on html page
error_reporting(E_ALL);
ini_set('display_errors', '1');

$MYSQL_HOST = "81.19.215.5";
$MYSQL_PORT = "3306";
$MYSQL_DATABASE = "hibrebihercom_hibrebihercomdatabase";
$MYSQL_USERNAME = "hibrebihercom_hibrebihercomuser";
$MYSQL_PASSWORD = "hibrebihercom_123456789";

$MYSQLI_CONNECTION = mysqli_connect(
  $MYSQL_HOST . ":" . $MYSQL_PORT,
  $MYSQL_DATABASE,
  $MYSQL_USERNAME,
  $MYSQL_PASSWORD
);

if (mysqli_connect_errno()) 
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
