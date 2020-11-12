<?php
        if(isset($_POST['Update'])) {
           $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Registration_Id = mysqli_real_escape_string($link, $_REQUEST['id']);
            $First_Name = mysqli_real_escape_string($link, $_REQUEST['First_Name']);
            $Last_Name = mysqli_real_escape_string($link, $_REQUEST['Last_Name']);
            $Grand_Father_Name = mysqli_real_escape_string($link, $_REQUEST['Grand_Father_Name']);
            $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
            $Email_Address = mysqli_real_escape_string($link, $_REQUEST['Email_Address']);
            $Phone = mysqli_real_escape_string($link, $_REQUEST['Phone']);
            $Region = mysqli_real_escape_string($link, $_REQUEST['Region']);
            $Zone = mysqli_real_escape_string($link, $_REQUEST['Zone']);
            $Wereda = mysqli_real_escape_string($link, $_REQUEST['Wereda']);
            $Kebele = mysqli_real_escape_string($link, $_REQUEST['Kebele']);
            $Status = mysqli_real_escape_string($link, $_REQUEST['Status']);
            $program =  mysqli_real_escape_string($link, $_REQUEST['program']);
            $Batch= mysqli_real_escape_string($link, $_REQUEST['Batch']);
            $Section= mysqli_real_escape_string($link, $_REQUEST['Section']);
            //$Regi_Year = mysqli_real_escape_string($link, $_REQUEST['Registration']);
             $sql =  "UPDATE user_student SET First_Name='$First_Name',Last_Name='$Last_Name',gender='$gender',Email_Address='$Email_Address', Phone='$Phone', Region='$Region', Zone='$Zone', Wereda='$Wereda', Kebele='$Kebele', Batch='$Batch', Status='$Status', program='$program', Section='$Section' WHERE Registration_Id='$Registration_Id'";
              if(mysqli_query($link, $sql)==1){
                   header("location:../enrol_student.php?updt_err=1");
                    }
                    else{
                       header("Location:../enrol_student.php?updt_err=2");
                    }


    }
?>