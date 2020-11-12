<?php
        if(isset($_POST['send'])) {
           $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $id= mysqli_real_escape_string($link, $_REQUEST['Course']);
            //$Regi_Year = mysqli_real_escape_string($link, $_REQUEST['Registration']);

            if(isset($_FILES["filee"]) && $_FILES["filee"]["error"] == 0){
                $filename = $id."_".$_FILES["filee"]["name"];
                $sql = "INSERT INTO file VALUES ('','$id','$filename')";   // Check whether file exists before uploading it
                    if(file_exists("../upload/file/" . $filename)){
                       header("Location:../lecture/index.php?error=error: .$filename .  is already exists.");
                    }
                    else{
                       if( move_uploaded_file($_FILES["filee"]["tmp_name"], "../upload/file/" . $filename) && mysqli_query($link, $sql) )
                        {
                            header("location:../lecture/index.php?error=u1");
                        }
                        else{
                            header("location:../lecture/index.php?error=".mysqli_error($link));
                        }
                        mysqli_close($link);
                    }
            } else{
                $X=$_FILES["filee"]["error"];
                header("Location:../lecture/index.php?error=Error: . !! Empty file can't be uploaded .".$X);

            }


    }
?>