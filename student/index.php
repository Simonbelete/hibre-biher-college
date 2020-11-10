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
                <title>Hibre Biher College</title>
        <link rel="icon" href="../upload/uploadedimage/logo.jpg" type="image/png">
                
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="../../bootstrap/fontawesome.min.css">

            </head>
            <body style="width: 100%">

                <div class="wrapper">
                    <?php require_once('left.php');?>
                    <div id="content">
                        <?php require_once('head.php');?>
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
                <?php require_once('tab/footer.php');?>
            </body>
        </html>
        <?php
    }
    else{ header('location:../index.php'); } ?>