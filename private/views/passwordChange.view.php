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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php

            if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                $key = $_GET["key"];
                $email = $_GET["email"];
                $curDate = date("Y-m-d H:i:s");
                $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `token`='" . $key . "' and `email`='" . $email . "';");
                $row = mysqli_num_rows($query);
                if ($row == "") {
                    $error .= '<h2>Invalid Link</h2>';
                } else {
                    $row = mysqli_fetch_assoc($query);
                    $expDate = $row['expDate'];
                    if ($expDate >= $curDate) {
                        ?>
            <div class="p-4 mx-auto mr-4 shadow rounded " style="margin-top: 200px;width:100%;max-width: 340px;">
                <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class=" d-block mx-auto" style="width:200px;">
                <h3>Wachtwoord herstellen</h3>
                        <form method="post" action="" name="update">

                            <input type="hidden" name="action" value="update" class="form-control"/>


                            <div class="form-group">
                                <label>Voer een nieuw wachtwoord in</label>
                                <input type="password"  name="pass1" value="update" class="form-control"/>
                            </div>


                                <label>Herhaal nieuw wachtwoord</label>
                                <input type="password"  name="pass2" value="update" class="form-control"/>
                            <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                            <div class="form-group">
                                <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                            </div>

                        </form>
            </div>
                        <?php
                    } else {
                        $error .= "<h2>Link Expired</h2>>";
                    }
                }
                if ($error != "") {
                    echo "<div class='error'>" . $error . "</div><br />";
                }
            }


            if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                $error = "";
                $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
                $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
                $email = $_POST["email"];
                $curDate = date("Y-m-d H:i:s");
                if ($pass1 != $pass2) {
                    $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                }
                if ($error != "") {
                    echo $error;
                } else {

                    $pass1 = password_hash($pass1, PASSWORD_DEFAULT);
                    mysqli_query($con, "UPDATE `user` SET `wachtwoord` = '" . $pass1  . "' WHERE `email` = '" . $email . "'");

                    mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");

                    header("Location: http://twirlingteamsparkle.nl/public/login");
                }
            }
            ?>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>


