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

<div class="container-bg">
    <form class="shadow-sm" method="post">

        <div class="p-2  mr-4" style="margin-top: 50px; width: 100%">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="user-plus"></i>
            </div>
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
            <button type="submit" class="btn btn-primary float-end">Maak aan</button>

            <a href="<?=ROOT?>/leden">
                <button type="button" class="btn btn-danger">Annuleer</button>
            </a>
        </div>
    </form>

</div>

<?php $this->view('includes/footer')?>



