<?php
if(isset($_POST)){
    $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
    $attribute_value= $_POST['pk'];
    $attribute= $_POST['name'];
    $value=$_POST['value'];
    $credit=  $spayment= $register = $total_credit_payment= 0 ;
    $sql2="select Credit_hr,payment_per_Credit_hr,Total_Credit_hr_payment,To_register,Total from tuition  WHERE Id =$attribute_value" ;
     if($result=mysqli_query($connect, $sql2)){
         if($row = mysqli_fetch_assoc($result))
            {
             $credit = $row['Credit_hr'];
             $spayment = $row['payment_per_Credit_hr'];
             $register = $row['To_register'];
             $total_credit_payment=  $row['Total_Credit_hr_payment'];
                if($attribute=="Credit_hr"){
                    $total_credit_payment= $value *  $spayment;
                    $total = +$register + +$total_credit_payment;
                    $sql = "UPDATE tuition SET $attribute = $value ,Total_Credit_hr_payment=$total_credit_payment,Total=$total  WHERE Id =$attribute_value";
                }
                 if( $attribute=="payment_per_Credit_hr"){
                    $total_credit_payment= $credit *  $value;
                    $total = +$register + +$total_credit_payment;
                    $sql = "UPDATE tuition SET $attribute = $value ,Total_Credit_hr_payment=$total_credit_payment,Total=$total  WHERE Id =$attribute_value";
                }
                if($attribute=="To_register"){
                    $total = + $total_credit_payment + +  $value;
                    $sql = "UPDATE tuition SET $attribute = $value ,Total=$total  WHERE Id =$attribute_value";
                }
               if(mysqli_query($connect, $sql))
                header('location:index.php');
                else echo mysqli_error($connect) ;
            }
            } else    echo mysqli_error($connect) ;
     }


?>