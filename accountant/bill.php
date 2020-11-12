   <?php
            if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
                 if(  $_SESSION['role']=='accountant' ){
            $id=$_SESSION['username'];  ?>

    <div class="wrapper">
        <div class="container-fluid">
            <?php
            if(isset($_POST['left_grade'])){
                $pro=$_POST['left_grade'];
                $dept=$_POST['dept'];
                $full_program= substr($pro,0,strlen($pro)-2);  // remove last 2 leters of a string
                $words = explode(' ', $pro);
                $batch = array_pop($words);// left over last words of a string
                ?>
                <div class="container my-5">
                    <style>
                        .border-top {
                            border-top: 10px solid #33b5e5 !important;
                            border-top-left-radius: .25rem!important;
                        	border-top-right-radius: .25rem!important;
                            }    section {
                        box-shadow: 10px 10px 10px grey;
                        }
                        .t{
                            align-self: center;
                            font-family: 'Kreon', serif;
                            font-weight: 300;
                            font-size: 2em;
                            color: #000000;
                            font: small-caps;
                            text-shadow:  rgba(16, 16, 16, 0.4) 1px 18px 6px,
                                          white -0.15em -0.1em 100px;"
                        }

                    </style>
            <!--Section: Content-->
                    <section class="text-center dark-grey-text mb-5">
                        <div class="card">
                            <div class="card-body rounded-top border-top p-5">
                                <h4 class="font-weight-bold my-0 t"><?php echo $dept." , ".$full_program." Students  Grade List for Batch".$batch." , First Semister";?> </h4>
                                <br> <br>
                                <form action="../database/set_grade.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Student Id</label>
                                                    <select id="s_id" name="s_id" class="form-control" required>
                                                        <?php
                                                            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                            $req=$dept." ".$full_program;
                                                            $result = explode(' ', $req);
                                                            $final_req = array_pop($result);// left over last words of a string
                                                            $aa=strlen($final_req)+1;// count length of last word and add space before the word
                                                            $ss=substr($req,0,strlen($req)-$aa);// remove the last word frome the orginal string;
                                                            $sql = "SELECT Student_id FROM student_batch_dept_pro_view where program ='$ss' and Type='$final_req' and Batch='$batch'and First_Semister='Enabled' ";
                                                            if($resultt = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($resultt) > 0){
                                                                    while($row = mysqli_fetch_array($resultt)){  ?>
                                                                        <option value="<?php echo $row['Student_id'];?>"><?php echo $row['Student_id'];?></option><?php
                                                                    }
                                                                    mysqli_free_result($resultt);
                                                                }
                                                                else{    echo "<option disabled='disabled' >Thier  Is No Registered Student In This Semister</option>";  }
                                                            }
                                                            else{  echo "<option disabled='disabled' >". mysqli_error($link)  ."</option>";   }
                                                            mysqli_close($link);
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                               <div class="form-group">
                                                    <label>Course Code</label>
                                                    <select id="c_id" name="c_id" class="form-control" required>
                                                        <?php
                                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                            $sql = "SELECT Course_Id,c_name FROM batch_semister_course_program_vies where Semister ='First semister' and All_Program ='$dept $full_program' and Batch='$batch' ";
                                                            if($result = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_array($result)){  ?>
                                                                        <option value="<?php echo $row['Course_Id'];?>"><?php echo $row['Course_Id'];?></option><?php
                                                                    }
                                                                    mysqli_free_result($result);
                                                                }
                                                                else{    echo "<option disabled='disabled' >Thier  Is No Registered Student In This Semister Please Goto Course -> then select that you wants</option>";  }
                                                            }
                                                            else{  echo "<option disabled='disabled' >". mysqli_error($link)  ."</option>";   }
                                                            mysqli_close($link);
                                                        ?>
                                                    </select>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mid Exam</label>
                                                    <input name="mid" type="number" step="0.1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Quize Exam</label>
                                                    <input name="quize" type="number" step="0.1"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Assignment/project</label>
                                                    <input name="assign" type="number" step="0.1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Final Exam</label>
                                                    <input name="final" type="number" step="0.1"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input hidden="hidden" name="batch" value="<?php echo $batch;?>" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input hidden="hidden" name="semister" value="First semister" type="text">
                                                    <input hidden="hidden" name="A_program" value="<?php echo $dept." ".$full_program;?>" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="Submit" name="Submit" value="Register" class="btn btn-success" />
                                        <input type="Submit" name="Submit" value="Update" class="btn btn-success">
                                    </form>                    <br>
                                    <?php
                                        $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());    // bachlour,master or phd
                                            $sql2 = "SELECT * FROM student_course where Batch='$batch' and Semister='First semister' and All_Program='$dept $full_program' ";
                                            if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                    echo "<table class='table table-bordered table-striped'>";
                                                        echo "<thead>";
                                                            echo "<tr>";
                                                                echo "<th>#</th>";
                                                                echo "<th>Student Id</th>";
                                                                echo "<th>Course Code</th>";
                                                                echo "<th>Mid </th>";
                                                                echo "<th>Quize </th>";
                                                                echo "<th>Assignment </th>";
                                                                echo "<th>Final </th>";
                                                                echo "<th>Total</th>";
                                                                echo "<th>Leter </th>";
                                                            echo "</tr>";
                                                        echo "</thead>";
                                                        echo "<tbody>";
                                                        $no=1;
                                                        while($row2 = mysqli_fetch_array($result2)){
                                                            echo "<tr>";
                                                                echo "<td> $no</td>";
                                                                echo "<td>" . $row2['student_id'] . "</td>";
                                                                echo "<td>" . $row2['Course_id'] ."</td>";
                                                                echo "<td>" . $row2['mid']. "</td>";
                                                                echo "<td>" . $row2['quize'] . "</td>";
                                                                echo "<td>" . $row2['assignment'] . "</td>";
                                                                echo "<td>" . $row2['final'] ."</td>";
                                                                echo "<td>" . $row2['total']. "</td>";
                                                                echo "<td>" . $row2['letter_grade'] . "</td>";
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
                                        mysqli_close($link);
                                    ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body rounded-top border-top p-5">
                                <h5 class="font-weight-bold my-4 t"><?php echo $dept." , ".$full_program." Students  Grade List for Batch".$batch." , Second Semister";?> </h5>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Student Id</label>
                                                    <select id="s_id" name="s_id" class="form-control" required="required">
                                                        <?php
                                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                            $req=$dept." ".$full_program;
                                                            $result = explode(' ', $req);
                                                            $final_req = array_pop($result);// left over last words of a string
                                                            $aa=strlen($final_req)+1;// count length of last word and add space before the word
                                                            $ss=substr($req,0,strlen($req)-$aa);// remove the last word frome the orginal string;
                                                           $sql = "SELECT Student_id FROM student_batch_dept_pro_view where Second_Semister ='Enabled' and program ='$ss' and Type='$final_req' and Batch='$batch' ";
                                                            if($result = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_array($result)){  ?>
                                                                        <option value="<?php echo $row['Student_id'];?>"><?php echo $row['Student_id'];?></option><?php
                                                                    }
                                                                    mysqli_free_result($result);
                                                                }
                                                                else{    echo "<option disabled='disabled' >result not found</option>";  }
                                                            }
                                                            else{  echo "<option disabled='disabled' >". mysqli_error($link)  ."</option>";   }
                                                            mysqli_close($link);
                                                        ?>
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-lg-6">
                                               <div class="form-group">
                                                    <label>Course Code</label>
                                                    <select id="c_id" name="c_id" class="form-control" required="required">
                                                        <?php
                                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                            if($link === false){
                                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                                            }
                                                                $sql = "SELECT Course_Id,c_name FROM batch_semister_course_program_vies where Semister ='Second semister' and All_Program ='$dept $full_program' and Batch='$batch' ";
                                                                if($result = mysqli_query($link, $sql)){
                                                                    if(mysqli_num_rows($result) > 0){
                                                                        while($row = mysqli_fetch_array($result)){  ?>
                                                                            <option value="<?php echo $row['Course_Id'];?>"><?php echo $row['Course_Id'];?></option><?php
                                                                        }
                                                                        mysqli_free_result($result);
                                                                    }
                                                                    else{    echo "<option disabled='disabled' >result not found</option>";  }
                                                                }
                                                                else{  echo "<option disabled='disabled' >". mysqli_error($link)  ."</option>";   }
                                                                mysqli_close($link);
                                                        ?>
                                                    </select>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mid Exam</label>
                                                    <input name="mid" type="number" step="0.1"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Quize Exam</label>
                                                    <input name="quize" type="number" step="0.1"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Assignment/project</label>
                                                    <input name="assign" type="number" step="0.1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Final Exam</label>
                                                    <input name="final" type="number" step="0.1"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input hidden="hidden" name="batch" value="<?php echo $batch;?>" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input hidden="hidden" name="semister" value="Second semister" type="text">
                                                    <input hidden="hidden" name="A_program" value="<?php echo $dept." ".$full_program;?>" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="Submit" name="Submit" value="Register" class="btn btn-success" />
                                        <input type="Submit" name="Submit" value="Update" class="btn btn-success">
                                    </form>              <br>
                                    <?php
                                        $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());    // bachlour,master or phd
                                            $sql2 = "SELECT * FROM student_course where Batch='$batch' and Semister='Second semister' and All_Program='$dept $full_program' ";
                                            if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                    echo "<table class='table table-bordered table-striped'>";
                                                        echo "<thead>";
                                                            echo "<tr>";
                                                                echo "<th>#</th>";
                                                                echo "<th>Student Id</th>";
                                                                echo "<th>Course Code</th>";
                                                                echo "<th>Mid </th>";
                                                                echo "<th>Quize </th>";
                                                                echo "<th>Assignment </th>";
                                                                echo "<th>Final </th>";
                                                                echo "<th>Total</th>";
                                                                echo "<th>Leter </th>";
                                                            echo "</tr>";
                                                        echo "</thead>";
                                                        echo "<tbody>";
                                                        $no=1;
                                                        while($row2 = mysqli_fetch_array($result2)){
                                                            echo "<tr>";
                                                                echo "<td> $no</td>";
                                                                echo "<td>" . $row2['student_id'] . "</td>";
                                                                echo "<td>" . $row2['Course_id'] ."</td>";
                                                                echo "<td>" . $row2['mid']. "</td>";
                                                                echo "<td>" . $row2['quize'] . "</td>";
                                                                echo "<td>" . $row2['assignment'] . "</td>";
                                                                echo "<td>" . $row2['final'] ."</td>";
                                                                echo "<td>" . $row2['total']. "</td>";
                                                                echo "<td>" . $row2['letter_grade'] . "</td>";
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
                                        mysqli_close($link);
                                    ?>
                            </div>
                        </div>
                    </section>
                </div>
                <?php
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
                                     <?php if(isset($_GET["grade_err"])){
                                      if($_GET["grade_err"]=='insert')   {  ?>
                                        <div class="alert alert-success">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                            </span>
                                         </div>
                                     <?php }   if($_GET["grade_err"]=='notinsert') {  ?>
                                        <div class="alert alert-danger">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span>Your data is not saved successfully as a result of duplicated data.</i>
                                            </span>
                                         </div>
                                     <?php  }  if($_GET["grade_err"]=='update') {  ?>
                                        <div class="alert alert-success">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span>Data Updated successfully</i>
                                            </span>
                                         </div>
                                         <?php  }  if($_GET["grade_err"]!="update"&&$_GET["grade_err"]!="notinsert"&&$_GET["grade_err"]!="insert") {  ?>
                                        <div class="alert alert-danger">
                                            <span class="help-block">
                                                <i class="small"><span style="">×</span><?php echo $_GET["grade_err"]; ?></i>
                                            </span>
                                         </div>
                                         <?php  }}?>
                                </div>
                            </div>
                        </section>
                    </div>
                    <hr style=" background-color: #007500">
                    <hr style=" background-color: #FFFF00">
                    <hr style=" background-color: #FF0000">
                    <?php }   }?>
            </div>
        </div>
        <?php }} else{  header('location:index.php'); } ?>