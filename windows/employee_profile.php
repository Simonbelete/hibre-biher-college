
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
    $sql = "SELECT * FROM employee WHERE Employee_Id =$aa";
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
                                <div class="profile-usertitle-job"> <?php echo "User Id = ".$row['Employee_Id']; ?> </div>
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
                                            <form method="post" action="../database/update_employee.php" >
                                                 <input type="text" hidden="hidden" required="required" name="id" value="<?php echo $row['Employee_Id'];?>" class="form-control" id="inputName" placeholder="Name">
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputName">First Name</label>
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
                                                        <label for="exampleInputEmail1">Gender</label>
                                                        <input type="text"name="Gender" required="required"  value="<?php echo $row['Gender']; ?>" class="form-control" id="inputgrandfathername" placeholder="Email">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Phone Number</label>
                                                        <input type="number"name="Phone" required="required" value="<?php echo $row['Phone']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputgfathername">Email Address</label>
                                                        <input type="email"name="Email_Address" required="required" value="<?php echo $row['Email']; ?>" class="form-control" id="inputgfathername" placeholder="Email">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputphone">Field Of Study</label>
                                                        <input type="text"name="Field"   required="required" value="<?php echo $row['Field_of_study']; ?>" class="form-control" id="inputphone" placeholder="phone">
                                                      </div>
                                                    </div>
                                                </div>
                                                <div  class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="inputRegion">Role</label>
                                                        <input type="text"name="Role"   required="required" value="<?php echo $row['Role']; ?>"  class="form-control" id="inputRegion" placeholder="Region">
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