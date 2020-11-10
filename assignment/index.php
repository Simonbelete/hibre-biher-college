
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../bootstrap/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
<section id="about">
    <div class="container">
        <div class="center">
            <div class="col-md-6 col-md-offset-3">
                <h3>Our College Academic Program Lists</h3>
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
                            $sql = "SELECT DISTINCT Dept_Id,Dept_Name FROM department_program_view";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){ ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading ">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" 
													   href="<?php echo "#".$row['Dept_Id'];?>">
                                                      <?php echo  "Departments Of ".$row['Dept_Name']; ?>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>

                                            <div id="<?php echo $row['Dept_Id']; $x=$row['Dept_Name']; ?>" class="panel-collapse collapse ">
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="media-body">
                                                            <?php
                                                     $sql2 = "SELECT DISTINCT  program_name FROM department_program_view where Dept_Name='$x'" ;
                                                                    if($result2 = mysqli_query($link, $sql2)){
                                                                        if(mysqli_num_rows($result2) > 0){
                                                                            while($row2 = mysqli_fetch_array($result2)){
                                                                                ?>
                                                                                 <br>
                                                                                <i class="fa fa-arrow-circle-right" 
																				   style="color:green; font-size: 30px">
																					<?php echo " ".$row2['program_name']." Program" ;?></i>
                                                                                 <br>
                                                                                <?php
                                                                                $pro_name= $row2['program_name'] ;
                                $sql3 = "SELECT DISTINCT  Name FROM department_program_view where Dept_Name='$x' and program_name='$pro_name'" ;
                                                                                if($result3 = mysqli_query($link, $sql3)){
                                                                        if(mysqli_num_rows($result3) > 0){
                                                                            while($row3 = mysqli_fetch_array($result3)){
                                                                                ?>
                                                                                 <br>
                                                                                <i class="fa fa-chevron-circle-right" 
																				   style="margin-left: 50px;font-size: 28px">
																					<?php echo " ".$row3['Name'] ;?></i>
                                                                                 <br>
                                                                                <?php
                                                                            } mysqli_free_result($result3);
                                                                        }
                                                                        else{
                                                                            echo "No records matching your query were found.";
                                                                        }
                                                                    }
                                                                            } mysqli_free_result($result2);
                                                                        }
                                                                        else{
                                                                            echo "No records matching your query were found.";
                                                                        }
                                                                    }
                                                             ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <?php
                                    } mysqli_free_result($result);
                                }
                                else{
                                    echo "No records matching your query were found.";
                                }
                            }
                            else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
    </section>