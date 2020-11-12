<?php
    $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    $id= $_REQUEST['delId'];
     $sql = "delete FROM notice where Date='$id' ";
    if(mysqli_query($link,$sql)){
        header('location: browse news.php?msg=rds');
    exit;
    }

}
?>