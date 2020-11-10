<?php
include("dbcon.php");
    $code=$_GET["code"];
    $getEmailQ=mysqli_query($con,"select email from resettable where code='$code'");
    if(mysqli_num_rows($getEmailQ)==0){
        exit("<div align='center' class='container' style='margin:20%; width: 50%'>Can not find the page</div>");
    }
    if(isset($_POST["password"])){
        $pw=$_POST["password"];
        $pw=password_hash("$pw", PASSWORD_DEFAULT);  
        $row=mysqli_fetch_array( $getEmailQ);
        $email=$row["email"];
        $query1=mysqli_query($con,"select Registration_Id from user_student where Email_Address ='$email'");
        $query2=mysqli_query($con,"select Email from employee where Email='$email'");
        if(mysqli_num_rows($query1) > 0){
            $row = mysqli_fetch_array($query1);
            $Registration_Id=$row['Registration_Id'];
            $query=mysqli_query($con,"update student_enrollment set password='$pw' where Registration_Id='$Registration_Id'");
            if($query){
                $query2=mysqli_query($con, "delete from resettable where code='$code'");
                exit("<div align='center' class='container' style='margin:20%; width: 50%'>Password Updated</div>");
            }
            else{ exit("<div align='center' class='container' style='margin:20%; width: 50%'>Something was wrong</div>");  }
        }
         if(mysqli_num_rows($query2) > 0){
           $query=mysqli_query($con,"update employee set password='$pw' where Email='$email'");
            if($query){
                $query2=mysqli_query($con, "delete from resettable where code='$code'");
                exit("<div align='center' class='container' style='margin:20%; width: 50%'>Password Updated</div>");
            }
            else{ exit("<div align='center' class='container' style='margin:20%; width: 50%'>Something was wrong</div>");  }
        }

    }

?>
 <!DOCTYPE html>
<html lang="en">
        <head><span>x</span>
            <title>Hibre Biher Collage</title>
            <meta charset="utf-8">
            <meta name="viewport"content="width=device-width, maximum-scale=1">
            <link rel="icon" href="logo.jpg" type="image/png">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div align="center" class="container" style="margin:20%; width: 50%">
                <form  method="POST" class="was-validated">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter New password" name="password" required>
                    </div>
                    <input type="submit" name="submit" value="Update Password" class="btn btn-primary">
                </form>
            </div>
        </body>
</html>




