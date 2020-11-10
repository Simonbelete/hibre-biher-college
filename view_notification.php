<?php     session_start();
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
                 if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
            $id=$_SESSION['username'];
$conn = new mysqli("10.180.50.214:3306","hbceduet","qazxsw","hbc");

$sql="UPDATE comments SET status=1 WHERE status=0";
$result=mysqli_query($conn, $sql);

$sql="select * from comments ORDER BY id DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div class='notification-item card-body;border: 1px solid black;outline: 5px dotted #e632f0;outline-offset: 5px; ' style='width:40rem;'>" .
	"<b><div class='notification-subject card-footer' style='color: purple;' >". $row["subject"] . "</div></b>" .
	"<div class='notification-comment'style='margin-left: 20%'>" . $row["comment"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
} }}  else{  header('location:index.php'); }
?>