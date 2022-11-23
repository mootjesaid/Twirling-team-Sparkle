<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
        <div class="d-flex align-items-center p-2">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="table"></i>
            </div>
            <div class="d-flex title justify-content-center">
                Voeg een lid toe aan <?php foreach ($team as $obj)
                {
                    echo "team ".$obj->naam;
                }?>
            </div>
        </div>
        <div class="d-flex align-items-center p-2">
            <div  class="d-flex pt-3 justify-content-center">
                <ul class="breadcrumb">
                    <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                    <li><a href="<?=ROOT?>/teams">Teams</a></li>
                    <li><a href="<?=ROOT?>/teams"><?php foreach ($team as $obj)
                            {
                                echo "Team ".$obj->naam;
                            }?></a></li>
                    <li>Voeg een lid toe aan team sparkle</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-bg1 action-bar d-flex justify-content-end mt-3 mb-3">
        <i class="icon" data-feather="user"></i>

    </div>


    <div class="container-bg">
        <div class="container-fluid p-4 shadow-sm" <!--style="width: 80%; margin-left: 280px-->">

        <table id="tabel" class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>telefoonnummer</th>
                <th>email</th>
                <th>Datum</th>
                <th>Eind datum</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            <?php if($rows):?>

                <?php foreach ($rows as $row):?>

                    <?php
                    $image = get_image($row->image);
                    ?>
                    <tr class="align-middle">
                        <td style="width: 75px">
                            <div class="">
                                <img src="<?=$image?>" class="border border-primary d-block rounded-circle " style="width:55px;">
                            </div>
                        </td>
                        <td><?=$row->voornaam?><br><?=$row->achternaam?></td>
                        <td><?=$row->adres?></td>
                        <td><?=$row->woonplaats?></td>
                        <td><?=$row->telefoonnummer?></td>
                        <td><?=$row->email?></td>
                        <td><?=get_date($row->datum)?></td>
                        <td><?=get_date($row->eind_datum)?></td>
                        <td>
                            <a href="<?=ROOT?>/beheer/add/<?=$row->id?>/<?php foreach ($team as $obj)
                            {
                                echo $obj->id;
                            }?>"">
                                <button style="width: 120px" class="btn_row"></i>Toevoegen</button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach;?>
            <?php else:?>
            <div class="d-flex justify-content-center">
                <h4>Er zijn op dit moment geen teams gevonden</h4>
            </div>
            <?php endif;?>

            </tbody>

        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
        <script src="<?=ROOT?>/assets/app.js"></script>
    </div>

    </div>
    </div>

<?php $this->view('includes/footer')?>