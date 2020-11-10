<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<!DOCTYPE html>

  <html lang="en">     
    <head>
        <title>Hibre Biher College</title>
        <meta charset="utf-8">
        <meta name="viewport"content="width=device-width, maximum-scale=1">
        <link rel="icon" href="upload/uploadedimage/logo.jpg" type="image/png">
        <link rel="stylesheet" href="bootstrap/css.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style type="text/css">
           #news_title{
            align-self: center;
            font-family: 'Kreon', serif;
            font-weight: 300;
            font-size: 2em;
            color: #000000;
            text-shadow:  rgba(16, 16, 16, 0.4) 1px 18px 6px,
                          white -0.15em -0.1em 100px;"
           }
        </style>
        <script>
            $(document).ready(function(){
                $('#home').addClass('show');
            });
            $(document).mouseup(function(e) {
                var container = $("#tablist");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.A').removeClass('active');
                    $(this).addClass('active');
                }
            });
        </script>
    </head>
    <body id="css-script-menu" >
        <?php
            require_once('windows/login.php');
            require_once('forget/forget.php');
        ?>

        <nav class="nav nav-tabs navbar-expand-md bg-success fixed-top">
            <?php  require_once('windows/topmain.php');?>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
                <span class="navbar-toggler-icon"style="background-image: url(images/Activity.png)"> </span>
            </button>
            <div class="collapse navbar-collapse bg-success"  id="collapse_Navbar">
                <div class="navbar-nav ml-auto">
                    <a href="#home" data-toggle="tab" class="nav-link nav-item A active "><h3>Home</i></h3></a>
                    <a href="#news" data-toggle="tab" class="nav-link nav-item A" tabindex="-1"><h3>News</h3></a>
                    <a href="#academicse" data-toggle="tab" class="nav-item nav-link A" tabindex="-1"><h3>academic </h3></a>
                    <a href="#student" data-toggle="tab" class="nav-item nav-link A" tabindex="-1"><h3>Students</h3></a>
                    <a href="#contact" data-toggle="tab" class="nav-item nav-link A" tabindex="-1"><h3>ContactUs</h3></a>
                    <a href="#aboutas" data-toggle="tab" class="nav-link nav-item A" tabindex="-1"><h3>AboutUs</h3></a>
                </div>
                <div class="navbar-nav ml-auto A" style=" margin-top: 2px; margin-right: 10px">
                     <h3  class="btn btn-success  cc" data-toggle="modal" data-target="#myModal" data-title="Login System"style="font-size: large;color: #FFFFFF; width: 60px; "> Login</h3>
                </div>
                <div class="navbar-nav  A" style=" margin-top: 2px; margin-right: 10px">
                     <h3  class="btn btn-success  cc" data-toggle="modal" data-target="#myModalf" data-title="Forget System"style="font-size: large;color: #FFFFFF; width: 60px"> Forget</h3>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="tab-content">
                <div id="home" class="tab-pane fade active">
                    <br>
                    <?php
                        require_once('upload/imagegallery.php');
                        require_once('windows/welcome.php');
                     ?>
                    <hr>
                </div>
                <?php
                    require_once('windows/profile.php');
                    require_once('windows/news.php');
                    require_once('windows/office.php');
                    require_once('windows/academicse.php');
                    require_once('windows/aboutas.php');
                    require_once('windows/Contact.php');
                    require_once('windows/student.php');
                ?>
            </div>
        </div>
    </body>
    <?php require_once('windows/footer.php');
 ?>
</html>

