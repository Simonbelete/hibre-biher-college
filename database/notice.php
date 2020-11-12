<?php
        if(isset($_POST['upload']))  {
                $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                $day = mysqli_real_escape_string($link, $_REQUEST['day']);
                $title = mysqli_real_escape_string($link, $_REQUEST['title']);
                $body = mysqli_real_escape_string($link, $_REQUEST['body']);
                $Signature = mysqli_real_escape_string($link, $_REQUEST['Signature']);
                $Designation = mysqli_real_escape_string($link, $_REQUEST['Designation']);

                $sql = "INSERT INTO notice VALUES ('$Designation', '$Signature','$title','$body','$day')";
                            if(mysqli_query($link, $sql)){
                                   header("location:../NoticeBoard.php?error_dept=15");
                            } else{
                                    header("Location:../NoticeBoard.php?error_dept=25");
                                    echo die(mysqli_error($link));
                            }
                            echo die(mysqli_error($link));


     }
?>