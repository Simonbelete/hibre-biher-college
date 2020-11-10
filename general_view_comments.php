<?php session_start();
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
         if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
            $id=$_SESSION['username'];     ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <link rel="icon" href="upload/uploadedimage/logo.jpg" type="image/png">
                    <link rel="stylesheet" href="style5.css">
                    <title>Hibre Biher College</title>
                    <link rel="stylesheet" href="bootstrap/css.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <link rel="stylesheet" href="bootstrap/fontawesome.min.css">
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
                        .render:hover{
                            background-color: #808080;
                            color: #ffffff;
                        }
                    </style>
                </head>
                <body>
                    <?php
                        require_once('AddDept.php');
                        require_once('AddCourse.php');
                        require_once('adduser.php');
                        require_once('addstudentmodal.php');
                        require_once('addimagemodal.php');
                    ?>
                    <div class="wrapper">
                       <?php require_once('left.php'); ?>
                       <div id="content">
                          <?php require_once('adminheader.php');
                          if($_SESSION['role']=='dean' ) {  ?>
                            <iframe src="delete comment/browse comment.php" frameborder="12" width="100%" height="90%"></iframe>
                          <?php }  ?>

                       </div>
                    </div>
                    <script type="text/javascript">
                        $('#sidebarCollapse').on('click', function () {
                            $('#sidebar, #content').toggleClass('active');
                            $('.collapse.in').toggleClass('in');
                            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                        });
                    </script>
                    <hr class="rgba-white-light" style="background: #FFFFFF" style="margin: 0 15%;">
                    <?php require_once('windows/footer.php');?>
                </body>
            </html> <?php
         }
    }
    else{ header('location:index.php'); }
?>