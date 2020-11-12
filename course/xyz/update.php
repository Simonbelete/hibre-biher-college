<?php
if(isset($_POST)){
    $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
    $COURSE_ID= $_POST['pk'];
    $C_NAME= $_POST['name'];
    $C_VALUE=$_POST['value'];
    $sql = "UPDATE course SET $C_NAME = '$C_VALUE' WHERE c_id ='$COURSE_ID'";
   if(mysqli_query($connect, $sql))
    echo 'Updated successfully.';
    else echo mysqli_error($connect) ;
}


?>