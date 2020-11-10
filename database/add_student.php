 <?php
        if(isset($_POST['send'])){
            $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $Student_Id = mysqli_real_escape_string($link, $_REQUEST['Identity']);
            $First_Name = mysqli_real_escape_string($link, $_REQUEST['First_Name']);
            $Last_Name = mysqli_real_escape_string($link, $_REQUEST['Last_Name']);
            $Grand_Father_Name = mysqli_real_escape_string($link, $_REQUEST['g_father_name']);
            $gender = mysqli_real_escape_string($link, $_REQUEST['Gender']);
            $Birth_Date = mysqli_real_escape_string($link, $_REQUEST['Date_Of_Birth']);
            $Email_Address = mysqli_real_escape_string($link, $_REQUEST['Email']);
            $Phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
            $Region = mysqli_real_escape_string($link, $_REQUEST['Region']);
            $Zone = mysqli_real_escape_string($link, $_REQUEST['Zone']);
            $Wereda = mysqli_real_escape_string($link, $_REQUEST['Wereda']);

            $Kebele = mysqli_real_escape_string($link, $_REQUEST['Kebele']);
            $School_Name = mysqli_real_escape_string($link, $_REQUEST['School']);
            $Parent_fname = mysqli_real_escape_string($link, $_REQUEST['pfname']);
            $Parene_lname =  mysqli_real_escape_string($link, $_REQUEST['plname']);
            $Parent_region = mysqli_real_escape_string($link, $_REQUEST['PRegion']);
            $Parent_zone = mysqli_real_escape_string($link, $_REQUEST['PZone']);
            $Parent_wereda = mysqli_real_escape_string($link, $_REQUEST['PWereda']);
            $Parent_kebele = mysqli_real_escape_string($link, $_REQUEST['PKebele']);
            $Parent_phone = mysqli_real_escape_string($link, $_REQUEST['PPhone']);
            $Parent_email = mysqli_real_escape_string($link, $_REQUEST['PEmail']);
            $Regi_Year = date("m/d/Y");
            $Profile_Image = $_REQUEST['photo'];
          if(isset($_FILES["photo"]) && $_FILES["photo"]["error_stud"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];
                $sql = "INSERT INTO user_student VALUES ('$Student_Id', '$First_Name','$Last_Name','$Grand_Father_Name','$gender','$Birth_Date','$Email_Address',$Phone,'$Region','$Zone','$Wereda','$Kebele','$School_Name','$Parent_fname','$Parene_lname','$Parent_region','$Parent_zone','$Parent_wereda','$Parent_kebele','$Parent_email',$Parent_phone,'$Regi_Year',1,'$filename','In Active','Null','Null')";

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                header("Location:../sidebar.php?error_stud=Error: Please select a valid file format.");

                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize)
                 header("Location:../sidebar.php?error_stud=Error: File size is larger than the allowed limit.");
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("../upload/uploadedimage/" . $filename)){
                       header("Location:../sidebar.php?error_stud=Error: .$filename .  is already exists.");

                    } else{
                       if( move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/uploadedimage/" . $filename) && mysqli_query($link, $sql) ){

                            header("location:../sidebar.php?error_stud=as");
                         }else{
                            header("location:../sidebar.php?error_stud=Error: . !! File is not saved please try again .");
                        }
                        echo die(mysqli_error($link));
                    }
                } else{
                    header("Location:../sidebar.php?error_stud=Error: There was a problem uploading your file. Please try again.");
                }
            }
            else{
                $X=$_FILES["photo"]["error_stud"];
                header("Location:../sidebar.php?error_stud=Error: . !! Empty image can't be uploaded .");

            }

        }

?>