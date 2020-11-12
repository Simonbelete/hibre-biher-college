
<?php
if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
     if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];
    if(isset($_GET["error"])) {
        if($_GET["error"]==1||$_GET["error"]==2)  { ?>

        <script type="text/javascript">
                   $(document).ready(function(){ $("#myModal_dept").modal('show'); });
            </script> <?php
        }
    } ?>
    <div id="myModal_dept" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable  ">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <h4 class="modal-title center">Department Registration Tab</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body"> <?php
                        if(isset($_GET["error_dept"])){
                           if($_GET["error_dept"]==15)   {  ?>
                                <div class="alert alert-success">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data saved successfully.</i>
                                    </span>
                                 </div> <?php
                           }
                           if($_GET["error_dept"]==25) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data is not saved successfully.</i>
                                    </span>
                                 </div> <?php
                           } ?> <?php
                           if($_GET["error_dept"]==35) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>You Can't Add the Same Department </i>
                                    </span>
                                </div> <?php
                           }
                        } ?>
                        <form action="database/add_dept.php" method="post">
                            <div class="form-group">
                                <label>Department Code</label>
                                <input type="text" name="dept_id" required="required" class="form-control">
                             </div>
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" onkeypress="return chkAlphabets(event)" id="fn" name="dept_name" required="required" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Head Of Department</label>
                                <select id="Department" name="dept_head" class="form-control"required>
                                    <?php
                                        $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT Employee_Id,First_Name,Last_Name FROM employee ";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    $sql2 = "select Dept_Head from department  where Dept_Head='".$row['Employee_Id']."'";
                                                     if($result2 = mysqli_query($link, $sql2)){
                                                        if(mysqli_num_rows($result2) > 0){ }
                                                        else{echo "<option value=" . $row['Employee_Id'] .">". $row['First_Name'] ." ".$row['Last_Name'] . "</option>";}
                                                    }
                                                }
                                                mysqli_free_result($result);
                                            }
                                        }
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
                                    <input type="Submit"  name="Update" value="Update" class="btn btn-success" />
                                </div>
                            </div>     
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <?php }} else{  header('location:index.php'); } ?> 