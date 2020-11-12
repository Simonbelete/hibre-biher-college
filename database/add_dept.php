<?php
                $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
        if(isset($_POST['Submit']))  {
                $dept_id = mysqli_real_escape_string($link, $_REQUEST['dept_id']);
                $dept_name = mysqli_real_escape_string($link, $_REQUEST['dept_name']);
                $dept_head = mysqli_real_escape_string($link, $_REQUEST['dept_head']);

                $sql = "INSERT INTO department VALUES ('$dept_id', '$dept_name','$dept_head')";
                $sql2 = "select Dept_Name from department  where Dept_Name='$dept_name'";
                if($result = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result) > 0){
                          header("Location:../sidebar.php?error_dept=35");
                        }
                        else{
                            if(mysqli_query($link, $sql)){
                                   header("location:../sidebar.php?error_dept=15");
                            } else{
                                    header("Location:../sidebar.php?error_dept=25");
                                    echo die(mysqli_error($link));
                            }
                            echo die(mysqli_error($link));
                        }
                }
     }
        if(isset($_POST['Update']))  {
                $dept_id = mysqli_real_escape_string($link, $_REQUEST['dept_id']);
                $dept_name = mysqli_real_escape_string($link, $_REQUEST['dept_name']);
                $dept_head = mysqli_real_escape_string($link, $_REQUEST['dept_head']);

                $sql = "UPDATE department SET Dept_Head='$dept_head' where Dept_Id='$dept_id' and Dept_Name='$dept_name'";
                $sql2 = "select Dept_Id,Dept_Name from department  where  Dept_Id='$dept_id' and Dept_Name='$dept_name'";
                if($result = mysqli_query($link, $sql2)){
                        if(mysqli_num_rows($result) > 0){
                          if(mysqli_query($link, $sql)){
                                   header("location:../sidebar.php?error_dept=15");
                            } else{
                                    header("Location:../sidebar.php?error_dept=25");
                                    echo die(mysqli_error($link));
                            }
                        }
                        else{
                              header("Location:../sidebar.php?error_dept=25"); 
                            echo die(mysqli_error($link));
                        }
                }
     }
?>