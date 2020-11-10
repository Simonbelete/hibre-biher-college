    <!DOCTYPE html>
        <html>
    <?php
        session_start();
        if( isset($_SESSION['username']) && isset($_SESSION['role']) ){
                $id=$_SESSION['username'];  ?>
            <head>
                <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" href="upload/uploadedimage/logo.jpg" type="image/png">
                <title>Hibre Biher College</title>                       
                <link rel="stylesheet" href="user_profile.css" />
                <link rel="stylesheet" href="style5.css" />
                <link rel="stylesheet" href="bootstrap/css.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="bootstrap/fontawesome.min.css">
                <script type="text/javascript">
        			function chkAlphabets(event)
                    {
                        if(!((event.which>=65 && event.which<=90)
                        || (event.which>=97 && event.which<=122)))
                        {
        				return false;
        				}
        				else
        				{
        				return true;
        				}
                    }
                    function chkNum(event)
        			{
        				if(!(event.which>=48 && event.which<=57))
        				{
        				return false;
        				}
        				else
        				{
        				return true;
        				}
        			}
                    function PhoneNumberValidation(inputtxt)
                        {
                          var phoneno = /^\(?([0][9][0-9]{1})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                          if(inputtxt.value.match(phoneno))
                                {
                              return true;
                                }
                              else
                                {
                                    inputtxt.value="";
                                    alert("Not a valid Phone Number");
                                    return false;
                                }
                        }
                </script>
                <style>
                        .render {
                              background-color: #ffffff;
                              align-self: center;
                              font-family: 'Kreon', serif;
                              font-weight: 40;
                              font-size: 1.5em;
                              color: #000000;
                              text-shadow:
                            white 0.006em 0.006em 0.007em,
                            rgba(16, 16, 16, 0.4) 1px 18px 6px,
                            white -0.15em -0.1em 100px;
                        }
                        .err{color:red}
                        .render:hover{
                            background-color: #808080;
                            color: #ffffff;
                        }
                </style>
            </head>
            <body style="background: #FFFFFF">
            <?php if(  $_SESSION['role']=='dean'){
                        require_once('AddDept.php');
                        require_once('AddCourse.php');
                        require_once('adduser.php');
                        require_once('addimagemodal.php');
                    ?>
                    <div class="wrapper">
                       <?php require_once('left.php'); ?>
                       <div id="content">
                       <?php require_once('adminheader.php'); ?>
                       <br><br><br>
                        <div class="container my-1 ">
                                <section class="text-center dark-grey-text mb-1 " style="margin: auto">
                                    <div class="A card">
                                        <div class="card-body rounded-top border-top p-0">
                                             <h4 class="font-weight-bold my-4 " style="color: #000000">Set End Date For Lecture To Submit Students Result</h4>
                                              <form action="database/lecture_time.php" method="post" style="margin: 10px; ">
                                                   <input required="required" type="date"   class="form-control" style="margin: auto; margin-bottom: 20px; margin-top: 50px; width: 50%"  name="lname">
                                                   <input type="submit" name="Submit" style="margin: auto; width: 40%"   class="form-control" value="Submit">
                                               </form>
                                               <?php
                                                    if(isset($_GET["error_file"])){
                                                        if($_GET["error_file"]=='u1')   {  ?>
                                                            <div class="alert alert-success">
                                                                <span class="help-block">
                                                                    <i class="small"><span><h3>×</h3></span><h4>Time Is Set successfully.</h4></i>
                                                                </span>
                                                             </div> <?php
                                                        }
                                                        else {  ?>
                                                            <div class="alert alert-danger">
                                                                <span class="help-block">
                                                                    <i class="small"><span><h3>×</h3></span><h4><?php ECHO $_GET["error_file"];?></h4></i>
                                                                </span>
                                                             </div> <?php
                                                        }
                                                    }
                                               ?>
                                        <?php require_once('database/backup_database/restore.php'); ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                       </div>
                    </div>
                <?php  }
                if(  $_SESSION['role']=='admin'){?>
                    <?php
                        require_once('addstudentmodal.php');
                    ?>
                    <div class="wrapper">
                       <?php require_once('left.php'); ?>
                       <div id="content">
                           <?php require_once('adminheader.php'); ?>
                           <br><br><br>
                       </div>
                    </div>

                    <?php  }


                if(  $_SESSION['role']=='vice dean'||$_SESSION['role']=='head'){?>
                    <div class="wrapper">
                       <?php require_once('left.php'); ?>
                       <div id="content">
                           <?php require_once('adminheader.php'); ?>
                           <br><br><br>
                       </div>
                    </div>

                    <?php  }
                    ?>

                     <script type="text/javascript">
                            $('#sidebarCollapse').on('click', function () {
                                $('#sidebar, #content').toggleClass('active');
                                $('.collapse.in').toggleClass('in');
                                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                            });
                    </script>

                    <?php require_once('windows/footer.php');?>
</body>


 <?php   }  else{  header('location:index.php'); } ?>

</html>