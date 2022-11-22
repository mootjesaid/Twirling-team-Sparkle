<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="edit"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Team Wijzigen
        </div>
    </div>
    <div class="d-flex align-items-center p-2">
        <div  class="d-flex pt-3 justify-content-center">
            <ul class="breadcrumb">
                <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                <li><a href="<?=ROOT?>/teams">Teams</a></li>
                <li>Team wijzigen</li>
            </ul>
        </div>
    </div>
</div>

<div class="shadow-sm" style="margin-top: 50px">
    <?php if($row):?>
        <div class="container-bg  ">
            <form method="post" enctype="multipart/form-data">
                <div class="p-1  mr-4" style="margin-top: 50px">
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
                            <strong>Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <br><?=$error?>
                            <?php endforeach;?>
                            </span>
                        </div>
                    <?php endif;?>
                    <div class=" pt-3 ps-1  action-bar d-flex justify-content-between">

                        <div class="col-sm-4 col-md-2 flex-grow-1">

                            <table>
                                <tr>
                                    <td>
                                        Naam
                                    </td>
                                    <td class="ps-2" style="width: 95%">
                                        <input autofocus class="my-2 form-control" value="<?=get_var('naam',$row[0]->naam)?>" type="text" name="naam" placeholder="Naam">
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

    <?php $this->view('includes/footer')?>



