<?php
     session_start();
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
         if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hibre Biher Collage</title>
        <link rel="stylesheet" href="bootstrap/4.1.0bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/fontawesome.css" />
        <link rel="stylesheet" href="bootstrap/fontawesome.min.css" />
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
                                <h1 class="font-weight-bold my-4 align="center" ">Program Enrolment For A Department</h1>
                                <?php if(isset($_GET["dept_pro_err"])){
                                  if($_GET["dept_pro_err"]==11)   {  ?>
                                    <div class="alert alert-success">
                                        <span class="help-block">
                                            <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                        </span>
                                     </div>
                                <?php }   if($_GET["dept_pro_err"]==22) {  ?>
                                    <div class="alert alert-danger">
                                        <span class="help-block">
                                            <i class="small"><span style="">×</span>Your data is not saved successfully.</i>
                                        </span>
                                     </div>
                                <?php }   if($_GET["dept_pro_err"]==20) {  ?>
                                    <div class="alert alert-danger">
                                        <span class="help-block">
                                            <i class="small"><span style="">×</span>The Same Data Can Not Be Added.</i>
                                        </span>
                                     </div>
                                <?php  }} ?>
                                 <form action="database/Add_program_for_dept.php" method="post">
                                     <div class="row">
                                         <div class="col-sm-4">
                                            <div class="form-group">
                                                <label><b>Department Name</b></label>
                                                <select id="Department"  name="dept_name" class="form-control"required>
                                                    <?php
                                                        $link = mysqli_connect("10.180.50.214:3306", "hbceduet", "qazxsw", "hbc")  or die(mysqli_error());
                                                        if($link === false){
                                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                                        }

                                                        $sql = "SELECT Dept_Id,Dept_Name FROM department ";
                                                        if($result = mysqli_query($link, $sql)){
                                                            if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_array($result)){
                                                                    echo "<option value=" . $row['Dept_Id'] .">". $row['Dept_Name'] ."</option>";
                                                                }
                                                                mysqli_free_result($result);
                                                            }
                                                            else { echo "<option disabled='disabled' value='Department not found'>Department not found</option>";}
                                                        }

                                                        mysqli_close($link);
                                                    ?>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="col-sm-4">
                                             <div class="form-group">
                                                <label><b>Program Name</b></label>
                                                <select id="program" name="program_name" class="form-control"required>
                                                    <?php
                                                        $link = mysqli_connect("10.180.50.214:3306", "hbceduet", "qazxsw", "hbc")  or die(mysqli_error());
                                                        if($link === false){
                                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                                        }

                                                        $sql = "SELECT program_id,program_name FROM program ";
                                                        if($result = mysqli_query($link, $sql)){
                                                            if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_array($result)){
                                                                        echo "<option value=" . $row['program_id'] .">". $row['program_name'] . "</option>";

                                                                }
                                                                mysqli_free_result($result);
                                                            }
                                                        }

                                                        mysqli_close($link);
                                                    ?>
                                                </select>
                                             </div>
                                        </div>
                                        <div class="col-sm-4">
                                             <div class="form-group">
                                                <label><b>Type Name</b></label>
                                                <select id="type" name="type_name" class="form-control"required>
                                                    <?php
                                                        $link = mysqli_connect("10.180.50.214:3306", "hbceduet", "qazxsw", "hbc")  or die(mysqli_error());
                                                        if($link === false){
                                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                                        }

                                                        $sql = "SELECT Name FROM type ";
                                                        if($result = mysqli_query($link, $sql)){
                                                            if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_array($result)){
                                                                        echo "<option value=" . $row['Name'] .">". $row['Name'] . "</option>";

                                                                }
                                                                mysqli_free_result($result);
                                                            }
                                                        }

                                                        mysqli_close($link);
                                                    ?>
                                                </select>
                                             </div>
                                        </div>
                                     </div>

                                        <input type="Submit" name=" Submit" value="Submit" class="btn btn-dark" />
                                 </form>
                            </div>
                        </div>
                    </section>
                </div>

                <h2 align="center" >Department And Program Details</h2><br>
                <?php
                $link = mysqli_connect("10.180.50.214:3306", "hbceduet", "qazxsw", "hbc")  or die(mysqli_error());
                $sql = "SELECT * FROM department_program_view  ORDER BY Dept_Name ASC";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table  class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Id</th>";
                                    echo "<th>Department_Name</th>";
                                    echo "<th>Program_Name</th>";
                                    echo "<th>Type_Name</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                             $x=1;
                            while($row = mysqli_fetch_array($result)){

                                echo "<tr>";
                                    echo "<td>" . $row['Id'] . "</td>";
                                    echo "<td>" . $row['Dept_Name'] . "</td>";
                                    echo "<td>" . $row['program_name'] . "</td>";
                                    echo "<td>" . $row['Name'] . "</td>";
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