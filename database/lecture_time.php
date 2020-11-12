<?php
    if(isset($_POST['Submit']))
    {
        $x= $_POST['lname'];
        $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
        $sql= "UPDATE timer set End_time='$x' where No=1";
        if(mysqli_query($link, $sql)){
            header("location:../sidebar.php?error_file=u1");  }
        else{ header("location:../sidebar.php?error_file=u2"); }
     }
?>