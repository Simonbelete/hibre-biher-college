 <?php
 //fetch.php
 $connect = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 if(isset($_POST["employee_id"]))
 {
      $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
      $result = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>