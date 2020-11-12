 <?php
    echo "<div class='sidebar-header render' > ";
    $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
    $sql = "SELECT Registration_Id FROM student_enrollment WHERE Student_Id ='$id'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) ==1){
            $row = mysqli_fetch_array($result);
            $sid= $row['Registration_Id'];
            $sql2 = "SELECT * FROM user_student WHERE Registration_Id ='$sid'";
            if($result2 = mysqli_query($link, $sql2)){
                if(mysqli_num_rows($result2) ==1){
                    $row2 = mysqli_fetch_array($result2);
                    $img=$row2['Profile_Image'] ;     ?>
                    <div class=" img-thumbnail btn-success">
                        <img src="../upload/uploadedimage/<?php echo $img; ?>" width="190px" height="150px" class="img-responsive" alt="<?php echo $row2['First_Name'];?>">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"><b>Name : <?php echo $row2['First_Name']." ".$row2['Last_Name']." ".$row2['Grand_Father_Name']; ?></b></div><br>
                        <div class="profile-usertitle-job"> <?php echo $row2['program']."<br>Batch ".$row2['Batch']."  Section ".$row2['Section']; ?> </div>
                        <button type="button" class="btn btn-info  btn-sm">  Id:<?php echo $id; ?> </button><br>
                    </div><?php
                }
            }
        }
    }
    else echo mysqli_error($link);
    echo "</div>";
?>