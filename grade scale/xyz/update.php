<?php
if(isset($_POST)){
    $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
    $grade_id= $_POST['pk'];
    $attribute= $_POST['name'];
    $G_ALUE=$_POST['value'];
    $sql = "UPDATE grade_scale SET $attribute = '$G_ALUE' WHERE Id ='$grade_id'";
   if(mysqli_query($connect, $sql))
    echo 'Updated successfully.';
    else echo mysqli_error($connect) ;
}  ?>