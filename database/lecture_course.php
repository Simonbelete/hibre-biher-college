<?php
         $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
        if(isset($_POST['Submit'])){
            $Lecture= mysqli_real_escape_string($link, $_REQUEST['Lecture']);
            $course_id = mysqli_real_escape_string($link, $_REQUEST['course_id']);
            $Section = mysqli_real_escape_string($link, $_REQUEST['Section']);
            $sql2 = "INSERT INTO lecture_cours VALUES ('','$Lecture','$course_id','$Section')";

                   if(mysqli_query($link, $sql2)){
                        header("location:../lecture_course.php?lect_course_err=1001");
                    }
                    else{ header("Location:../lecture_course.php?lect_course_err=$sql2"); }


        }

?>