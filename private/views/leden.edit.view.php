<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="table"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Lid Toevoegen
        </div>
    </div>
    <div class="d-flex align-items-center p-2 ">
        <?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>
    </div>
</div>

<div class="container-bg p-4 shadow-sm" style="margin-top: 50px">
    <?php if($row):?>
    <div class="card-group justify-content-center">

    <form method="post">
        <div class="p-4 mx-auto mr-4" style="margin-top: 50px;width:100%;max-width: 340px;">
            <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class="d-block mx-auto rounded-circle" style="width:200px;">
            <h3>Edit lid</h3>

            <?php if(count($errors) > 0):?>
                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                    <strong>Errors:</strong>
                    <?php foreach($errors as $error):?>
                        <br><?=$error?>
                    <?php endforeach;?>
                    </span>
                </div>
            <?php endif;?>

            <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?>" type="text" name="voornaam" placeholder="Voor naam">
            <input autofocus class="my-2 form-control" value="<?=get_var('achternaam',$row[0]->achternaam)?>" type="text" name="achternaam" placeholder="Achter naam">
            <input class="my-2 form-control"  value="<?=get_var('adres', $row[0]->adres)?>" type="text" name="adres" placeholder="adres" >
            <input class="my-2 form-control" value="<?=get_var('woonplaats', $row[0]->woonplaats)?>" type="text" name="woonplaats" placeholder="Woonplaats" >
            <input class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer', $row[0]->telefoonnummer)?>" name="telefoonnummer" placeholder="Telefoonnummer" >
            <input class="my-2 form-control" type="email" value="<?=get_var('email', $row[0]->email)?>" name="email" placeholder="Email">

            <br>
            <button class="btn btn-primary float-end">Opslaan</button>

            <a href="<?=ROOT?>/leden">
                <button type="button" class="btn btn-danger">Annuleer</button>
            </a>
        </div>
    </form>
    </div>
    <?php else: ?>

        <div style="text-align: center;">
            <h3>That school was not found!</h3>
            <div class="clearfix"></div>
            <br><br>
            <a href="<?=ROOT?>/leden">
                <input class="btn btn-danger" type="button" value="Annuleer">
            </a>
        </div>
    <?php endif; ?>

</div>

<?php $this->view('includes/footer')?>



