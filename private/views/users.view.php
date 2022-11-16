<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
        <div class="d-flex align-items-center p-2">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="table"></i>
            </div>
            <div class="d-flex title justify-content-center">
                Medewerkers
            </div>
        </div>
        <div class="d-flex align-items-center p-2 ">

        </div>
    </div>

    <div class="container-bg1 action-bar d-flex justify-content-end mt-3 mb-3">
        <i class="icon" data-feather="user"></i>
        <a href="<?=ROOT?>/users/add">
            <button style="width: 200px" class="btn_add p-2"></i>Medewerker toevoegen</button>
        </a>
    </div>
    </div>

    <div class="container-bg">
        <div class="container-fluid p-4 shadow-sm" <!--style="width: 80%; margin-left: 280px-->">

        <table id="tabel" class="table table-striped">
            <thead>
            <tr>
                <th>Profiel foto</th>
                <th>Naam</th>
                <th>Telefoonnummer</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Datum</th>
                <th>Actie</th>
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
                        <td>
                                <?=$row->voornaam?><br><?=$row->achternaam?>

                        </td>
                        <td><?=$row->telefoonnummer?></td>
                        <td><?=$row->email?></td>
                        <td><?=$row->rol?></td>
                        <td><?=get_date($row->datum)?></td>
                        <td>

                            <a class="" href="<?=ROOT?>/users/edit/<?=$row->id?>">
                                <button class="buttonedit"><i class="icon-3" data-feather="edit"></i></button>
                            </a>

                            <a class="" href="<?=ROOT?>/users/delete/<?=$row->id?>">
                                <button class="buttondelete"><i class="icon-3" data-feather="trash"></i></button>
                            </a>

                        </td>
                    </tr>

                <?php endforeach;?>
            <?php else:?>
                <h4>No teams were found at this time</h4>
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