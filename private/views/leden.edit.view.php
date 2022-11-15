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
            <?php
            $image = get_image($row[0]->image);
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="p-2  mr-4" style="margin-top: 50px">

                    <div class="d-flex align-items-center p-0">
                        <div class="icon-container d-flex align-items-center justify-content-center">
                            <i class="icon2" data-feather="edit"></i>
                        </div>
                        <div class="d-flex title justify-content-center">
                            Gegevens wijzigen
                        </div>
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
                    <div class="d-flex align-items-center p-0">
                        <div class="col-sm-4 col-md-3">
                            <img src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
                            <br>
                            <div class="text-center">
                                <label for="image_browser" class="btn-sm btn btn-info text-white">
                                    <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
                                    Browse Image
                                </label>
                                <br>
                                <input name="image" value="<?=get_var('image',$row[0]->image)?>" class=" text-muted"></input>
                            </div>

                            <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?>" type="text" name="voornaam" placeholder="Voor naam">
                            <input autofocus class="my-2 form-control" value="<?=get_var('achternaam',$row[0]->achternaam)?>" type="text" name="achternaam" placeholder="Achter naam">
                            <input autofocus class="my-2 form-control"  value="<?=get_var('adres', $row[0]->adres)?>" type="text" name="adres" placeholder="adres" >
                            <input autofocus class="my-2 form-control" value="<?=get_var('woonplaats', $row[0]->woonplaats)?>" type="text" name="woonplaats" placeholder="Woonplaats" >
                            <input autofocus class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer', $row[0]->telefoonnummer)?>" name="telefoonnummer" placeholder="Telefoonnummer" >
                            <input autofocus class="my-2 form-control" type="email" value="<?=get_var('email', $row[0]->email)?>" name="email" placeholder="Email">

                            <br>
                            <button class="btn btn-primary float-end">Opslaan</button>

                            <a href="<?=ROOT?>/leden">
                                <button type="button" class="btn btn-danger">Annuleer</button>
                            </a>
                        </div>
                    </div>
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


<script>
    function display_image_name(file_name)
    {
        document.querySelector(".file_info").innerHTML = '<b>Selected file:</b><br>' + file_name;
    }
</script>
<?php $this->view('includes/footer')?>



