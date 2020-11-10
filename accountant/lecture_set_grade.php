<?php session_start();
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])&& $_SESSION['role']!='admin'){
        $id=$_SESSION['username'];     ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="../style5.css">
            <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
            <link rel="stylesheet" href="../../bootstrap/css.css">
            <script src="../../bootstrap/jquery.min.js"></script>
            <script src="../../bootstrap/popper.min.js"></script>
            <script src="../../bootstrap/bootstrap.min.js"></script>

        <link rel="icon" href="../upload/uploadedimage/logo.jpg" type="image/png">
            <link rel="stylesheet" href="../../bootstrap/fontawesome.min.css">
            <script src="../../bootstrap/jquery-1.11.2.min.js"></script>
            <script src="../../bootstrap/moment.js"></script>
            <script src="../../bootstrap/jquery.countdown.min.js"></script>
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
           <?php require_once('AddFile.php');?>
                <div class="wrapper">
                    <?php require_once('left.php'); ?>
                    <div id="content">
                        <?php require_once('head.php');?>
                         <div class="container my-1 ">
                            <section class="text-center dark-grey-text mb-1 " style="width: 350px;margin: auto">
                                <div class="A card">
                                    <div class="card-body rounded-top border-top p-0"style="background: #575757">
                                         <h4 class="font-weight-bold my-4"  >
                                            <div id="left_time">
                                                <h2 >Time Left </h2>
                                                <p id="days"></p>
                                                <p id="hours"></p>
                                                <p id="mins"></p>
                                                <p id="secs"></p>

                                             </div>
                                         </h4>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="exp_div">
                            <?php require_once('../set_grade.php');?>
                        </div>
                    </div>
                </div>
                <?php require_once('../database/datetime.php'); //date time counter for lectures ?>
                <hr class="rgba-white-light" style="background: #0000FF" style="margin: 0 15%;">
                 <?php require_once('../windows/footer.php');?>
             <script type="text/javascript">
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar, #content').toggleClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
            </script>
        </body>
        </html>
        <?php
    }
    else{ header('location:../home.php'); }
?>