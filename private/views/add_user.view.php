<?php $this->view('includes/head')?>
<?php
    print_r($errors);
    //
?>
    <div class="container-fluid">
        <form method="post"> 
            <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
                <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class="d-block mx-auto rounded-circle" style="width:200px;">
                <h3>Add User</h3>
                <?php if(count($errors) > 0):?>
                <div class="alert alert-warning" role="alert">
                    <?php foreach($errors as $error):?>
                     <br>-<?=$error?>
                    <?php endforeach;?>
                </div>
                <?php endif;?>
                <input class="my-2 form-control" value="<?=get_var('firstname')?>" type="firstname" name="firstname" placeholder="First Name" >
                <input class="my-2 form-control" value="<?=get_var('lastname')?>" type="lastname" name="lastname" placeholder="Last Name" >
                <select class="my-2 form-control" name="rol">
                    <option <?=get_select('rol', '')?> value="">Kies een rol...</option>
                    <option <?=get_select('rol', 'medewerker')?>  value="0">Medewerker</option>
                    <option <?=get_select('rol', 'admin')?>  value="1">Admin</option>

                </select>
                <input class="my-2 form-control" value="<?=get_var('telnummer')?>" type="number" name="telnummer" placeholder="Telefoon nummer" >
                <input class="my-2 form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" >
                <input class="my-2 form-control" type="text" name="password" placeholder="Wachtwoord">
                <input class="my-2 form-control" type="text" name="password2" placeholder="Herhaal wachtwoord">
                <br>
                <button class="btn btn-primary float-end">Add User</button>
                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>

