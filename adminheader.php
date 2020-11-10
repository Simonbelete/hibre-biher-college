
<?php
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
    $id=$_SESSION['username'];
    if(  $_SESSION['role']=='dean'){?>
    <nav class="navbar navbar-expand-lg navbar-light  bg-success" style="margin: -20px" >
        <div class="container-fluid  bg-success">
            <button type="button" id="sidebarCollapse" class="navbar-btn bg-success" style="margin-left: -10px">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    
                    <li class="nav-item active ">
                        <button data-toggle="modal" data-target="#myModal_dept" class="nav-link  btn btn-default  render bg-success"  style="color: #FFFFFF"> Department</button>
                    </li>
                    <li class="nav-item active ">
                        <button data-toggle="modal" data-target="#myModal_course" class="nav-link  btn btn-default  render bg-success" style="color: #FFFFFF" >Course</button>
                    </li>
                    <li class="nav-item active ">
                        <button data-toggle="modal" data-target="#myModal_usr" class="nav-link  btn btn-default  render bg-success"  style="color: #FFFFFF"> Employee</button>
                    </li>
					<li class="nav-item active ">
                        <button class="nav-link  btn btn-default  render bg-success" ><a style="color: #FFFFFF" href="database/backup_database/database-backup.php">Backup Database</a></button>
                    </li>
                    <li class="nav-item active ">
                        <button class="nav-link btn btn-default   render bg-success" ><a href="logout.php" style="color: #FFFFFF">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
   <?php                         
        $conn = new mysqli("10.180.50.214:3306","hbceduet","qazxsw","hbc");
        $count=0;
        $sql2="SELECT * FROM comments WHERE status = 0";
        $result=mysqli_query($conn, $sql2);
        $count=mysqli_num_rows($result);
    ?>

    <div style="position:relative">
        <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="notification-icon.png" width="50px" /></button>
       <div id="notification-latest"></div>
    </div>
    <?php }

    if(  $_SESSION['role']=='admin'){
    $id=$_SESSION['username']; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-success" style="margin: -20px">
        <div class="container-fluid bg-success">
            <button type="button" id="sidebarCollapse" style="margin-left: -10px" class="navbar-btn bg-success">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <button data-toggle="modal" data-target="#myModal_stud" class="nav-link  btn btn-default  render bg-success"  style="color: #FFFFFF">Add Student</button>
                    </li>
                    <li class="nav-item active ">
                        <button class="nav-link btn btn-default   render bg-success" ><a href="logout.php"  style="color: #FFFFFF">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php }
     if(  $_SESSION['role']=='vice dean'||$_SESSION['role']=='head'){  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-success" style="margin: -20px">
        <div class="container-fluid bg-success">
            <button type="button" id="sidebarCollapse" style="margin-left: -10px" class="navbar-btn bg-success">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <button class="nav-link btn btn-default   render bg-success" ><a href="logout.php"  style="color: #FFFFFF">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php } ?>



    <link rel="stylesheet" href="header-notification/notification-demo-style.css" type="text/css">
    <script type="text/javascript">
    function myFunction() {
        $.ajax({
            url: "view_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count").remove();
                $("#notification-latest").show();$("#notification-latest").html(data);
            },
            error: function(){}
        });
     }

     $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon'){
                $("#notification-latest").hide();
            }
        });
    });

    </script>

    <?php } else{  header('location:index.php'); } ?>
