<?php
        session_start(); 
        if(isset($_POST['Submit'])) {
            $Password=$_POST['Password'] ;
            $uname= $_POST['uname'];
            $con=mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc") or die(mysqli_error());
            $sql="SELECT * FROM student_enrollment where Student_Id='$uname'" ;
            $sql2="SELECT * FROM employee where Employee_Id='$uname'" ;
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) ==1){
                    $row = mysqli_fetch_array($result);
                    $enrol_id=$row['Registration_Id'];
                    if(password_verify($Password,$row['password'])){
                        $_SESSION['username'] =$uname;
                        $_SESSION['enrolid'] =$enrol_id;
                         header('location:../student');
                    }
                    else{ header("Location:../index.php?error=Incorrect Password"); }
                }
                else if($result2 = mysqli_query($con, $sql2)){
                    if(mysqli_num_rows($result2) ==1){
                        $row2 = mysqli_fetch_array($result2);
                        $role=$row2['Role'];
                        if(password_verify($Password,$row2['password'])){
                            $_SESSION['username'] =$uname;
                            $_SESSION['role'] =$role;
                            if($role=='admin' || $role=='dean' || $role=='vice dean' || $role=='head'){ header('location:../sidebar.php');  }
                            if($role=='instructor'){header('location:../lecture');  }
                            if($role=='accountant'){header('location:../accountant');  }
                        }
                        else{ header("Location:../index.php?error=Incorrect Password"); }
                    }
                    else{  header("Location:../index.php?error=User is Not Found."); }
                }
                else{ header("Location:../index.php?error=".mysqli_error($con));  }
            }
            else{ header("Location:../index.php?error=".mysqli_error($con));  }
            mysqli_close($con);
        } 
?>