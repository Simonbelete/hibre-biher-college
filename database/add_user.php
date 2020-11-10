<?php
        if(isset($_POST['Submit'])) {
           $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
            $Employee_Id = mysqli_real_escape_string($link, $_REQUEST['Identity']);
            $First_Name = mysqli_real_escape_string($link, $_REQUEST['First_Name']);
            $Last_Name = mysqli_real_escape_string($link, $_REQUEST['Last_Name']);
            $Gender = mysqli_real_escape_string($link, $_REQUEST['Gender']);
            $Phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
            $Email= mysqli_real_escape_string($link, $_REQUEST['Email']);
            $Field_of_study= mysqli_real_escape_string($link, $_REQUEST['Field']);
            $Role = mysqli_real_escape_string($link, $_REQUEST['Role']);
            $Region = mysqli_real_escape_string($link, $_REQUEST['Region']);
            $zone = mysqli_real_escape_string($link, $_REQUEST['Zone']);
            $wereda = mysqli_real_escape_string($link, $_REQUEST['Wereda']);
            $kebele = mysqli_real_escape_string($link, $_REQUEST['Kebele']);
            $referee_fname = mysqli_real_escape_string($link, $_REQUEST['Rfname']);
            $referee_lname =  mysqli_real_escape_string($link, $_REQUEST['Rlname']);
            $referee_Gender = mysqli_real_escape_string($link, $_REQUEST['RGender']);
            $referee_region = mysqli_real_escape_string($link, $_REQUEST['RRegion']);
            $referee_zone = mysqli_real_escape_string($link, $_REQUEST['RZone']);
            $referee_wereda = mysqli_real_escape_string($link, $_REQUEST['RWereda']);
            $referee_kebele = mysqli_real_escape_string($link, $_REQUEST['RKebele']);
            $referee_phone = mysqli_real_escape_string($link, $_REQUEST['RPhone']);
            $referee_email = mysqli_real_escape_string($link, $_REQUEST['REmail']);
            $Profile= mysqli_real_escape_string($link, $_REQUEST['photo']);
            $today = date("d/m/Y");
            $decript_password=password_hash("$Password", PASSWORD_DEFAULT);
            //$Regi_Year = mysqli_real_escape_string($link, $_REQUEST['Registration']);

              if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                 $sql = "INSERT INTO employee VALUES ('$Employee_Id','$decript_password', '$First_Name','$Last_Name','$Gender','$Phone','$Email','$Field_of_study','$Role','$Region','$zone','$wereda','$kebele','$referee_fname','$referee_lname','$referee_Gender','$referee_region','$referee_zone','$referee_wereda','$referee_kebele','$referee_phone','$referee_email','$filename','$today')";
                 $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];
                   // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                header("Location:../sidebar.php?error=Error: Please select a valid file format.");

                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize)
                 header("Location:../sidebar.php?error=Error: File size is larger than the allowed limit.");
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("../upload/uploadedimage/" . $filename)){
                       header("Location:../sidebar.php?error=Error: .$filename .  is already exists.");

                    } else{
                       if( move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/uploadedimage/" . $filename) )
                         if(mysqli_query($link, $sql)){
                            header("location:../sidebar.php?error=u1");
                        } else{
                            header("location:../sidebar.php?error=Error: . !! File is not saved please try again .");
                        }
                        echo die(mysqli_error($link));
                    }
                } else{
                    header("Location:../sidebar.php?error=Error: There was a problem uploading your file. Please try again.");
                }
            } else{
                $X=$_FILES["photo"]["error"];
                header("Location:../sidebar.php?error=Error: . !! Empty image can't be uploaded .");

            }


    }
?>