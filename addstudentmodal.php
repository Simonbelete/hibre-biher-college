<?php
if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
     if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];
     if(isset($_GET["error_stud"])){  ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#myModal_stud").modal('show'); });
       </script> <?php
     }?>
    <div id="myModal_stud" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Profile Image Upload Tab</h4>
                    <button style="display:block; margin: auto;" onclick="document.getElementById('fileSelect').click()">Add Profile picture</button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <div class="modal-body"> <?php
                    if(isset($_GET["error_stud"])){
                        if($_GET["error_stud"]=='as')   {  ?>
                            <div class="alert alert-success">
                                <span class="help-block">
                                    <i class="small"><span style="">×</span>Your data saved successfully.</i>
                                </span>
                             </div> <?php
                        }
                        else{  ?>
                            <div class="alert alert-danger">
                                <span class="help-block">
                                    <i class="small"><span style=""><?php ECHO $_GET["error_stud"];?></span></i>
                                </span>
                             </div> <?php
                        }
                    } ?>
                    <form action="database/add_student.php" name="form2" method="post" enctype="multipart/form-data">
                        <script type="text/javascript">
                            function readURLimg(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#add_img').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#fileSelect").change(function(){
                                readURLimg(this);
                            });
                        </script>
                       <div class="row ">
                           <div class="col-3"></div>
                           <div class="col-6">
                               <div class="btn btn-success btn-sm float-center">
                                    <input onchange="readURLimg(this);" style="visibility:hidden;"type="file" multiple="multiple"  name="photo" id="fileSelect">
                                    <img src="x.png" id="add_img"  style="max-width:400px; height: 200px" class="card-img-top"/>
                                </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-2">
                               <div class="form-group">
                                    <label>Id</label>
                                    <input name="Identity" type="text" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="form-group">
                                    <label name=>Registration_Date</label>
                                    <input value="<?php $today = date("m/d/Y"); echo $today; ?>" name="Registration" disabled="disabled"  required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="First_Name" onkeypress="return chkAlphabets(event)" type="text" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="Last_Name" onkeypress="return chkAlphabets(event)" type="text"required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                    <label>Grand Father Name</label>
                                    <input name="g_father_name" onkeypress="return chkAlphabets(event)" type="text"required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select id="Gender" name="Gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="Date_Of_Birth"  required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label>Region</label>
                                  <input type="Text" onkeypress="return chkAlphabets(event)" name="Region" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Zone</label>
                                    <input type="text" name="Zone"  required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label>Wereda</label>
                                  <input type="Text" name="Wereda" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Kebele</label>
                                    <input type="Text" name="Kebele" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label>School</label>
                                  <input type="Text" name="School" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email</label>
                                  <input type="Email" name="Email"  class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label>Phone Number</label>
                                  <input type="text"  name="phone"  onblur="PhoneNumberValidation(document.form2.phone)"   onkeypress="return chkNum(event)"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Parent First Name</label>
                                  <input type="text" onkeypress="return chkAlphabets(event)" name="pfname"  class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                  <label>Parent Last Name</label>
                                  <input type="text" name="plname" onkeypress="return chkAlphabets(event)"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                  <label>Parents Region</label>
                                  <input type="Text" name="PRegion" onkeypress="return chkAlphabets(event)" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Parents Zone</label>
                                    <input type="text" name="PZone"  required="required" class="form-control">
                                </div>
                            </div>

                        </div>
                         <div class="row">
                             <div class="col-6">
                                <div class="form-group">
                                  <label>Parents Wereda</label>
                                  <input type="Text" name="PWereda" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Parents Kebele</label>
                                    <input type="Text" name="PKebele" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-6">
                                <div class="form-group">
                                  <label>Parents Phone Number</label>
                                  <input type="text" name="PPhone" onblur="PhoneNumberValidation(document.form2.PPhone)"   onkeypress="return chkNum(event)" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Parents Email</label>
                                    <input type="Email" name="PEmail"  class="form-control">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                             <div class="col-4"></div>
                             <div class="col-4">
                             <div class="form-group modal-footer">
                                 <div class="row">
                                     <div class="col-xl-2"></div>
                                     <div class="col-xl-4">
                                         <div class="form-group">
                                          <input type="Submit" value ="Cancle" class="btn btn-dark" data-dismiss="modal">
                                         </div>

                                     </div>
                                     <div class="col-xl-5">
                                         <div class="form-group">
                                          <input type="Submit" class="form-control btn btn-primary" name="send" value="Save">
                                         </div>

                                     </div>
                                     <div class="col-xl-1"></div>
                                 </div>


                             </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php }} else{  header('location:index.php'); } ?>