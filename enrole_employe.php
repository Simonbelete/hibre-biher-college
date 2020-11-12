<?php
 session_start();
 if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
      if(  $_SESSION['role']=='dean'){
    $id=$_SESSION['username'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    <title>Hibre Biher Collage</title></title>
    <link rel="stylesheet" href="bootstrap/4.1.0bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome.min.css" />
    <link rel="stylesheet" href="bootstrap/fontawesome.min.css" />
    <script src="bootstrap/fontawesome.js"></script>
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/4.1.0bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <?php if(isset($_GET["updt_err"])){
          if($_GET["updt_err"]==1)   {  ?>
            <div class="alert alert-success">
                <span class="help-block">
                    <i class="small"><span style="">×</span>Your data updated successfully.</i>
                </span>
             </div>
        <?php }   else {  ?>
            <div class="alert alert-danger">
                <span class="help-block">
                    <i class="small"><span style="">×</span><?php echo $_GET["updt_err"]; ?></i>
                </span>
             </div>
        <?php  }} ?>
        <div class="container-fluid">
            <h2 class="pull-left" style="text-align: center">Employees Details</h2>
            <?php
            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
            $sql = "SELECT * FROM employee";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Employee Id</th>";
                                echo "<th>Employee Name</th>";
                                echo "<th>Gender</th>";
                                echo "<th>Phone Number</th>";
                                echo "<th>Email Address</th>";
                                echo "<th>Field</th>";
                                echo "<th>Role</th>";
                                echo "<th>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                         $x=1;
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>";
                                echo "<td>" . $row['Employee_Id'] . "</td>";
                                echo "<td>" . $row['First_Name'] ."  ". $row['Last_Name'] . "</td>";
                                echo "<td>" . $row['Gender'] . "</td>";
                                echo "<td>" . $row['Phone'] . "</td>";
                                echo "<td>" . $row['Email'] . "</td>";
                                echo "<td>" . $row['Field_of_study'] . "</td>";
                                echo "<td>" . $row['Role'] . "</td>";


                                echo "<td>";
                      echo "<a href='windows/employee_profile.php?id=". $row['Employee_Id'] ."' >"; ?><i class="fa fa-eye" style="font-size: 30px">View</i></a>
                                    <?php
                               echo "</td>";

                            echo "</tr>";
                           ++$x;
                        }
                        echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<br><br><br><p class='lead btn-danger'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            // Close connection
            mysqli_close($link);
            ?>
        </div>
    </div>
</body>
</html>
<?php }} else{  header('location:index.php'); } ?>