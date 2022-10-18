<?php $this->view('includes/head')?>

    <div class="container-fluid">
        <form method="post">
            <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
                <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class="d-block mx-auto rounded-circle" style="width:100px;">
                <h3>Login</h3>
                <?php if(count($errors) > 0):?>
                <div class="alert alert-warning" role="alert">
                    <?php foreach($errors as $error):?>
                     <br>-<?=$error?>
                    <?php endforeach;?>
                </div>
                <?php endif;?>
                <input class="my-1 form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus>
                <input class="my-1 form-control" value="<?=get_var('password')?>" type="password" name="password" placeholder="Password">
                <br>
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <?php $this->view('includes/footer')?>