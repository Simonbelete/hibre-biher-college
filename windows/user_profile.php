
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/4.1.0bootstrap.min.css">
    <script src="../bootstrap/fontawesome.js"></script>
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/4.1.0bootstrap.min.js"></script>
    <link rel="stylesheet" href="../user_profile.css" />
<?php                                     

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
       $aa= $_GET["id"] ;
    // Prepare a select statement
    $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
    $sql = "SELECT * FROM user_student WHERE Registration_Id =$aa";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $img= $row['Profile_Image'];     ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="portlet light profile-sidebar-portlet bordered">
                            <div class=" img-thumbnail btn-success">
                                <img src="../upload/uploadedimage/<?php echo $img ;?>" width="310px" class="img-responsive" alt="<?php echo $row['First_Name'];?>">
                                </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"><?php echo $row['First_Name']." ".$row['Last_Name']." ".$row['Grand_Father_Name']; ?></div>
                                <div class="profile-usertitle-job"> <?php echo $row['program']; ?> </div>
                                <div class="profile-usertitle-job"> <?php echo 'Enrol Number = '.$aa; ?> </div>
                            </div>
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-info  btn-sm">Section:<?php echo $row['Section']; ?> </button>
                                <button type="button" class="btn btn-info  btn-sm">
                                     <?php
                                        $sql2 = "SELECT Student_Id FROM student_enrollment WHERE Registration_Id =$aa";
                                        if($result2 = mysqli_query($link, $sql2)){
                                            if(mysqli_num_rows($result2) > 0){
                                                while($row2 = mysqli_fetch_array($result2)){
                                                    echo 'Id = '.$row2['Student_Id'];
                                                }
                                            }
                                        }
                                    ?>
                                 </button>
                            </div>
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active">

                                        <a href="#">
                                            <i class="icon-home"></i> Full Profile Information </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Your info</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>    
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <form method="post" action="../database/updateusr_profile.php" >
                                                 <input type="text" hidden="hidden" required="required" name="id" value="<?php echo $row['Registration_Id'];?>" class="form-control" id="inputName" placeholder="Name">
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputName">Name</label>
                                                        <input type="text" required="required" name="First_Name" value="<?php echo $row['First_Name'];?>" class="form-control" id="inputName" placeholder="Name">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputLastName">Last Name</label>
                                                            <input type="text"name="Last_Name" required="required"  value="<?php echo $row['Last_Name'];?>" class="form-control" id="inputLastName" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">Grand Father Name</label>
                                                        <input type="text"name="Grand_Father_Name" required="required"  value="<?php echo $row['Grand_Father_Name']; ?>" class="form-control" id="inputgrandfathername" placeholder="Email">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Gender</label>
                                                        <input type="text"name="gender" required="required" value="<?php echo $row['gender']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputgfathername">Email Address</label>
                                                        <input type="email"name="Email_Address" required="required" value="<?php echo $row['Email_Address']; ?>" class="form-control" id="inputgfathername" placeholder="Email">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputphone">phone</label>
                                                        <input type="number"name="Phone"   required="required" value="<?php echo $row['Phone']; ?>" class="form-control" id="inputphone" placeholder="phone">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputRegion">Region</label>
                                                        <input type="text"name="Region"   required="required" value="<?php echo $row['Region']; ?>"  class="form-control" id="inputRegion" placeholder="Region">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputZone">Zone</label>
                                                        <input type="text" name="Zone" required="required" value="<?php echo $row['Zone']; ?>"  class="form-control" id="inputZone" placeholder="Zone">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputWereda">Wereda</label>
                                                        <input type="text" name="Wereda" required="required"  value="<?php echo $row['Wereda']; ?>"  class="form-control" id="inputWereda" placeholder="Wereda">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputKebele">Kebele</label>
                                                        <input type="text"name="Kebele"  required="required"  value="<?php echo $row['Kebele']; ?>"  class="form-control" id="inputKebele" placeholder="Kebele">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputWereda">Batch</label>
                                                        <input type="text"name="Batch" required="required"  value="<?php echo $row['Batch']; ?>"  class="form-control" id="inputWereda" placeholder="Batch">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputKebele">Status</label>
                                                        <input type="text"name="Status" required="required"  value="<?php echo $row['Status']; ?>"  class="form-control" id="inputKebele" placeholder="Status">
                                                      </div>
                                                    </div>
                                                </div><div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputWereda">Program</label>
                                                        <input type="text"name="program" required="required"  value="<?php echo $row['program']; ?>"  class="form-control" id="inputWereda" placeholder="Program">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputKebele">Section</label>
                                                        <input type="text"name="Section" required="required"  value="<?php echo $row['Section']; ?>"  class="form-control" id="inputKebele" placeholder="Type">
                                                      </div>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4"></div>
                                                  <div class="col-md-4">
                                                      <button type="submit" name="Update" class="btn btn-primary">Update</button>
                                                  </div>
                                                  <div class="col-md-4"></div>
                                              </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
            }
        }
    }
   ?>


        <?php  }
    ?>