 <?php
        if(isset($_POST['Submit'])) {
            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $id = mysqli_real_escape_string($link, $_REQUEST['id']);
            $dept_name = mysqli_real_escape_string($link, $_REQUEST['dept_name']);
            $program_name = mysqli_real_escape_string($link, $_REQUEST['program_name']);
            $type_name = mysqli_real_escape_string($link, $_REQUEST['type_name']);
            $sql = "INSERT INTO department_program VALUES ('','$dept_name','$program_name','$type_name')";
            $sql2 = "select dept_id,program_id,Type_id from department_program where dept_id='$dept_name' and program_id='$program_name' and Type_id='$type_name'";
            if($result = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result) > 0){
                  header("Location:../Add_program_for_dept.php?dept_pro_err=20");
                }
                else{
                     if(mysqli_query($link, $sql)){
                           header("location:../Add_program_for_dept.php?dept_pro_err=11");
                    } else{
                            header("Location:../Add_program_for_dept.php?dept_pro_err=22");
                            echo die(mysqli_error($link));
                    }
                    echo die(mysqli_error($link));
                }
            }
        }

?>