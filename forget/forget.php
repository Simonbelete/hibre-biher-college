<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$errorr=$success="";

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'dbcon.php';

if (isset($_POST["Submit"])){
	$emailto=$_POST["email"];
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'hibrebiher.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'reset@hibrebiher.com';                     // SMTP username
        $mail->Password   = '=@wvREFtFK]6';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('reset@hibrebiher.com');
        $mail->addAddress($emailto);     // Add a recipient

        // Content
        //$mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

/*if (isset($_POST["Submit"])){
    $emailto=$_POST["email"];
    $code=uniqid(true);
    $query2=mysqli_query($con,"select Email_Address from user_student where Email_Address='$emailto' ");
    $query3=mysqli_query($con,"select Email from employee where Email='$emailto' ");
    if((mysqli_num_rows($query2) > 0 && mysqli_num_rows($query3) == 0) || (mysqli_num_rows($query2) == 0 && mysqli_num_rows($query3) > 0)){
        $qurey=mysqli_query($con,"insert into resettable(code, email)VALUES ('$code', '$emailto')");
        if($qurey){
           $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mz.tesfa@gmail.com';
            $mail->Password   = 'Astu123.com';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 587;
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            //Recipients
            $mail->setFrom('mz.tesfa@gmail.com');
            $mail->addAddress($emailto);
            $mail->addReplyTo('no-reply@gmail.com');
            // Content
            $url=$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/forget/resetPassword.php?code=$code";
            $mail->isHTML(true);
            $mail->Subject = 'Your password reset link';
            $mail->Body    = "<h1>Your requsted password link </h1>
                                Clik <a href='$url'>clik this</a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
             header("Location:index.php?errorr=>Password Resetter Link is send into your email account please refer it to forget you password");


         } catch (Exception $e) {
              header("Location:index.php?errorr=Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
        exit();
        }
        else $errorr = mysqli_error($con);
    } else  header("Location:index.php?errorr=Please Insert Your Correct Email Address");} 
*/?>

     <?php if(isset($_GET["errorr"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#myModalf").modal('show'); });
       </script>
   <?php } ?>
    <div id="myModalf" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center">Forget Password page</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php if(isset($_GET["errorr"])){ ?>
                    <div class="alert alert-danger">
                        <span class="help-block">
                            <i class="small"><span style="">×</span><?php echo $_GET["errorr"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                    <form  method="post">
                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <input type="email" name="email" required="required" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <input type="Submit" name="Cancel" value="Cancel" class="btn btn-secondary" data-dismiss="modal">
                            <input type="Submit" name="Submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>