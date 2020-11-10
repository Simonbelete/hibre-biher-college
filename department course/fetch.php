<?php

//fetch.php

include('../database/database_connection.php');
$query = '';
$output = array();
$query .= "SELECT * FROM course ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE c_id LIKE "%'.$_POST["search"]["value"].'%" OR c_name LIKE "%'.$_POST["search"]["value"].'%" OR c_credit LIKE "%'.$_POST["search"]["value"].'%" OR c_ects LIKE "%'.$_POST["search"]["value"].'%"  ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY c_id DESC ';
}
$statement = $connect->prepare($query);
$statement->execute();

$resultSet = $statement->get_result();
$result = $resultSet->fetch_all();

$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["c_name"];
 $sub_array[] = $row["c_credit"];
 $sub_array[] = $row["c_ects"];
 $sub_array[] = '<button type="button" name="view" id="'.$row["c_id"].'" class="btn btn-primary btn-xs view">View</button>';
 $sub_array[] = '<button type="button" name="update" id="'.$row["c_id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM course");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connect),
 "data"    => $data
);
echo json_encode($output);
?>
