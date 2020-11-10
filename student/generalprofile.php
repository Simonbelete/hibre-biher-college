   <?php
    session_start();
    if( isset($_SESSION['username']) && isset($_SESSION['enrolid'])){
    $id=$_SESSION['username'];  ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="stylesheet" href="../style5.css">
                <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="../bootstrap/css.css">
                <script src="../bootstrap/jquery.min.js"></script>
        <link rel="icon" href="../upload/uploadedimage/logo.jpg" type="image/png">
                <script src="../bootstrap/popper.min.js"></script>
                <script src="../bootstrap/bootstrap.min.js"></script>
                <link rel="stylesheet" href="../user_profile.css" />
                <link rel="stylesheet" href="../bootstrap/fontawesome.min.css">

            </head>
            <body style="width: 100%">

                <div class="wrapper">
                    <?php require_once('left.php');?>
                    <div id="content">
                        <?php require_once('head.php');?>
                        <?php  require_once('profile.php');?>
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
                <?php require_once('../windows/footer.php');?>
            </body>
        </html>
        <?php
    }
    else{ header('location:../index.php'); } ?>