<?php
        if(isset($_POST['Update'])) {
           $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Employee_Id = mysqli_real_escape_string($link, $_REQUEST['id']);
            $First_Name = mysqli_real_escape_string($link, $_REQUEST['First_Name']);
            $Last_Name = mysqli_real_escape_string($link, $_REQUEST['Last_Name']);
            $Gender = mysqli_real_escape_string($link, $_REQUEST['Gender']);
            $Phone = mysqli_real_escape_string($link, $_REQUEST['Phone']);
            $Email= mysqli_real_escape_string($link, $_REQUEST['Email_Address']);
            $Field_of_study = mysqli_real_escape_string($link, $_REQUEST['Field']);
            $Role = mysqli_real_escape_string($link, $_REQUEST['Role']);
             $sql =  "UPDATE employee SET First_Name='$First_Name',Last_Name='$Last_Name',Gender='$Gender',Email='$Email',Field_of_study='$Field_of_study', Phone='$Phone',Role='$Role' WHERE Employee_Id='$Employee_Id'";
              if(mysqli_query($link, $sql)==1){
                   header("location:../enrole_employe.php?updt_err=1");
                    }
                    else{
                       header("Location:../enrole_employe.php?updt_err=".mysqli_error($link));
                    }


    }
?>