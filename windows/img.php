<?php

          echo "<div class='sidebar-header render' > ";
            $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $sql = "SELECT * FROM employee WHERE Employee_Id ='$id'";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) ==1){
                    $row = mysqli_fetch_array($result);
                    $img= $row['Profile_Image'];     ?>
                    <div class=" img-thumbnail btn-success">
                        <img src="upload/uploadedimage/<?php echo $img ;?>" width="190px" height="150px" class="img-responsive" alt="<?php echo $row['First_Name'];?>">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">Name : <?php echo $row['First_Name']." ".$row['Last_Name']; ?></div>
                        <div class="profile-usertitle-name">Role : <?php echo $row['Role']; ?></div>
                        <div class="profile-usertitle-job">Field : <?php echo $row['Field_of_study']; ?> </div>
                        <div class="profile-usertitle-job"> <?php echo 'Id Number : '.$id;?> </div>
                    </div><?php
                }
            }
            else echo mysqli_error($link);
         echo "</div>";

    ?>
