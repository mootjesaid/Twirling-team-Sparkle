<?php $this->view('includes/head')?>

<?php
$con = mysqli_connect("localhost", "root", "", "db_twirling_team_sparkle");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
date_default_timezone_set('Asia/Kolkata');
$error = "";
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
?>






            <?php
            $succes = "";
            $errors = "";
            if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                $email = $_POST["email"];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!$email) {
                    $error .="<p>Invalid email address please type a valid email address!</p>";
                }else{
                    $sel_query = "SELECT * FROM `user` WHERE email='".$email."'";
                    $results = mysqli_query($con,$sel_query);
                    $row = mysqli_num_rows($results);
                    if ($row=="0"){
                        $error .= "<p>Er is geen gebruiker met dit email adres</p>";
                    }
                }
                if($error!=""){
                     $errors = $error;
                } else {

                    $output = '';

                    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                    $expDate = date("Y-m-d H:i:s", $expFormat);
                    $key = md5(time());
                    $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                    $key = $key . $addKey;
                    // Insert Temp Table
                    mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `token`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                    $output.='<p>Please click on the following link to reset your password.</p>';
                    //replace the site url
                    $output.='<p><a href="http://twirlingteamsparkle.nl/public/passwordChange?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/Twirling-team-Sparkle/public/passwordChange?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                    $body = $output;
                    $subject = "Password Recovery";

                    $email_to = $email;


                    //autoload the PHPMailer
                    require('C:/xampp/htdocs/Twirling-team-Sparkle/vendor/autoload.php');
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Host = "smtp.gmail.com"; // Enter your host here
                    $mail->SMTPAuth = true;
                    $mail->Username = "mootjje07@gmail.com"; // Enter your email here
                    $mail->Password = "wqgwwudffhrlhjhi"; //Enter your passwrod here
                    $mail->Port = 587;
                    $mail->IsHTML(true);
                    $mail->From = "mootjje07@gmail.com";
                    $mail->FromName = "Twirling Team Sparkle";

                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->AddAddress($email_to);
                    if (!$mail->Send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        $succes = "Er is een e-mail naar u verzonden voor het opnieuw instellen van uw wachtwoord";
                    }
                }
            }
            ?>

<div class="container-fluid">

    <form method="post" action="" name="reset">

        <div class="p-4 mx-auto mr-4 shadow rounded " style="margin-top: 200px;width:100%;max-width: 340px;">
            <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class=" d-block mx-auto" style="width:200px;">
            <h3>Wachtwoord herstellen</h3>
            <?php if($succes):?>
                <div class="alert alert-success alert-dismissible fade show p-1" role="alert">

                        <?=$succes?>
                    </span>
                </div>
            <?php endif;?>
            <?php if($errors):?>
                <div class="alert alert-success alert-dismissible fade show p-1" role="alert">

                    <?=$error?>
                    </span>
                </div>
            <?php endif;?>
            <input class="form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus autocomplete="off">
            <br>
                <button type="submit" id="reset" class="btn btn-primary">Login</button>
        </div>

    </form>
</div>

