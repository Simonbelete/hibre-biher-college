<?php

//database_connection.php
 $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
if($connect === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>