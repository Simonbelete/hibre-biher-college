
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style5.css">
    <title>Hibre Biher Collage</title>
    <link rel="stylesheet" href="../bootstrap/css.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/fontawesome.min.css">
</head>
<section class="text-center dark-grey-text mb-5">
    <div class="card">
        <div class="card-body rounded-top border-top p-5">
            <h1 class="font-weight-bold my-4">Assign Lecture to Courses</h1>
            <form action="database/lecture_course.php" method="post">
                <div class="row">
                    <div class="col-lg-4">
                       <div class="form-group">
                            <label><b>Lecture Name</b></label>
                            <select id="Lecture" name="Lecture" class="form-control"required>
                                <?php
                                        $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT Employee_Id,First_Name,Last_Name FROM employee where Role='instructor' ORDER BY First_Name";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<option value=".$row['Employee_Id'].">".$row['First_Name']." ".$row['Last_Name']."</option>";
                                                }
                                                mysqli_free_result($result);
                                            }
                                            else{    echo "<option disabled='disabled' > Lecture Is Not Found</option>";  }
                                        }
                                        else{  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);    }
                                        mysqli_close($link);
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><b>Course Name</b></label>
                                <select id="course_id" name="course_id" class="form-control"required>
                                    <?php
                                        $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT DISTINCT Course_Id,c_name FROM batch_semister_course_program_vies ORDER BY c_name ";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<option value=".$row['Course_Id'].">".$row['c_name']."</option>";
                                                }
                                                mysqli_free_result($result);
                                            }
                                            else{    echo "<option disabled='disabled' > Course List Is Empty.</option>";  }
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
                            <div class="form-group">
                                <label><b>Section</b></label>
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
                </div>
                 <?php if(isset($_GET["lect_course_err"])){
                  if($_GET["lect_course_err"]==1001)   {  ?>
                    <div class="alert alert-success">
                        <span class="help-block">
                            <i class="small"><span style="">?</span>Your data saved successfully.</i>
                        </span>
                     </div>
                 <?php } else {  ?>
                    <div class="alert alert-danger">
                        <span class="help-block">
                            <i class="small"><span style="">?</span><?php echo $_GET["lect_course_err"];?></i>
                        </span>
                     </div>
                 <?php  }} ?>
                <input type="Submit" name="Submit" value="Submit" class="btn btn-success " />
            </form>
        </div>
    </div>
</section>
 