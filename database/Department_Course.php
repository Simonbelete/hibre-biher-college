<?php
        if(isset($_POST['Submit'])){
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $course_id = mysqli_real_escape_string($link, $_REQUEST['course_id']);
            $Batch = mysqli_real_escape_string($link, $_REQUEST['Batch']);
            $semister = mysqli_real_escape_string($link, $_REQUEST['semister']);
            $program = mysqli_real_escape_string($link, $_REQUEST['program']);        
            $sql = "select All_Program,Course_Id from course_batch_semister where All_Program='$program' and Course_Id='$course_id'";
            $sql2 = "INSERT INTO course_batch_semister VALUES ('$program','$Batch','$semister','$course_id')";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    header("location:../General_Department_Course.php?dept_course_err= Sorry The Course Is Already Registered For $program Students");
                }
                else{
                   if(mysqli_query($link, $sql2)){
                        header("location:../General_Department_Course.php?dept_course_err=11");
                    }
                    else{ header("Location:../General_Department_Course.php?dept_course_err=".mysqli_error($link)); }
                }
            }
        }

?>