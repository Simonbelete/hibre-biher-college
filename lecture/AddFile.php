<?php
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])&& $_SESSION['role']!='admin') {
    $id=$_SESSION['username'];  
    if(isset($_GET["error"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#myModal_file").modal('show'); });
       </script> <?php
    } ?>
        <div id="myModal_file" class="modal fade">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                         <h4 class="modal-title">File Upload Tab</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                   <div class="modal-body"onload="myFunction()"> <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=='u1')   {  ?>
                            <div class="alert alert-success">
                                <span class="help-block">
                                    <i class="small"><span style="">?</span>Your data saved successfully.</i>
                                </span>
                             </div> <?php
                        }
                        else {  ?>
                            <div class="alert alert-danger">
                                <span class="help-block">
                                    <i class="small"><span style="">?</span><?php ECHO $_GET["error"];?></i>
                                </span>
                             </div> <?php
                        }
                    } ?>
                        <form action="../database/addfile.php" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Course Code</label>
                                <select id="Course" name="Course" class="form-control"required>
                                    <?php
                                        $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT course_id FROM lecture_cours_view where Employee_Id='$id' ";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<option value=" . $row['course_id'] .">".$row['course_id']."</option>";

                                                }
                                                mysqli_free_result($result);
                                            }
                                        }
                                        mysqli_close($link);
                                    ?>
                                </select>
                            </div>
                            <input type="file" id="myFile" name="filee" required="required" multiple size="50" onchange="myFunction()">
                            <input type="text" required="required" value="<?php echo $id ; ?>" name="id" hidden="hidden" multiple size="50" onchange="myFunction()">
                            <div id="demo"></div>
                            <script>
                                function myFunction(){
                                    var x = document.getElementById("myFile");
                                    var txt = "";
                                    if ('files' in x) {
                                        if (x.files.length == 0) {
                                            txt = "Select one or more files.";
                                        }
                                        else {
                                            for (var i = 0; i < x.files.length; i++) {
                                                txt += "<br>" + (i+1) + ". file<br>";
                                                var file = x.files[i];
                                                if ('name' in file) {
                                                    txt += "name: " + file.name + "<br>";
                                                }
                                                if ('size' in file) {
                                                    txt += "size: " + file.size + " bytes <br>";
                                                }
                                            }
                                        }
                                    }
                                    else {
                                        if (x.value == "") {  txt += "Select one or more files.";
                                        }
                                        else {
                                            txt += "The files property is not supported by your browser!";
                                            txt  += "<br>path: " + x.value;
                                        }
                                    }
                                    document.getElementById("demo").innerHTML = txt;
                                }
                            </script>
                            <input type="Submit" class="btn btn-primary" name="send" value="Register">
                        </form>
                   </div>
                </div>
            </div>
        </div>
         <?php
    }
    else{ header('location:../index.php'); } ?>