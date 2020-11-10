<?php
    define('DB_SERVER', '10.180.50.214:3306');
    define('DB_USERNAME', 'hbceduet');
    define('DB_PASSWORD', 'qazxsw');
    define('DB_NAME', 'hbc');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>