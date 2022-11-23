<?php $this->view('includes/head')?>

<body class="bodyLogin">
    <div class="container-fluid">

        <form method="post">
            <div class="p-4 mx-auto mr-4 shadow rounded bg" style="margin-top: 200px;width:100%;max-width: 340px;">
                <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class=" d-block mx-auto" style="width:200px;">
                <h3>Login</h3>

                <?php if(count($errors) > 0):?>
                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                        <?php foreach($errors as $error):?>
                            <?=$error?>
                        <?php endforeach;?>
                  </span>
                    </div>
                <?php endif;?>

                <input class="form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus autocomplete="off">
                <br>
                <input class="form-control" value="<?=get_var('wachtwoord')?>" type="password" name="wachtwoord" placeholder="wachtwoord">
                <br>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">Login</button>
                    <a href="<?=ROOT?>/passwordReset" class="text text-links mt-3">Wachtwoord vergeten</a>
                </div>

            </div>

        </form>
    </div>
</body>