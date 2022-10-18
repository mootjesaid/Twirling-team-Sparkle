<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>


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

            <input class="my-2 form-control"  value="<?=get_var('voornaam')?>" type="text" name="voornaam" placeholder="Voor naam" >
            <input class="my-2 form-control" value="<?=get_var('achternaam')?>" type="text" name="achternaam" placeholder="Achter naam" >
            <input class="my-2 form-control"  value="<?=get_var('adres')?>" type="text" name="adres" placeholder="adres" >
            <input class="my-2 form-control" value="<?=get_var('woonplaats')?>" type="text" name="woonplaats" placeholder="Woonplaats" >
            <input class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer')?>" name="telefoonnummer" placeholder="Telefoonnummer" >
            <input class="my-2 form-control" type="email" value="<?=get_var('email')?>" name="email" placeholder="Email">

            <br>
            <button class="btn btn-primary float-end">Add User</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </div>
    </form>

</div>


