<?php
$conn = new mysqli("10.180.50.214:3306","hbceduet","qazxsw","hbc");
$count=0;
if(!empty($_POST['Submit'])) {
    $subject ='Emzil Add : '. mysqli_real_escape_string($conn,$_POST["email"]) . "phone Num :  ". mysqli_real_escape_string($conn,$_POST["phone"]);
    $comment = mysqli_real_escape_string($conn,$_POST["msg"]);
    $sql = "INSERT INTO comments (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
    if(mysqli_query($conn, $sql)){  ?>

    <script>
        alert("message is sent successfully");
        window.location='../index.php' ;
    </script>
    <?php
    } else{ ?>
        <script>
        alert("your message is not send successfully");
        window.location='../index.php' ;
    </script>
   <?php }
} ?>