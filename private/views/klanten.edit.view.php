<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="edit"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Klant Wijzigen
        </div>
    </div>
    <div class="d-flex align-items-center p-2">
        <div  class="d-flex pt-3 justify-content-center">
            <ul class="breadcrumb">
                <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                <li><a href="<?=ROOT?>/klanten">Actieve klanten</a></li>
                <li>Klant wijzigen</li>
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
                            <i class="icon2" data-feather="file-text"></i>
                        </div>
                        <div class="d-flex title justify-content-center">
                            Gegevens
                        </div>
                    </div>

                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                            <?php foreach($errors as $error):?>
                                <br><?=$error?>
                            <?php endforeach;?>
                            </span>
                        </div>
                    <?php endif;?>
                    <div class=" pt-3 ps-3  action-bar d-flex justify-content-between">

                        <div class="col-sm-4 col-md-3 flex-grow-1">

                            <table>
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
                                        Adres
                                    </td>
                                    <td style="width: 300%;">
                                        <input autofocus class="my-2 form-control"  value="<?=get_var('adres', $row[0]->adres)?>" type="text" name="adres" placeholder="adres" >

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Woonplaats
                                    </td>
                                    <td style="width: 300%;">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('woonplaats', $row[0]->woonplaats)?>" type="text" name="woonplaats" placeholder="Woonplaats" >
                                    </td>
                                </tr>
                                <tr style="display:none;">
                                    <td>
                                        image
                                    </td>
                                    <td style="width: 300%">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('image',$row[0]->image)?>" type="text" name="image" placeholder="image">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Telefoonnnummer
                                    </td>
                                    <td style="width: 300%;">
                                        <input autofocus class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer', $row[0]->telefoonnummer)?>" name="telefoonnummer" placeholder="Telefoonnummer" >
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
                            </table>

                            <div class="container-btn d-flex p-2 justify-content-between float-end">
                                <a href="<?=ROOT?>/klanten">
                                    <button type="button" class="dangerbtn">Annuleer</button>
                                </a>
                                <button class="submitbtn">Opslaan</button>
                            </div>
                        </div>

                        <div class="align-items-center p-5">
                            <img id="thumb" src="<?=$image?>" class="border border-primary d-block mx-auto rounded-circle " style="width:150px; height: 150px">
                            <br>
                            <div class="text-center">
                                <label for="image_browser" class="imagebtn">
                                    <input  id="image_browser" type="file"  onchange="preview()" name="image" style="display: none;">
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
            <h3>Klant niet gevonden</h3>
            <br><br>
            <a href="<?=ROOT?>/klanten">
                <input class="dangerbtn" type="button" value="Annuleer">
            </a>
        </div>
    <?php endif; ?>


    <script>
        function preview() {
            thumb.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <?php $this->view('includes/footer')?>



