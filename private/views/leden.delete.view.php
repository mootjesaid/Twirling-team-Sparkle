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

    <div class="shadow-sm" style="margin-top: 50px">
        <?php if($row):?>
            <div class="container-bg  ">

                <form method="post">
                    <div class="p-2  mr-4" style="margin-top: 50px">
                        <div class="d-flex align-items-center p-0">
                            <div class="icon-container d-flex align-items-center justify-content-center">
                                <i class="icon2" data-feather="edit"></i>
                            </div>
                            <div class="d-flex title justify-content-center">
                                Lid verwijderen
                            </div>
                        </div>

                        <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?> <?=get_var('voornaam',$row[0]->achternaam) ?>" type="text" name="voornaam" placeholder="Voor naam">
                       <!-- <input autofocus class="my-2 form-control" value="<?/*=get_var('achternaam',$row[0]->achternaam)*/?>" type="text" name="achternaam" placeholder="Achter naam">
                        <input autofocus class="my-2 form-control"  value="<?/*=get_var('adres', $row[0]->adres)*/?>" type="text" name="adres" placeholder="adres" >
                        <input autofocus class="my-2 form-control" value="<?/*=get_var('woonplaats', $row[0]->woonplaats)*/?>" type="text" name="woonplaats" placeholder="Woonplaats" >
                        <input autofocus class="my-2 form-control" type="number" value="<?/*=get_var('telefoonnummer', $row[0]->telefoonnummer)*/?>" name="telefoonnummer" placeholder="Telefoonnummer" >
                        <input autofocus class="my-2 form-control" type="email" value="<?/*=get_var('email', $row[0]->email)*/?>" name="email" placeholder="Email">-->

                        <br>
                        <input type="hidden" name="id">
                        <input class="btn btn-danger float-end" type="submit" value="Verwijderen">

                        <a href="<?=ROOT?>/leden">
                            <input class="btn btn-success" type="button" value="Annuleren">
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

<?php $this->view('includes/footer');



