    <?php  if( isset($_SESSION['username']) && isset($_SESSION['enrolid'])){
    $id=$_SESSION['username'];  ?>
        <nav id="sidebar">
            <?php require_once('img.php');?>
            <ul class="list-unstyled components">
                <li >
                    <a href="#gradeSubmenu"style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Courses</a>
                    <ul style="" class="collapse list-unstyled"  id="gradeSubmenu">
                        <li>
                            <form action="generalprofile.php" method="post">
                                <?php
                                    $sql4= "SELECT Course_Id FROM student_course_view WHERE Student_id ='$id'";
                                    if($result4 = mysqli_query($link, $sql4)){
                                        if(mysqli_num_rows($result4) > 0){
                                            while($row4 = mysqli_fetch_array($result4)){
                                                $CourseId= $row4['Course_Id'];
                                                echo  " <li>
                                                            <input  style='margin: 5px; width: 95%'   type='submit' name='CourseId' value='$CourseId' class='btn btn-info' id='drop_bottem' />
                                                        </li>";
                                             }mysqli_free_result($result4);
                                        }
                                    }
                                    mysqli_close($link);
                                ?>
                           </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
      <?php }  else{ header('location:../index.php'); } ?>  