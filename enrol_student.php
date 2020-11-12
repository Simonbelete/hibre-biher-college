<?php
 session_start();
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
      if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    <title>Hibre Biher Collage</title></title>
    <link rel="stylesheet" href="bootstrap/4.1.0bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome.min.css" />
    <script src="bootstrap/fontawesome.js"></script>
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/4.1.0bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
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
                            <h1 class="font-weight-bold my-4">Student Enrolment For A Department</h1>

                          <?php if(isset($_GET["updt_err"])){
                              if($_GET["updt_err"]==1)   {  ?>
                                <div class="alert alert-success">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data updated successfully.</i>
                                    </span>
                                 </div>
                            <?php }   if($_GET["updt_err"]==2) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data is not updated successfully.</i>
                                    </span>
                                 </div>
                            <?php  }} ?>
                            <?php if(isset($_GET["stud_enrol_err"])){
                              if($_GET["stud_enrol_err"]==1)   {  ?>
                                <div class="alert alert-success">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data saved successfully.</i>
                                    </span>
                                 </div>
                            <?php }   if($_GET["stud_enrol_err"]==2) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data is not saved successfully.</i>
                                    </span>
                                 </div>
                            <?php  } ?>
                            <?php    if($_GET["stud_enrol_err"]==3) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>One Student Can't Be Registered For More than One Dpartment.</i>
                                    </span>
                                 </div>
                            <?php  }} ?>
                             <form action="database/student_enrolment.php" method="post">
                                 <div class="row">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>REGISTRATION ID</b></label>
                                            <select id="reg_id" name="reg_id" class="form-control"required>
                                                <?php
                                                    $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                    if($link === false){
                                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                                    }

                                                    $sql = "SELECT Registration_Id FROM user_student where Status='In Active'";
                                                    if($result = mysqli_query($link, $sql)){
                                                        if(mysqli_num_rows($result) > 0){
                                                            while($row = mysqli_fetch_array($result)){
                                                                echo "<option value=" . $row['Registration_Id'] .">".$row['Registration_Id']. "</option>";

                                                            }
                                                            mysqli_free_result($result);
                                                        } else{
                                                            echo "No records matching your query were found.";
                                                        }
                                                    } else{
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }

                                                    mysqli_close($link);
                                                ?>
                                            </select>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>PROGRAM</b></label>
                                            <select id="Program" name="Program" class="form-control"required>
                                                <?php                                                      $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                    if($link === false){
                                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                                    }
                                $sql = "SELECT Id,Dept_Name, program_name,Name  FROM department_program_view ORDER BY Dept_Name";
                                                                    if($result = mysqli_query($link, $sql)){
                                                                        if(mysqli_num_rows($result) > 0){
                                                                            while($row = mysqli_fetch_array($result)){
                                                                                echo "<option value=".$row['Id'].">".$row['Dept_Name']." ".$row['program_name']." ".$row['Name']. "</option>";
                                                                            }
                                                                            mysqli_free_result($result3);
                                                                        }
                                                                    }

                                                    mysqli_close($link);
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                 </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>STUDENT ID</b></label>
                                            <input type="text" name="stud_id" onchange="A()" required="required" class="form-control">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><b>Password</b></label>
                                            <input type="password" placeholder="Insert student id for temporary password"  name="password"  required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                           <label>Section<b></b></label>
                                           <select name="Section" id="" class="form-control">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                       <input type="Submit" name=" Submit" value="Submit" class="btn btn-success" />
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <h2 class="pull-left" style="text-align: center">Students Details</h2>
            <?php
            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $sql = "SELECT * FROM user_student";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Enrol Id</th>";
                                echo "<th>Student_Name</th>";
                                echo "<th>Gender</th>";
                                echo "<th>Batch</th>";
                                echo "<th>Status</th>";
                                echo "<th>Department&Program</th>";
                                echo "<th>Section</th>";
                                echo "<th>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                         $x=1;
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>";
                                echo "<td>" . $row['Registration_Id'] . "</td>";
                                echo "<td>" . $row['First_Name'] ."  ". $row['Last_Name'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";

                                if($row['Batch']==NULL){
                                    echo "<td class='btn-danger'>" . $row['Batch'] . "</td>";
                                } else echo  "<td class='btn-success'>" . $row['Batch'] . "</td>";


                                if($row['Status']=='In Active'){
                                    echo "<td class='btn-danger'>" . $row['Status'] . "</td>";
                                } else echo  "<td class='btn-success'>" . $row['Status'] . "</td>";

                                if($row['program']=='Null'){
                                    echo "<td class='btn-danger'>" . $row['program'] . "</td>";
                                } else echo  "<td class='btn-success'>" . $row['program'] . "</td>";


                                 if($row['Section']=='Null'){
                                    echo "<td class='btn-danger'>" . $row['Section'] . "</td>";
                                } else echo  "<td class='btn-success'>" . $row['Section'] . "</td>";

                                echo "<td>";
      echo "<a href='windows/user_profile.php?id=". $row['Registration_Id'] ."'>"; ?><i class="fa fa-eye" style="font-size: 30px">View</i></a>
                                  
		
		
		
		
		
		
		
		
		<?php
                               echo "</td>";

                            echo "</tr>";
                           ++$x;
                        }
                        echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<br><br><br><p class='lead btn-danger'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            // Close connection
            mysqli_close($link);
            ?>
        </div>
    </div>
</body>
</html>
<?php }} else{  header('location:index.php'); } ?>