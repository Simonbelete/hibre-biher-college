<?php if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
     if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hibre Biher Collage</title>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <?php
            if(isset($_POST['left_department_course'])){
                $al=$_POST['left_department_course'];?>
                <div class="container my-5">
                    <style>
                        .border-top {
                            border-top: 10px solid #33b5e5 !important;
                            border-top-left-radius: .25rem!important;
                        	border-top-right-radius: .25rem!important;
                            }    section {
                        box-shadow: 10px 10px 10px grey;
                        }
                    </style>
            <!--Section: Content-->
                <?php if(  $_SESSION['role']=='dean'){ ?>
                    <section class="text-center dark-grey-text mb-5">
                        <div class="card">
                            <div class="card-body rounded-top border-top p-5">
                                <h1 class="font-weight-bold my-4"><?php echo $al;?> Students  Course List</h1>
                                <form action="database/Department_Course.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label><b>Course Name</b></label>
                                                    <select id="course_id" name="course_id" class="form-control"required>
                                                        <?php
                                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                            $sql = "SELECT c_id,c_name FROM department_course_view where Dept_Name like '$al%' ";
                                                            if($result = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_array($result)){
                                                                        echo "<option value=".$row['c_id'].">".$row['c_name']."</option>";
                                                                    }
                                                                    mysqli_free_result($result);
                                                                }
                                                                else{    echo "<option disabled='disabled' > No Students found in department $al </option>";  }
                                                            }
                                                            else{  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);    }
                                                            mysqli_close($link);
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class="form-group">
                                                <label><b>BATCH</b></label>
                                                <select id="Batch" name="Batch" class="form-control"required>
                                                    <option value="1">First Year</option>
                                                    <option value="2">Second Year</option>
                                                    <option value="3">Third Year</option>
                                                    <option value="4">Fourth Year</option>
                                                    <option value="5">Fivth Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label><b>SEMISTER</b></label>
                                                    <select id="semister" name="semister" class="form-control"required>
                                                        <option value="First semister">First Semister</option>
                                                        <option value="Second semister">Second Semister</option>
                                                    </select>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                           <div class="form-group">
                                                <label><b>PROGRAM</b></label>
                                                <select id="program" name="program" class="form-control"required>
                                                     <?php
                                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                                $sql = "SELECT DISTINCT program FROM student_batch_dept_pro_view where program like '$al%'  ORDER BY Batch ASC";
                                                                if($result = mysqli_query($link, $sql)){
                                                                    if(mysqli_num_rows($result) > 0){
                                                                        while($row = mysqli_fetch_array($result)){  ?>
                                                                            <option value="<?php echo $row['program'];?>"><?php echo $row['program'] ;?></option><?php
                                                                        }
                                                                        mysqli_free_result($result);
                                                                    }
                                                                    else{    echo "<option disabled='disabled' > There is No Enroled Student in $al department  </option>";  }
                                                                }
                                                                else{  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);    }
                                                                mysqli_close($link);
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <input type="Submit" name=" Submit" value="Submit" class="btn btn-success " />
                                    <input type="Submit" name=" Update" value="Update" class="btn btn-success" />
                                </form>
                            </div>
                        </div>
                    </section>
                <?php } ?>
                </div>
                <hr style=" background-color: #007500">
                <hr style=" background-color: #FFFF00">
                <hr style=" background-color: #FF0000">
                <?php
                    $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                    $sql = "SELECT DISTINCT  All_Program,Semister FROM batch_semister_course_program_vies where All_Program like '%$al%' and Semister='First semister'  ORDER BY Batch ASC";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                           while($row = mysqli_fetch_array($result)){ ?>
                                <div class="container my-1">
                                    <section class="text-center dark-grey-text mb-0">
                                        <div class="card A">
                                            <div class=" card-body rounded-top border-top p-0" style="background: #575757">
                                                <h4 class="font-weight-bold my-4 "><?php echo  $row['All_Program']." Students ". $row['Semister']." Course List"; ?></h4>
                                            </div>
                                        </div>
                                    </section>
                                </div><br><?php
                                $progr=   $row['All_Program'];
                                $semister= $row['Semister'];
                                $sql2 = "SELECT * FROM batch_semister_course_program_vies  where  All_Program ='$progr' and semister='$semister'    ORDER BY Batch ASC ";
                                if($result2 = mysqli_query($link, $sql2)){
                                    if(mysqli_num_rows($result2) > 0){
                                        echo "<table class='table table-bordered'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>#</th>";
                                                    //echo "<th>Programs</th>";
                                                    echo "<th>Batch</th>";
                                                    //echo "<th>Semister</th>";
                                                    echo "<th>Course Code</th>";
                                                    echo "<th>Course Name</th>";
                                                    echo "<th>CR_hr</th>";
                                                    echo "<th>C_ects</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            $no=1;
                                            while($row2 = mysqli_fetch_array($result2)){
                                                echo "<tr>";
                                                    echo "<td> $no</td>";
                                                    //echo "<td>" . $row2['All_Program']. "</td>";
                                                    echo "<td>" . $row2['Batch'] . "</td>";
                                                    //echo "<td>" . $row2['Semister'] . "</td>";
                                                    echo "<td>" . $row2['Course_Id'] . "</td>";
                                                    echo "<td>" . $row2['c_name']. "</td>";
                                                    echo "<td>" . $row2['c_credit'] . "</td>";
                                                    echo "<td>" . $row2['c_ects'] . "</td>";

                                                echo "</tr>";
                                                ++$no;
                                            }
                                            echo "</tbody>";
                                        echo "</table>";
                                     mysqli_free_result($result2);
                                    }
                                }
                                else{echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
                            }
                            mysqli_free_result($result);
                        }
                    }
                    else{   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }  

                    $sql3 = "SELECT DISTINCT All_Program,Semister FROM batch_semister_course_program_vies where All_Program like '%$al%' and Semister='Second semister' ORDER BY Batch ASC";
                    if($result3 = mysqli_query($link, $sql3)){
                        if(mysqli_num_rows($result3) > 0){
                           while($row3 = mysqli_fetch_array($result3)){ ?>
                                <div class="container my-1">
                                    <section class="text-center dark-grey-text mb-1">
                                        <div class="A card">
                                            <div class="card-body rounded-top border-top p-0"style="background: #575757">
                                                 <h4 class="font-weight-bold my-4" ><?php echo  $row3['All_Program']." Students ". $row3['Semister']." Course List"; ?></h4>
                                            </div>
                                        </div>
                                    </section>
                                </div><br><?php
                                $progr=   $row3['All_Program'];
                                $semi=    $row3['Semister'];
                                $sql4 = "SELECT * FROM batch_semister_course_program_vies  where  All_Program ='$progr' and Semister='$semi'    ORDER BY Batch ASC  ";
                                if($result4 = mysqli_query($link, $sql4)){
                                    if(mysqli_num_rows($result4) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>#</th>";
                                                    //echo "<th>Programs</th>";
                                                    echo "<th>Batch</th>";
                                                    //echo "<th>Semister</th>";
                                                    echo "<th>Course Code</th>";
                                                    echo "<th>Course Name</th>";
                                                    echo "<th>CR_hr</th>";
                                                    echo "<th>C_ects</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            $no=1;
                                            while($row4 = mysqli_fetch_array($result4)){
                                                echo "<tr>";
                                                    echo "<td> $no</td>";
                                                    //echo "<td>" . $row4['All_Program']. "</td>";
                                                    echo "<td>" . $row4['Batch'] . "</td>";
                                                    //echo "<td>" . $row4['Semister'] . "</td>";
                                                    echo "<td>" . $row4['Course_Id'] . "</td>";
                                                    echo "<td>" . $row4['c_name']. "</td>";
                                                    echo "<td>" . $row4['c_credit'] . "</td>";
                                                    echo "<td>" . $row4['c_ects'] . "</td>";

                                                echo "</tr>";
                                                ++$no;
                                            }
                                            echo "</tbody>";
                                        echo "</table>";
                                     mysqli_free_result($result4);
                                    }
                                }
                                else{echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
                            }
                            mysqli_free_result($result3);
                        }
                        else{  echo "No records Found In Second Semister .";   }
                    }
                    else{   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                     mysqli_close($link);

            }
            else{
                $_POST['Submit']='';
                if(isset($_POST['Submit'])) {?>
                    <div class="container my-5">
                        <style>
                            .border-top {
                                border-top: 10px solid #33b5e5 !important;
                                border-top-left-radius: .25rem!important;
                            	border-top-right-radius: .25rem!important;
                                }    section {
                            box-shadow: 10px 10px 10px grey;
                            }
                        </style>
            <!--Section: Content-->
                        <section class="text-center dark-grey-text mb-5">
                            <div class="card">
                                <div class="card-body rounded-top border-top p-5">
                                     <h1 class="font-weight-bold my-4">Course Is Added Into Semister Successfully</h1>
                                     <?php if(isset($_GET["dept_course_err"])){
                                      if($_GET["dept_course_err"]==11)   {  ?>
                                        <div class="alert alert-success">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                            </span>
                                         </div>
                                     <?php } else {  ?>
                                        <div class="alert alert-danger">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span><?php echo $_GET["dept_course_err"];?></i>
                                            </span>
                                         </div>
                                     <?php  }} ?>
                                </div>
                            </div>
                        </section>
                    </div>
                    <hr style=" background-color: #007500">
                    <hr style=" background-color: #FFFF00">
                    <hr style=" background-color: #FF0000"><?php
                }
            } ?>
        </div>
    </div>
</body>
</html>
<?php }} else{  header('location:index.php'); } ?> 