


<?php

//insert_data.php

include('../database/database_connection.php');

if(isset($_POST["name"]))
{
 $error = '';
 $success = '';
 $code = $_POST["code"];
 $name = $_POST["name"];
 $credit =$_POST["credit"];
 $ects = $_POST["ects"];

 if($error == '')
 {
  $data = array(
   ':code'   => $code,
   ':name'   => $name,
   ':credit'  => $credit,
   ':ects'  => $ects
  );

  $query = "
  INSERT INTO course VALUES (:code,:name, :credit, :ects)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Courses Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>

