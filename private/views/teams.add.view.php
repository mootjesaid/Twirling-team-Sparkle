<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="plus"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Team toevoegen
        </div>
    </div>
    <div class="d-flex align-items-center p-2">
        <div  class="d-flex pt-3 justify-content-center">
            <ul class="breadcrumb">
                <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                <li><a href="<?=ROOT?>/home">Teams</a></li>
                <li>Team toevoegen</li>
            </ul>
        </div>
    </div>
</div>

<div class="container-bg">
    <form class="shadow-sm" method="post">

        <div class="p-2  mr-4" style="margin-top: 50px; width: 100%">
            <div class="d-flex align-items-center p-0">
                <div class="icon-container d-flex align-items-center justify-content-center">
                    <i class="icon2" data-feather="file-text"></i>
                </div>
                <div class="d-flex title justify-content-center">
                    Gegevens
                </div>
            </div>
            <?php if(count($errors) > 0):?>
                <div class="alertA alert-warning alert-dismissible fade show p-1" role="alert">
                    <strong>Errors:</strong>
                    <?php foreach($errors as $error):?>
                        <br><?=$error?>
                    <?php endforeach;?>
                    </span>
                </div>
            <?php endif;?>
            <div class=" pt-3 ps-0  action-bar d-flex justify-content-between">

                <div class="col-sm-4 col-md-2 flex-grow-1">

                    <table>
                        <tr>
                            <td>
                                Naam
                            </td>
                            <td class="ps-2" style="width: 95%">
                                <input autofocus class="my-2 form-control" value="<?=get_var('naam')?>" type="text" name="naam" placeholder="Naam">
                            </td>
                        </tr>
                    </table>

                    <div class="container-btn d-flex p-2 justify-content-between float-end">
                        <a href="<?=ROOT?>/teams">
                            <button type="button" class="dangerbtn">Annuleer</button>
                        </a>
                        <button class="submitbtn">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<?php $this->view('includes/footer')?>



