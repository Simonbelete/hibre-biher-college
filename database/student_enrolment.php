<?php
        if(isset($_POST['Submit'])) {
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Registration_Id = mysqli_real_escape_string($link, $_REQUEST['reg_id']);
            $Student_Id = mysqli_real_escape_string($link, $_REQUEST['stud_id']);
            $program = mysqli_real_escape_string($link, $_REQUEST['Program']);
            $Batch = mysqli_real_escape_string($link, $_REQUEST['Batch']);
            $Section = mysqli_real_escape_string($link, $_REQUEST['Section']);
            $password = mysqli_real_escape_string($link, $_REQUEST['password']);
            $decript_password=password_hash("$password", PASSWORD_DEFAULT);

            $sql = "INSERT INTO student_enrollment VALUES ('$Registration_Id', '$Student_Id','$Section','$program','$decript_password')";
           $sql3 = "SELECT  Dept_Name, program_name,Name  FROM department_program_view where Id=$program";
            $sql5 = "SELECT   Student_Id  FROM student_enrollment WHERE  Student_Id='$Student_Id'";
            $sql6 = "INSERT INTO student_enrollment_semister VALUES ('','$Student_Id','$Batch','Disabled','Disabled')";

            if($result5 = mysqli_query($link, $sql5)){
                if(mysqli_num_rows($result5) > 0){
                  header("Location:../enrol_student.php?stud_enrol_err=3");  //student id is already present
                }
                else{
                    if(mysqli_query($link, $sql)){
                        mysqli_query($link, $sql6);
                        if($result = mysqli_query($link, $sql3)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                     $Dept_Name=   $row['Dept_Name'];
                                     $program_name= $row['program_name']  ;
                                     $name= $row['Name']  ;
                                     $sql4 =  "UPDATE user_student SET program='$Dept_Name $program_name $name',Status='Active', Section='$Section' WHERE Registration_Id='$Registration_Id'";

                                     mysqli_query($link, $sql4);
                                    header("location:../enrol_student.php?stud_enrol_err=1");
                                }
                                mysqli_free_result($result);
                            }
                        }

                    }
                    else{
                        header("Location:../enrol_student.php?stud_enrol_err=2");
                        echo die(mysqli_error($link));
                    }
                    echo die(mysqli_error($link));
                }
            }
        }
    
?>