<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="edit"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Lid Toevoegen
        </div>
    </div>
    <div class="d-flex align-items-center p-2">
        <div  class="d-flex pt-3 justify-content-center">
            <ul class="breadcrumb">
                <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                <li><a href="<?=ROOT?>/users">Medewerkers</a></li>
                <li>Wijzigen</li>
            </ul>
        </div>
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
                    <div class="d-flex align-items-center p-1">
                        <div class="icon-container d-flex align-items-center justify-content-center">
                            <i class="icon2" data-feather="user-plus"></i>
                        </div>
                        <div class="d-flex title justify-content-center">
                            Gegevens
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
                    <div class=" pt-3 ps-2 d-flex justify-content-between">

                        <div class="col-sm-4 col-md-3 flex-grow-1">

                            <table>
                                <tr style="display:none;">
                                    <td>
                                        id
                                    </td>
                                    <td style="width: 300%">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('id',$row[0]->id)?>" type="text" name="id" placeholder="id">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Voornaam
                                    </td>
                                    <td style="width: 300%">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?>" type="text" name="voornaam" placeholder="Voor naam">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Achternaam
                                    </td>
                                    <td style="300%">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('achternaam',$row[0]->achternaam)?>" type="text" name="achternaam" placeholder="Achter naam">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Telefoonnnummer
                                    </td>
                                    <td style="width: 300%;">
                                        <input autofocus class="my-2 form-control" type="text" value="<?=get_var('telefoonnummer', $row[0]->telefoonnummer)?>" name="telefoonnummer" placeholder="Telefoonnummer" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        E-mail
                                    </td>
                                    <td style="width: 300%;">
                                        <input autofocus class="my-2 form-control" type="email" value="<?=get_var('email', $row[0]->email)?>" name="email" placeholder="Email">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Rol
                                    </td>
                                    <td style="width: 300%;">
                                        <select name="rol" class="my-2 form-control">
                                            <option <?=get_select('rol', '')?> value="">Kies een rol...</option>
                                            <option <?=get_select('rol','admin')?><?php if($row[0]->rol =="admin") echo 'selected="selected"'; ?> value="admin">Admin</option>
                                            <option <?=get_select('rol','medewerker')?><?php if($row[0]->rol =="medewerker") echo 'selected="selected"'; ?> value="medewerker">Medewerker</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <div class="container-btn d-flex p-2 justify-content-between float-end">
                                <a href="<?=ROOT?>/users">
                                    <button type="button" class="dangerbtn">Annuleer</button>
                                </a>
                                <button class="submitbtn">Opslaan</button>
                            </div>
                        </div>

                        <div class="align-items-center p-5">
                            <img src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px;">
                            <br>
                            <div class="text-center">
                                <label for="image_browser" class="imagebtn">
                                    <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
                                    Afbeelding zoeken
                                </label>
                                <br>

                            </div>
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



