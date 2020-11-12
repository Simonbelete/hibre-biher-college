<?php
 session_start();
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])&& $_SESSION['role']=='instructor'){
    $id=$_SESSION['username'];
        if(isset($_POST['Submit']))
        {
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $action=$_POST['Submit'];
            $student_id = mysqli_real_escape_string($link, $_REQUEST['s_id']);
            $course_id = mysqli_real_escape_string($link, $_REQUEST['c_id']);
            $mid= mysqli_real_escape_string($link, $_REQUEST['mid']);
            $quize = mysqli_real_escape_string($link, $_REQUEST['quize']);
            $assign = mysqli_real_escape_string($link, $_REQUEST['assign']);
            $final = mysqli_real_escape_string($link, $_REQUEST['final']);
            $batch = mysqli_real_escape_string($link, $_REQUEST['batch']);
            $semister = mysqli_real_escape_string($link, $_REQUEST['semister']);
            $A_program = mysqli_real_escape_string($link, $_REQUEST['A_program']);
            $total=$mid + $quize + $assign + $final;

                $l_grade='';
            $sqll = "select letter from grade_scale where  minimum <= $total AND maximum >=$total";
            $resultt = mysqli_query($link, $sqll);
            $row = mysqli_fetch_array($resultt);
            $l_grade=$row['letter'];


            $sql = "INSERT INTO student_course VALUES ('$student_id', '$A_program','$batch','$semister','$course_id', $mid,$quize,$assign,$final,$total,'$l_grade')";
            $sql2= "UPDATE student_course set mid=$mid,quize=$quize,assignment=$assign,final=$final, total=$total, letter_grade='$l_grade' where student_id='$student_id' and All_Program='$A_program' and Batch='$batch' and Semister='$semister' and Course_id='$course_id'";
            $sql3=  "INSERT INTO comments (subject,comment) VALUES('Student Grade Is Updated' , 'Studens Grade whose Id = $student_id  In  $A_program is updated By $id ' )";
            if($action=='Register'){
                if(mysqli_query($link, $sql)){
                  header("Location:lecture_set_grade.php?grade_err=insert");  //student id is already present
                }
                else{
                    header("Location:lecture_set_grade.php?grade_err=notinsert");
                }
            }
            if($action=='Update'){
                            if(mysqli_query($link, $sql2)){
                                mysqli_query($link, $sql3);
                                header("Location:lecture_set_grade.php?grade_err=update");  //student id is already present
                            }
                            else{
                                    header("Location:lecture_set_grade.php?grade_err=".mysqli_error($link));
                                    //echo mysqli_error($link);;
                            }
                    }
        }

} else{  header('location:../index.php'); }
?>