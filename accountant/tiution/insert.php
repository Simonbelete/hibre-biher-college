 <?php
 $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $Batch = mysqli_real_escape_string($connect, $_POST["Batch"]);
      $Semister = mysqli_real_escape_string($connect, $_POST["Semister"]);
      $fofedu = mysqli_real_escape_string($connect, $_POST["fofedu"]);
      $crhr = mysqli_real_escape_string($connect, $_POST["crhr"]);
      $s_cr_pay = mysqli_real_escape_string($connect, $_POST["s_cr_pay"]);
      $t_cr_pay = mysqli_real_escape_string($connect, $_POST["t_cr_pay"]);
      $register = mysqli_real_escape_string($connect, $_POST["register"]);
      $Total = mysqli_real_escape_string($connect, $_POST["Total"]);
           $query = " INSERT INTO tuition (Batch, Semister, Field_of_education ,Credit_hr, payment_per_Credit_hr , Total_Credit_hr_payment , To_register ,Total) VALUES(  $Batch,$Semister, '$fofedu', $crhr, $s_cr_pay ,$t_cr_pay,$register, $Total)";
           if(mysqli_query($connect, $query)){
                   header('location:index.php?validd=       data is inserted correctly');
              }else
                    header('location:index.php?error_t='.mysqli_error($connect));
   }
 ?>