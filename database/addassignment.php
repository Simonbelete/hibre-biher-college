<?php
        if(isset($_POST['send'])) {
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            
            $id= mysqli_real_escape_string($link, $_REQUEST['Course']);
            $student_id= mysqli_real_escape_string($link, $_REQUEST['student_id']);
            if(isset($_FILES["filee"]) && $_FILES["filee"]["error"] == 0){
                $filename = $student_id."_".$id."_".$_FILES["filee"]["name"];
                $sql_chk="select stud_id,course_id,file_name from assignment where stud_id='$student_id' and course_id='$id'";
                 if($resultt = mysqli_query($link, $sql_chk)){
                     $sql="";
                    if(mysqli_num_rows($resultt) > 0){
                         $sql="update assignment set file_name='$filename' where stud_id='$student_id' and course_id='$id'";

                        }
                        else{
                            $sql = "INSERT INTO assignment VALUES ('$student_id','$id','$filename')"; }  // Check whether file exists before uploading it
                                if(file_exists("../upload/file/" . $filename)){
                                   header("Location:../student/generalprofile.php?error=error: .$filename .  is already exists.");
                                }
                                else{
                                   if( move_uploaded_file($_FILES["filee"]["tmp_name"], "../upload/file/" . $filename) && mysqli_query($link, $sql) )
                                    {
                                        header("location:../student/generalprofile.php?error=u1");
                                    }
                                    else{
                                        header("location:../student/generalprofile.php?error=".mysqli_error($link));
                                    }
                                    mysqli_close($link);
                                }
                 }

            } else{
                $X=$_FILES["filee"]["error"];
                header("Location:../student/generalprofile.php?error=Error: . !! Empty file can't be uploaded .".$X);

            }


    }
?>