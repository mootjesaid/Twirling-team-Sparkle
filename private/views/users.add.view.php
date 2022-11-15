<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="table"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Team aanmaken
        </div>
    </div>
    <div class="d-flex align-items-center p-2 ">

    </div>
</div>

<div class="shadow-sm" style="margin-top: 50px">
    <div class="container-bg  ">
        <?php
        $empty = '';
        $image = get_image($empty);
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="p-2  mr-4" style="margin-top: 50px">

                <?php if(count($errors) > 0):?>
                    <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                        <strong>Errors:</strong>
                        <?php foreach($errors as $error):?>
                            <br><?=$error?>
                        <?php endforeach;?>
                        </span>
                    </div>
                <?php endif;?>
                <div class="container pt-3 ps-3  action-bar d-flex justify-content-between">

                    <div class="col-sm-4 col-md-3 flex-grow-1">

                        <table>
                            <tr>
                                <td>
                                    Voornaam
                                </td>
                                <td style="width: 300%">
                                    <input class="my-2 form-control"  value="<?=get_var('voornaam')?>" type="text" name="voornaam" placeholder="Achternaam" >                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Achternaam
                                </td>
                                <td style="300%">
                                    <input class="my-2 form-control"  value="<?=get_var('achternaam')?>" type="text" name="achternaam" placeholder="Achternaam" >                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Telefoonnummer
                                </td>
                                <td style="width: 300%;">
                                    <input class="my-2 form-control"  value="<?=get_var('telefoonnummer')?>" type="text" name="telefoonnummer" placeholder="telefoonnummer" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td style="width: 300%;">
                                    <input class="my-2 form-control"  value="<?=get_var('email')?>" type="text" name="email" placeholder="E-mail" >                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Rol
                                </td>
                                <td style="width: 300%;">
                                    <select name="rol" class="my-2 form-control">
                                        <option <?=get_select('rol', '')?> value="">Kies een rol...</option>
                                        <option <?=get_select('rol','admin')?> value="admin">Admin</option>
                                        <option <?=get_select('rol','medewerker')?> value="medewerker">Medewerker</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Wachtwoord
                                </td>
                                <td style="width: 300%;">
                                    <input class="my-2 form-control"  value="<?=get_var('wachtwoord')?>" type="text" name="wachtwoord" placeholder="Wachtwoord" >                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Wachtwoord
                                </td>
                                <td style="width: 300%;">
                                    <input class="my-2 form-control"  value="<?=get_var('wachtwoord2')?>" type="text" name="wachtwoord2" placeholder="wachtwoord" >                                </td>
                            </tr>
                        </table>

                        <br>
                        <button class="btn btn-primary float-end">Opslaan</button>

                        <a href="<?=ROOT?>/leden">
                            <button type="button" class="btn btn-danger">Annuleer</button>
                        </a>
                    </div>

                    <div class="align-items-center p-5">
                        <img src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
                        <br>
                        <div class="text-center">
                            <label for="image_browser" class="btn-sm btn btn-info text-white">
                                <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
                                Browse Image
                            </label>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </form>

</div>

<?php $this->view('includes/footer')?>



