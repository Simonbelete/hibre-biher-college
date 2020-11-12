<?php
if(isset($_POST)){
    $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
    $attribute_value= $_POST['pk'];
    $attribute= $_POST['name'];
    $value=$_POST['value'];
                $batch = $row['batch'];
                $semister = $row['semister'];
                $month = $row['month'];
                $amount=  $row['amount'];
                $sql = "UPDATE payment SET $attribute = '$value'  WHERE No ='$attribute_value'";

               if(mysqli_query($connect, $sql))
                header('location:index.php');
                else echo mysqli_error($connect) ;

     }


?>