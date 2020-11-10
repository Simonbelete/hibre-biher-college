<div id="assignment" class="tab-pane fade" >
                <br>
                <style>
                    th{
                        text-align:center;
                    }
                     td{
                        text-align: start end;
                    }
                </style>
                <div  style="margin: auto">
                    <h1  align="center">well come to Assignment file upload page</h1>
                    <div class="modal-body"onload="myFunction()"> <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=='u1')   {  ?>
                            <div class="alert alert-success">
                                <span class="help-block">
                                    <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                </span>
                             </div> <?php
                        }
                        else {  ?>
                            <div class="alert alert-danger">
                                <span class="help-block">
                                    <i class="small"><span style="">×</span><?php ECHO $_GET["error"];?></i>
                                </span>
                             </div> <?php
                        }
                    }  ?>
                        <form action="../database/addassignment.php" style=" width: 50%" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                <label>Course Code</label>
                                <select id="Course" name="Course" class="form-control"required>
                                    <?php
                                        echo "<option value=" . $CourseId .">".$CourseId."</option>";

                                    ?>
                                </select>
                            </div>

                            <input type="file" id="myFile" name="filee" required="required" multiple size="50" onchange="myFunction()">
                            <input type="text" required="required" value="<?php echo $CourseId ; ?>" name="id" hidden="hidden" multiple size="50" onchange="myFunction()">

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

                            <input type="text" hidden="hidden" class="btn btn-primary" name="student_id" value="<?php echo $id ; ?>"><br>
                            <input type="Submit" class="btn btn-primary" name="send" value="Register">
                        </form>
                   </div>
                </div>
            </div>