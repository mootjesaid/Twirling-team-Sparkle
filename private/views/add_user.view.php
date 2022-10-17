<?php $this->view('includes/head')?>

    <div class="container-fluid">
        <form method="post">
            <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
                <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class="d-block mx-auto rounded-circle" style="width:200px;">
                <h3>Add User</h3>

                <?php if(count($errors) > 0):?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <strong>Errors:</strong>
                        <?php foreach($errors as $error):?>
                            <br><?=$error?>
                        <?php endforeach;?>
			  </span>
                    </div>
                <?php endif;?>

                <input class="my-2 form-control"  value="<?=get_var('voornaam')?>" type="voornaam" name="voornaam" placeholder="First Name" >
                <input class="my-2 form-control" value="<?=get_var('achternaam')?>" type="achternaam" name="achternaam" placeholder="Last Name" >

                <select name="rol" class="my-2 form-control">
                    <option <?=get_select('rol', '')?> value="">Kies een rol...</option>
                    <option <?=get_select('rol','admin')?> value="admin">Admin</option>
                    <option <?=get_select('rol','medewerker')?> value="medewerker">Medewerker</option>
                </select>

                <input class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer')?>" name="telefoonnummer" placeholder="Telefoonnummer" >
                <input class="my-2 form-control" type="email" value="<?=get_var('email')?>" name="email" placeholder="Email" >
                <input class="my-2 form-control" type="text" value="<?=get_var('wachtwoord')?>" name="wachtwoord" placeholder="Wachtwoord">
                <input class="my-2 form-control" type="text"value="<?=get_var('wachtwoord2')?>" name="wachtwoord2" placeholder="Wachtwoord2">

                <br>
                <button class="btn btn-primary float-end">Add User</button>
                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </form>

    </div>

