  <?php
    session_start();
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
    $id=$_SESSION['username'];  ?>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
<section id="about">
    <div class="container">
        <div class="center">
            <div class="col-md-6 col-md-offset-3">
                <h3>My Courses Lists</h3>
                <hr>
            </div>
        </div>
    </div>                        
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeInDown">
                <div class="accordion">
                    <div class="panel-group" id="accordion1">
                        <?php
                            $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                            if($link === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = "SELECT DISTINCT All_Program,Batch,Section,course_id,c_name FROM lecture_cours_view where Employee_Id='$id'";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){ ?>

                                 <table class='table table-bordered table-striped table-dark' style='border-width: 200px;border: #000000'>
                                    <thead>
                                         <tr class='alert-info'>
                                         <th>Lecture Id</th>
                                         <th>Program</th>
                                         <th>Batch</th>
                                         <th>Section</th>
                                         <th>Course Code</th>
                                         <th>Course Name</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($row = mysqli_fetch_array($result)){
                                           $All_Program=$row['All_Program'];
                                           $Batch=$row['Batch'];
                                           $Section=$row['Section'];
                                           $course_id=$row['course_id'];
                                           $c_name=$row['c_name']; ?>
                                            <tr>
                                                <td><?php echo  $id; ?></td>
                                                <td><?php echo  $All_Program; ?></td>
                                                <td><?php echo  $Batch; ?></td>
                                                <td><?php echo  $Section; ?></td>
                                                <td><?php echo  $course_id; ?></td>
                                                <td><?php echo  $c_name; ?></td>
                                            </tr>


                                           <?php
                                        } mysqli_free_result($result);?>
                                    </tbody>
                                 </table>
                                <?php }
                                else{
                                    echo "No records matching your query were found.";
                                }
                            }
                            else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
    </section>
     <?php
    }
    else{ header('location:../index.php'); } ?>