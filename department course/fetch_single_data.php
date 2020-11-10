


<?php

//fetch_single_data.php

include('../database/database_connection.php');

if(isset($_POST["code"]))
{
 $query = "
 SELECT * FROM course WHERE c_id = '".$_POST["code"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>
