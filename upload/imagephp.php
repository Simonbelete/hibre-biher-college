<?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Check if file was uploaded without errors
            if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                header("Location:../sidebar.php?error_img=Error: Please select a valid file format.");

                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize)
                 header("Location:../sidebar.php?error_img=Error: File size is larger than the allowed limit.");
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("../upload/uploadedimage/" . $filename)){
                       header("Location:../sidebar.php?error_img=Error: .$filename .  is already exists.");

                    } else{
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/uploadedimage/" . $filename);
                         header("Location:../sidebar.php?error_img=Your file was uploaded successfully.");

                    }
                } else{
                    header("Location:../sidebar.php?error_img=Error: There was a problem uploading your file. Please try again.");
                }
            } else{
                $X=$_FILES["photo"]["error"];
                header("Location:../sidebar.php?error_img=Error: . !! Empty image can't be uploaded .");

            }

        }
  
?>