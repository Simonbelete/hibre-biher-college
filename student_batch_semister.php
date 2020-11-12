
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <div class="wrapper">
                <div class="container-fluid"><?php
                    if(isset($_POST['left_department'])){
                        $al=$_POST['left_department'];?>
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
                                         <h1 class="font-weight-bold my-4">Student  Batch And Semister</h1>
                                         <form action="database/student_batch_semister.php" method="post">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label><b>STUDENT ID</b></label>
                                                            <select id="stud_id" name="stud_id" class="form-control"required>
                                                                <?php
                                                                    $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                                    if($link === false){ die("ERROR: Could not connect. " . mysqli_connect_error());
                                                                    }
                                                                    $sql = "SELECT DISTINCT Student_id FROM student_batch_dept_pro_view where program like '$al%' ";
                                                                    if($result = mysqli_query($link, $sql)){
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            while($row = mysqli_fetch_array($result)){
                                                                                echo "<option value=".$row['Student_id'].">".$row['Student_id']."</option>";
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
                                                <div class="col-lg-4">
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
                                                <div class="col-lg-4">
                                                   <div class="form-group">
                                                        <label><b>Section</b></label>
                                                        <select id="Section" name="Section" class="form-control"required>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                            <option value="E">E</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label><b>FIRST SEMISTER</b></label>
                                                            <select id="first_semister" name="first_semister" class="form-control"required>
                                                                <option value="Complete">Complete</option>
                                                                <option value="Incomplete">Incomplete</option>
                                                                <option value="Not Registered">Not Registered</option>
                                                                <option value="Registered">Registered</option>
                                                                <option value="Withdrawal">Withdrawal</option>
                                                            </select>
                                                         </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                   <div class="form-group">
                                                        <label><b>SECOND SEMISTER</b></label>
                                                        <select id="second_semister" name="second_semister" class="form-control"required>
                                                                <option value="Complete">Complete</option>
                                                                <option value="Incomplete">Incomplete</option>
                                                                <option value="Not Registered">Not Registered</option>
                                                                <option value="Registered">Registered</option>
                                                                <option value="Withdrawal">Withdrawal</option>
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
                        </div>
                        <hr style=" background-color: #007500">
                        <hr style=" background-color: #FFFF00">
                        <hr style=" background-color: #FF0000">
                        <?php
                        $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306", "hbceduet", "qazxsw", "hbc")  or die(mysqli_error());
                        $sql = "SELECT Dept_Name,program_name,Name FROM department_program_view where Dept_Name='$al'";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $dept=$row['Dept_Name'];
                                    $programm=$row['program_name'];      // bachlour,master or phd
                                    $Name=$row['Name'];
                                                $sql2 = "SELECT * FROM student_batch_dept_pro_view where program='$dept $programm $Name'  ORDER BY Batch ASC";
                                                if($result2 = mysqli_query($link, $sql2)){
                                                    if(mysqli_num_rows($result2) > 0){?>
                                                       <div class="container my-1">
                                                            <section class="text-center dark-grey-text mb-0">
                                                                <div class="card A">
                                                                    <div class="card-body rounded-top border-top p-0" style="background: #575757">
                                                                         <h4 class="font-weight-bold my-4"><?php echo "Department Of ". $dept." ". $programm." ".$Name." Students List"; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                      <?php
                                                        echo "<table class='table table-bordered table-striped'>";
                                                            echo "<thead>";
                                                                echo "<tr>";
                                                                    echo "<th>No_</th>";
                                                                    echo "<th>Full Name</th>";
                                                                    echo "<th>Gender</th>";
                                                                    echo "<th>Student_id</th>";
                                                                    echo "<th>Program</th>";
                                                                    echo "<th>Section</th>";
                                                                    echo "<th>Batch</th>";
                                                                    echo "<th>First_Semister</th>";
                                                                    echo "<th>Second_Semister</th>";
                                                                    echo "<th>Action</th>";
                                                                echo "</tr>";
                                                            echo "</thead>";
                                                            echo "<tbody>";
                                                            $no=1;
                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                echo "<tr>";
                                                                    echo "<td> $no</td>";
                                                                    echo "<td>" . $row2['First_Name'] ." ".$row2['Last_Name']." ".$row2['Grand_Father_Name']. "</td>";
                                                                    echo "<td>" . $row2['gender'] . "</td>";
                                                                    echo "<td>" . $row2['Student_id'] . "</td>";
                                                                    echo "<td> $programm </td>";
                                                                    echo "<td>".$row2['Section']. "</td>";
                                                                    echo "<td>" . $row2['Batch'] . "</td>";

                                                                    if($row2['First_Semister']=='Incomplete'){
                                                                        echo "<td class='btn-danger'>" . $row2['First_Semister'] . "</td>";
                                                                    }
                                                                     else if($row2['First_Semister']=='Complete'){
                                                                        echo "<td class=' btn-success'>" . $row2['First_Semister'] . "</td>";
                                                                    }else echo  "<td class='btn-warning'>" . $row2['First_Semister'] . "</td>";

                                                                     if($row2['Second_Semister']=='Incomplete'){
                                                                        echo "<td class='btn-danger'>" . $row2['Second_Semister'] . "</td>";
                                                                        }
                                                                     else if($row2['Second_Semister']=='Complete'){
                                                                        echo "<td class=' btn-success'>" . $row2['Second_Semister'] . "</td>";
                                                                    } else echo  "<td class=' btn-warning'>" . $row2['Second_Semister']. "</td>";


                                                                    echo "<td>";
                                                                       // echo "<a href='read.php?id=". $row2['Student_id'] ."' title='View Record' data-toggle='tooltip'>";
                                                      ?>                <img src="../Icon/View.png" alt="" width="30px" />
                                                                       <?php
                                                                    echo "</td>";
                                                                echo "</tr>";
                                                                ++$no;
                                                            }
                                                            echo "</tbody>";
                                                        echo "</table>";
                                                        // Free result set
                                                        mysqli_free_result($result2);
                                                    }
                                                }
                                                else{  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }


                                }
                                mysqli_free_result($result);
                            }
                            else{ echo "<br><br><br><p class='lead btn-danger'><em>No records were found.</em></p>";}
                        }
                        else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                        // Close connection
                        mysqli_close($link);
                    }
                    else{
                        $_POST['Submit']='';
                        if(isset($_POST['Submit'])) { ?>
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
                                             <h1 class="font-weight-bold my-4">Student  Batch And Semister</h1>
                                             <?php if(isset($_GET["stud_batch_sem_err"])){
                                              if($_GET["stud_batch_sem_err"]==11)   {  ?>
                                                <div class="alert alert-success">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                                    </span>
                                                 </div>
                                             <?php }   if($_GET["stud_batch_sem_err"]==22) {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>Student is not registered in a semister .</i>
                                                    </span>
                                                 </div>
                                             <?php  }  if($_GET["stud_batch_sem_err"]==23) {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>A Student is not finished The Previous Batch Or Semister or it completes thier registration completly.</i>
                                                    </span>
                                                 </div>
                                                 <?php  }  if($_GET["stud_batch_sem_err"]=='empty') {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>A Student is  Not Registered Please Register Him First.</i>
                                                    </span>
                                                 </div>
                                                 <?php  }  if($_GET["stud_batch_sem_err"]=='noAlowed') {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>A Student Can't Be Registered For Second Semister Before He/She Complete First Semister</i>
                                                    </span>
                                                 </div>
                                                 <?php  }  if($_GET["stud_batch_sem_err"]=='disabled') {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>You update already exist data</i>
                                                    </span>
                                                 </div>
                                                  <?php  }  if($_GET["stud_batch_sem_err"]=='success') {  ?>
                                                <div class="alert alert-success">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>Update Is Done Successfully</i>
                                                    </span>
                                                 </div>
                                             <?php }   if($_GET["stud_batch_sem_err"]==20) {  ?>
                                                <div class="alert alert-danger">
                                                    <span class="help-block">
                                                        <i class="small"><span style="">×</span>One Student Can't Be Registered For The Same Batch.</i>
                                                    </span>
                                                 </div>
                                             <?php  }} ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <hr style=" background-color: #007500">
                            <hr style=" background-color: #FFFF00">
                            <hr style=" background-color: #FF0000"> <?php
                        }
                    } ?>
                </div>
            </div>     
        </body>
        </html> 