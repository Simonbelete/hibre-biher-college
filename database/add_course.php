<?php
        if(isset($_POST['Submit'])){
            $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Course_Id = mysqli_real_escape_string($link, $_REQUEST['Course_Id']);
            $Course_Name = mysqli_real_escape_string($link, $_REQUEST['Course_Name']);
            $Course_Credit = mysqli_real_escape_string($link, $_REQUEST['Course_Credit']);
            $Course_Ectc = mysqli_real_escape_string($link, $_REQUEST['Course_Ectc']);
            $Department = mysqli_real_escape_string($link, $_REQUEST['Department']);
            $sql = "INSERT INTO course VALUES ('$Course_Id', '$Course_Name','$Course_Credit','$Course_Ectc')";
            $sql2 = "INSERT INTO department_to_course VALUES ('','$Course_Id', '$Department')";
            if(mysqli_query($link, $sql)&&mysqli_query($link, $sql2)){

                header("location:../sidebar.php?error=3");
            }
            else{ header("Location:../sidebar.php?error=4"); }
             die(mysqli_error($link));
        }
         if(isset($_POST['Update'])){
            $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Course_Id = mysqli_real_escape_string($link, $_REQUEST['Course_Id']);
            $Course_Name = mysqli_real_escape_string($link, $_REQUEST['Course_Name']);
            $Course_Credit = mysqli_real_escape_string($link, $_REQUEST['Course_Credit']);
            $Course_Ectc = mysqli_real_escape_string($link, $_REQUEST['Course_Ectc']);
            $Department = mysqli_real_escape_string($link, $_REQUEST['Department']);
            $sql = "updat course set c_name='$Course_Name',c_credit='$Course_Credit' and c_ects='$Course_Ectc' where c_id='$Course_Id'";
            $sql2 = "update department_to_course set department_id='$Department' where  c_id='$Course_Id'";
            $sql3="select c_id from course where c_id='$Course_Id', c_name='$Course_Name',c_credit='$Course_Credit' and c_ects='$Course_Ectc'";
            if($result = mysqli_query($link, $sql3)){
                if(mysqli_num_rows($result) > 0){
                  if(mysqli_query($link, $sql)&&mysqli_query($link, $sql2)){
                    header("location:../sidebar.php?error=3");
                  }
                  else{header("Location:../sidebar.php?error=4");}
                }else{
                       header("Location:../sidebar.php?error=4");
                }

            }
            else{ header("Location:../sidebar.php?error=4"); }
             die(mysqli_error($link));
        }
   
?>