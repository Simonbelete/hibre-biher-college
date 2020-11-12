<?php
        if(isset($_POST['Submit'])){
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $stud_id = mysqli_real_escape_string($link, $_REQUEST['stud_id']);
            $Batch = mysqli_real_escape_string($link, $_REQUEST['Batch']);
            $Section = mysqli_real_escape_string($link, $_REQUEST['Section']);
            $first_semister = mysqli_real_escape_string($link, $_REQUEST['first_semister']);
            $second_semister = mysqli_real_escape_string($link, $_REQUEST['second_semister']);

            $sql = "INSERT INTO student_enrollment_semister VALUES ('','$stud_id','$Batch','$Section','$first_semister','$second_semister')";
            $sql2 = "select Student_id from student_enrollment_semister where Batch='$Batch' and Section='$Section' and Student_id='$stud_id'";
            $sql3 = "select Batch,First_Semister, Second_Semister from student_enrollment_semister where  Student_id='$stud_id'  order by Batch DESC";
            if($first_semister =='Registered' && $second_semister=='Not Registered'){
                if($result3 = mysqli_query($link, $sql3)){
                    if(mysqli_num_rows($result3) > 0){
                        while($row3 = mysqli_fetch_array($result3)) {
                            $batch=$row3['Batch'];
                            $fsem=$row3['First_Semister'];
                            $ssem=$row3['Second_Semister'];
                            $dif=$Batch-$batch;
                            if($dif==1&&$fsem=='Complete'&&$ssem=='Complete') {
                                 if(mysqli_query($link, $sql)){
                                    header("location:../general_student_batch_semister.php?stud_batch_sem_err=11");
                                }
                                else{  echo "$sql".mysqli_error($link);   }
                            }
                            else{header("location:../general_student_batch_semister.php?stud_batch_sem_err=23");}
                            mysqli_free_result($result3);
                        }
                    }
                    else{
                        if(mysqli_query($link, $sql)){
                           header("location:../general_student_batch_semister.php?stud_batch_sem_err=11");
                        } else{ echo "$sql".mysqli_error($link); }
                    }
                }  echo "$sql3".mysqli_error($link);

            }else{header("location:../general_student_batch_semister.php?stud_batch_sem_err=23");}

        }

        if(isset($_POST['Update'])) {
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $stud_id = mysqli_real_escape_string($link, $_REQUEST['stud_id']);
            $Batch = mysqli_real_escape_string($link, $_REQUEST['Batch']);
            $Section = mysqli_real_escape_string($link, $_REQUEST['Section']);
            $first_semister = mysqli_real_escape_string($link, $_REQUEST['first_semister']);
            $second_semister = mysqli_real_escape_string($link, $_REQUEST['second_semister']);

            $sql2 = "select Student_id,Batch from student_enrollment_semister where Student_id='$stud_id' order by Batch DESC";
            $sql3 = "select Section, First_Semister, Second_Semister from student_enrollment_semister where Batch='$Batch' and  Student_id='$stud_id'";
            $sql4 =  "UPDATE student_enrollment_semister SET Section='$Section', First_Semister='$first_semister' , Second_Semister='$second_semister' WHERE Batch='$Batch' and Student_id='$stud_id'";

            if(($first_semister =='Incomplete' && $second_semister=='Not Registered')||($first_semister =='Not Registered' && $second_semister=='Not Registered')||($first_semister =='Registered' && $second_semister=='Not Registered')||($first_semister =='Withdrawal' && $second_semister=='Not Registered')||($first_semister =='Complete' && $second_semister=='Complete')||($first_semister =='Complete' && $second_semister=='Incomplete')||($first_semister =='Complete' && $second_semister=='Not Registered')||($first_semister =='Complete' && $second_semister=='Registered')||($first_semister =='Complete' && $second_semister=='Withdrawal')){

                if($result = mysqli_query($link, $sql2)){
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                            $batch=$row['Batch'];
                            $dif=$Batch-$batch;
                            if($dif==0) {
                                 mysqli_query($link, $sql4);
                                header("location:../general_student_batch_semister.php?stud_batch_sem_err=success");
                            }
                            else{header("location:../general_student_batch_semister.php?stud_batch_sem_err=23");}
                            mysqli_free_result($result);


                    }
                    else{ header("Location:../general_student_batch_semister.php?stud_batch_sem_err=empty");  }
                }
                else{ header("Location:../general_student_batch_semister.php?stud_batch_sem_err=22"); }
            } else{header("location:../general_student_batch_semister.php?stud_batch_sem_err=23");}



        }

?>