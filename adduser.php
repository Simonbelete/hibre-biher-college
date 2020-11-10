<?php
if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
     if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
    $id=$_SESSION['username'];
    if(isset($_GET["error"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#myModal_usr").modal('show'); });
       </script> <?php
    } ?>
    <div id="myModal_usr" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Emplpoyee Registration Tab</h4>
                    <button style="display:block; margin: auto;" onclick="document.getElementById('profile-img').click()">Add Profile picture</button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                    <div class="modal-body"> <?php
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
                    } ?>
                        <form action="database/add_user.php" name="form1" method="post" enctype="multipart/form-data">
                            <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var readerr = new FileReader();
                                    readerr.onload = function (e) {
                                        $('#profile-img-tag').attr('src', e.target.result);
                                    }
                                    readerr.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#profile-img").change(function(){
                                readURL(this);
                            });
                        </script>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                     <div class="btn btn-success btn-sm float-center">
                                        <input name="photo"  onchange="readURL(this);" style="visibility:hidden;" type="file" multiple="multiple"  id="profile-img" size="4" height="1px">
                                        <img src="x.png" id="profile-img-tag" style="max-width:400px; height: 200px" class="card-img-top"/>
                                    </div>
                                </div>
                                <div class="col-3"></div>
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
                                        <label name=>Password</label>
                                        <input name="Password" type="password" placeholder="Id For Temporarly"  required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="First_Name" type="text"  onkeypress="return chkAlphabets(event)"  required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="Last_Name" type="text"  onkeypress="return chkAlphabets(event)" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select id="Gender" name="Gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                      <input type="Email" name="Email"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                      <label>Phone Number</label>
                                      <input type="text" name="phone"  id="vphone"  onblur="PhoneNumberValidation(document.form1.phone)"   onkeypress="return chkNum(event)"  required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Field Of Study</label>
                                        <input type="text"   onkeypress="return chkAlphabets(event)"  name="Field"  required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                      <label>Region</label>
                                      <input type="Text"   onkeypress="return chkAlphabets(event)"  name="Region" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Zone</label>
                                        <input type="text" name="Zone"  required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                      <label>Wereda</label>
                                      <input type="Text" name="Wereda" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kebele</label>
                                        <input type="Text" name="Kebele" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                      <label>Role</label>
                                      <input type="Text"   onkeypress="return chkAlphabets(event)"   name="Role" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Refree Gender</label>
                                        <select id="RGender" name="RGender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Referee First Name</label>
                                      <input type="text"   onkeypress="return chkAlphabets(event)"   name="Rfname"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                      <label>Referee Last Name</label>
                                      <input type="text"   onkeypress="return chkAlphabets(event)"   name="Rlname"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                      <label>Referee Region</label>
                                      <input type="Text"   onkeypress="return chkAlphabets(event)"   name="RRegion" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Referee Zone</label>
                                        <input type="text" name="RZone"  required="required" class="form-control">
                                    </div>
                                </div>

                            </div>
                             <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                      <label>Referee Wereda</label>
                                      <input type="Text" name="RWereda" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Referee Kebele</label>
                                        <input type="Text" name="RKebele" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                      <label>Referee Phone</label>
                                      <input type="text"    name="RPhone"   onblur="PhoneNumberValidation(document.form1.RPhone)"    onkeypress="return chkNum(event)" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Referee Email</label>
                                        <input type="Email" name="REmail"  class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-12">
                                 <div class="form-group modal-footer">
                                  <input type="Submit" value ="Cancle" class="btn btn-secondary" data-dismiss="modal">
                                  <input type="Submit" class="btn btn-primary" name="Submit" value="Submit">
                                 </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <?php }} else{  header('location:index.php'); } ?> 