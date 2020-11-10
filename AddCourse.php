<?php
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
         if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];
        if(isset($_GET["error"])){
            if($_GET["error"]==3||$_GET["error"]==4)  { ?>
               <script type="text/javascript">
                   $(document).ready(function(){ $("#myModal_course").modal('show'); });
               </script> <?php
            }
        }?>
        <div id="myModal_course" class="modal fade">
            <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title">Course Registration Tab</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">  <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"]==3)   {  ?>
                                <div class="alert alert-success">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data saved successfully.</i>
                                    </span>
                                </div> <?php
                            }
                            if($_GET["error"]==4) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data is not saved successfully.</i>
                                    </span>
                                </div> <?php
                            }
                        } ?>
                        <form action="database/add_course.php" method="post">
                            <div class="form-group">
                                <label>Course Code</label>
                                <input type="text" name="Course_Id" required="required" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" onkeypress="return chkAlphabets(event)" name="Course_Name" required="required" class="form-control">
                             </div>
                             <div class="form-group">
                                <label>Course Credit</label>
                                <input type="text" onkeypress="return chkNum(event)" name="Course_Credit" required="required" class="form-control">
                             </div>
                             <div class="form-group">
                                <label>Course Ectc</label>
                                <input type="text" onkeypress="return chkNum(event)" name="Course_Ectc" required="required" class="form-control">
                             </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select id="Department" name="Department" class="form-control"required>
                                    <?php
                                        $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT Dept_Id,Dept_Name FROM department";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<option value=" . $row['Dept_Id'] .">". $row['Dept_Name'] . "</option>";
                                                }
                                                mysqli_free_result($result);
                                            }
                                            else{ echo "No records matching your query were found."; }
                                        }
                                        else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                                        mysqli_close($link);
                                    ?>
                                </select>
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <input type="Submit" name="Submit" value="Save" class="btn btn-success" />
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                   <input type="Submit" name="Update" value="Update" class="btn btn-success" />
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
       <?php }} else{  header('location:index.php'); } ?>