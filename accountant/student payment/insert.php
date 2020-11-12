 <?php
 $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $stud_id = mysqli_real_escape_string($connect, $_POST["sid"]);
      $fofedu = mysqli_real_escape_string($connect, $_POST["fofedu"]);
      $Batch = mysqli_real_escape_string($connect, $_POST["Batch"]);
      $Semister = mysqli_real_escape_string($connect, $_POST["semister"]);
      $month = mysqli_real_escape_string($connect, $_POST["month"]);
      $ammount = mysqli_real_escape_string($connect, $_POST["amt"]); 
           $query = " INSERT INTO payment VALUES('',  '$stud_id','$fofedu', '$Batch', '$Semister', '$month' ,'$ammount',now())";
             if(mysqli_query($connect, $query)){
                   header('location:index.php?valid=       data is inserted correctly');
              }else
                    header('location:index.php?error_p='.mysqli_error($connect));
   }
 ?>