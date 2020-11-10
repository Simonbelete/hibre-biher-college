<?php
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
                 if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
            $id=$_SESSION['username'];

$conn = new mysqli("10.180.50.214:3306","hbceduet","qazxsw","hbc");
$count=0;       
$sql2="SELECT * FROM comments WHERE status = 0";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);
?>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">  
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	function myFunction() {
		$.ajax({
			url: "view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}
		});
	 }

	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});

	</script>
	<div style="position:relative">
        <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="notification-icon.png" /></button>
       <div id="notification-latest"></div>
    </div>
     <?php }} ?>