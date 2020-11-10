    <?php  if( isset($_SESSION['username'])&& isset($_SESSION['role'])&& $_SESSION['role']!='admin') {
        $id=$_SESSION['username'];?>
        <nav id="sidebar" >
            <?php require_once('img.php');?>
            <ul class="list-unstyled components">
                <li>
                    <a href="#gradeSubmenu"style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Manage Grade</a>
                    <ul style="" class="collapse list-unstyled"  id="gradeSubmenu">
                        <li>  <?php
                             $sql = "SELECT DISTINCT Dept_Name FROM department_program_view ORDER BY Dept_Name ASC";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                $x= $row['Dept_Name'];
                                                echo "<a href='#$x' id='drop_bottem'   style='font-weight: bold; margin-left: 1px; width: 98%' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle btn btn-light'>". $row['Dept_Name'] . "</a>";
                                                echo "<ul class='collapse list-unstyled'    id=$x>";
                                                    $sql4= "SELECT DISTINCT  program,Batch FROM student_batch_dept_pro_view where program like '$x%'";
                                                    if($result4 = mysqli_query($link, $sql4)){
                                                        if(mysqli_num_rows($result4) > 0){
                                                            while($row4 = mysqli_fetch_array($result4)){
                                                                $Batch= $row4['Batch'];
                                                                $program= $row4['program'];
                                                                $pp=$program." ".$Batch;
                                                                $y=substr(strstr($pp," "),1);  // remove the first word of a sentence and add batch at the end
                                                                echo "<a href='#$pp' id='drop_bottem'   style=' margin-left: 1px;  padding-left: 10px ; color: #0000FF; width: 98%' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle btn btn-light'>".$y. "</a>";
                                                                echo "<ul class='collapse list-unstyled'    id=$pp>";?>
                                                                    <form action="lecture_set_grade.php" method="post">
                                                                        <?php
                                                                            $sql5= "SELECT DISTINCT  Section FROM lecture_cours_view where Employee_Id='$id' and All_Program = '$program' and Batch='$Batch'";
                                                                            if($result5 = mysqli_query($link, $sql5)){
                                                                                if(mysqli_num_rows($result5) > 0){
                                                                                    while($row5 = mysqli_fetch_array($result5)){
                                                                                        $Section= $row5['Section'];
                                                                                         echo  " <li>
                                                                                                    <input  style='margin: 5px; width: 95%; height: 50px'   type='submit' name='left_gradee' value='$Section' class='btn btn-info' id='drop_bottem' />
                                                                                                </li>
                                                                                                <input type='text' hidden='hidden' name='section' value='$program' />
                                                                                                <input type='text' hidden='hidden' name='batch' value='$Batch' />
                                                                                                <input type='text' hidden='hidden' name='empid' value='$id' />";
                                                                                     }mysqli_free_result($result5);
                                                                                }   else echo "";
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
                                    mysqli_close($link);?>
                        </li>
                    </ul>
                </li>
                <li>
                        <hr style="background: #008080">
                </li>
                <li>
                        <a href="#"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Portfolio</a>
                </li>
                <li>
                        <a href="#"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Contact</a>
                </li>
            </ul>
        </nav>
                <?php
        }
        else{ header('location:../index.php'); }
?>