<?php
$conn = new mysqli("10.180.50.214:3306","hbceduet","qazxsw","hbc");

$sql="UPDATE comments SET status=1 WHERE status=0";	
$result=mysqli_query($conn, $sql);

$sql="select * from comments ORDER BY id DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div  class='A notification-item'>" .
	"<div id='subject' class='notification-subject font-weight-bold my-4 '  style='color: #000000'>". $row["subject"] . "</div>" .
	"<div style='width: 100%' class='notification-comment'>" . $row["comment"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}
?>
<style type="text/css">
           #subject{
            align-self: center;
            font-family: 'Kreon', serif;
            font-weight: 300;
            font-size: 2em;
            color: #000000;
            text-shadow:  rgba(16, 16, 16, 0.4) 1px 18px 6px,
                          white -0.15em -0.1em 100px;"
           }
        </style>