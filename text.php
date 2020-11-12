<DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
 
    header('content-type: text/html; charset=utf8');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214", "hbceduet", "qazxsw", "hbc");
	mysql_set_charset('utf8', $link);
 /* define('DB_SERVER', '10.180.50.214:3306');
    define('DB_USERNAME', 'hbceduet');
    define('DB_PASSWORD', 'qazxsw');
    define('DB_NAME', 'hbc');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }*/
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM notice";
	
if($result = mysqli_query($link, $sql)){
	$result("set names 'utf8'");
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Designation</th>";
                echo "<th>Signature</th>";
                echo "<th> subject</th>";
                echo "<th> 	Description </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Designation'] . "</td>";
                echo "<td>" . $row['Signature'] . "</td>";
                echo "<td>" . utf8_encode($row['subject'] . "</td>");
                echo "<td>" . $row['Description '] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</html>