       <?php
if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
        $id=$_SESSION['username'];
     if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){?>
        <nav id="sidebar" style="min-width: 250px;   max-width: 250px;" >
           <?php require_once('windows/img.php') ; ?>
            <ul class="list-unstyled components">
                <li >
                    <a href="#gradeSubmenu"style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" 
					   class="dropdown-toggle" >Manage Grade</a>
                    <ul style="" class="collapse list-unstyled"  id="gradeSubmenu">
                        <li>
                            <a href="general_grade_scale.php"class="btn btn-light"style='margin-left: 1px; width: 98%' 
							   id="drop_bottem">View Grede Scale</a>
                        </li>
                        <li>
                            <a href="general_rade_view.php"class="btn btn-light"style=' margin-left: 1px;  width: 98%' 
							   id="drop_bottem">View Students Grade</a>
                        </li>
                        <?php  if(  $_SESSION['role']=='admin' ){ ?>
                            <li>
                                <?php
                                    $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                    if($link === false){  die("ERROR: Could not connect. " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT DISTINCT Dept_Name FROM department_program_view ORDER BY Dept_Name ASC";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                $x= $row['Dept_Name'];
                                                echo "<a href='#$x' id='drop_bottem'   
														   style='font-weight: bold; margin-left: 1px; width: 98%' data-toggle='collapse' 
														   aria-expanded='false' 
														   class='dropdown-toggle btn btn-light'>". $row['Dept_Name'] . "</a>";
                                                echo "<ul class='collapse list-unstyled'    id=$x>";
                                              $sql4= "SELECT DISTINCT  program,Batch FROM student_batch_dept_pro_view where program like '$x%'";
                                                    if($result4 = mysqli_query($link, $sql4)){
                                                        if(mysqli_num_rows($result4) > 0){
                                                            while($row4 = mysqli_fetch_array($result4)){
                                                                $Batch= $row4['Batch'];
                                                                $program= $row4['program'];
                                                                $pp=$program." ".$Batch;
                                                                $y=substr(strstr($pp," "),1);  // remove the first word of a sentence and add batch at the end
                                                                echo "<a href='#$pp' id='drop_bottem'   
														   style=' margin-left: 1px;  padding-left: 10px ; color: #0000FF; width: 98%' 
														   data-toggle='collapse' aria-expanded='false' 
														   class='dropdown-toggle btn btn-light'>".$y. "</a>";
                                                                echo "<ul class='collapse list-unstyled'    id=$pp>";?>
                                                                    <form action="General_set_grade.php" method="post">
                                                                        <?php
                              $sql5= "SELECT DISTINCT  Section FROM student_batch_dept_pro_view where program = '$program' and Batch='$Batch'";
                                                                            if($result5 = mysqli_query($link, $sql5)){
                                                                                if(mysqli_num_rows($result5) > 0){
                                                                                    while($row5 = mysqli_fetch_array($result5)){
                                                                                        $Section= $row5['Section'];
                                                                                         echo  " <li>
                                             <input  style='margin: 5px; width: 95%; height: 50px'   
														   type='submit' name='left_gradee' value='$Section' 
														   class='btn btn-info' id='drop_bottem' />
                                                                                                </li>
                                                                           <input type='text' hidden='hidden' name='section' value='$program' />
                                                                            <input type='text' hidden='hidden' name='batch' value='$Batch' />";
                                                                                     }mysqli_free_result($result5);
                                                                                }   else echo "kk";
                                                               }else{ echo "ERROR: Could not able to execute $sql5. " . mysqli_error($link); }
                                                                        ?>
                                                                   </form> <?php
                                                                echo "</ul>";
                                                            }mysqli_free_result($result4);
                                                        }
                                                    }
                                                echo "</ul>";
                                            }
                                            mysqli_free_result($result);
                                        }
                                        else{  echo "No records matching your query were found."; }
                                    }
                                    else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                                    mysqli_close($link);
                                ?>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a href="#studentSubmenu" style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" 
														   class="dropdown-toggle">Students</a>
                    <ul class="collapse list-unstyled"  id="studentSubmenu">
                        <li>
                            <a href="general_view.php"class='btn btn-info'style=' margin-left: 1px; width: 98%'
														   id='drop_bottem'>View Student</a>
                        </li>
                        <?php  if(  $_SESSION['role']=='admin' ){ ?>
                            <li>
                                <a href="general_enrolment.php"class='btn btn-info'style=' margin-left: 1px; width: 98%' 
								   id='drop_bottem'>Enrol Student</a>
                            </li>
                            <form action="general_student_batch_semister.php" method="post">
                                <?php
                                    $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                    if($link === false){
                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT DISTINCT  Dept_Name FROM department_program_view";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                $dname= $row['Dept_Name'];
                                                echo"
                                                   <li>
                                                     <input  style=' margin-left: 1px; width: 98%'' type='submit' 
													 name='left_department' value='$dname' class='btn btn-info' id='drop_bottem' />
                                                   </li>  ";
                                            }
                                            mysqli_free_result($result);
                                        }
                                    }
                                    else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                                    mysqli_close($link);
                                ?>
                            </form>
                         <?php } ?>
                    </ul>
                </li>
                <li>
                    <a href="#CoursesSubmenu" style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" 
					   class="dropdown-toggle">Courses</a>
                    <ul class="collapse list-unstyled"  id="CoursesSubmenu">
                    <?php if(  $_SESSION['role']=='dean'){ ?>
                        <li>
                            <a href="course.php"  class='btn btn-info' id='drop_bottem' 
							   style='margin-left: 1px; width: 98%' id="drop_bottem">Course List</a>
                        </li>
                        <li>
                            <a href="lecture_course.php"  class='btn btn-info' id='drop_bottem' 
							   style='margin-left: 1px; width: 98%' id="drop_bottem">Assign Lecture</a>
                        </li>
                    <?php } ?>
                        <form action="General_Department_Course.php" method="post">
                            <?php
                                $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                if($link === false){
                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                }
                                $sql = "SELECT DISTINCT  Dept_Name FROM department_program_view";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            $dname= $row['Dept_Name'];
                                            echo"
                                               <li>
                                                 <input  style='margin-left: 1px; width: 98%' type='submit' 
												 name='left_department_course' value='$dname' class='btn btn-info' id='drop_bottem' />
                                               </li>  ";
                                        }
                                        mysqli_free_result($result);
                                    }
                                }
                                else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                                mysqli_close($link);
                            ?>
                        </form>
                    </ul>
                </li>
                <?php  if(  $_SESSION['role']=='dean' ){ ?>
                    <li>
                        <a href="#ProDeptSubmenu" style="font-weight: bold;" data-toggle="collapse" aria-expanded="false"
						   class="dropdown-toggle">Department_Programs</a>
                        <ul class="collapse list-unstyled"  id="ProDeptSubmenu">
                            <li>
                                <a href="general_program_for_dep.php"class='btn btn-light' id='drop_bottem'>Add Program For Departments</a>
                            </li>
                        </ul>
                    </li>
                <li>
                    <a href="General_employe.php"id="drop_bottem"style='margin-left: 1px; width: 98%' class="btn btn-light">View Employes</a>
                </li>
                <?php } ?>
                <li>
                    <hr style="background: #008080">
                </li>

                <li>
                    <a href="sidebar.php"id="drop_bottem"style='margin-left: 1px; width: 98%' class="btn btn-light">Main Page</a>
                </li>
                <li>
                    <a href="notice.php"id="drop_bottem"style='margin-left: 1px; width: 98%'class="btn btn-light drop">Notice Board</a>
                </li>
                <?php if(  $_SESSION['role']=='dean'){ ?>
                <li>
                    <a href="General_ImageChange.php"id="drop_bottem"style='margin-left: 1px; width: 98%' 
					   class="btn btn-light">Change Images</a>
                </li>
                <li>
                    <a href="general_view_comments.php"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Comments</a>
                </li>
                <li>
                    <a href="General_view_news.php"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">News</a>
                </li>
                <?php } ?>
                <li>
                    <a href="#"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Contact</a>
                </li>
            </ul>
        </nav>
        <?php }
         if(  $_SESSION['role']=='vice dean'|| $_SESSION['role']=='head' ){ ?>

            <nav id="sidebar" style="min-width: 250px;   max-width: 250px;" >
           <?php require_once('windows/img.php') ; ?>
            <ul class="list-unstyled components">
                <li>
                    <hr style="background: #008080">
                </li>
                <li>
                    <a href="notice.php"id="drop_bottem"style='margin-left: 1px; width: 98%'class="btn btn-light drop">Notice Board</a>
                </li>
            </ul>
        </nav>





         <?php }

        } else{  header('location:index.php'); } ?>