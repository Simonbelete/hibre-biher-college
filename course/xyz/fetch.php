


<?php
//fetch.php
 session_start();
  if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
    if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];
    $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
    $query = "SELECT * FROM course";
    $result = mysqli_query($connect, $query);
    $output = array();
    while($row = mysqli_fetch_assoc($result))
    {
     $output[] = $row;
    }
    echo json_encode($output);
    }} else{  header('location:../../index.php'); }
?>