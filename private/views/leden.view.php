<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
        <div class="d-flex align-items-center p-2">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="table"></i>
            </div>
            <div class="d-flex title justify-content-center">
                Leden
            </div>
        </div>
        <div class="d-flex align-items-center p-2 ">
            <?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>
        </div>
    </div>

    <div class="container-bg1 action-bar d-flex justify-content-end mt-3 mb-3">
            <i class="icon" data-feather="user"></i>
            <a href="<?=ROOT?>/leden/add">
                <button class="btn_add p-2"></i>Nieuwe lid</button>
            </a>
        </div>
    </div>

    <div class="container-bg">
        <div class="container-fluid p-4 shadow-sm" <!--style="width: 80%; margin-left: 280px-->">

            <div class="card-group">

                <table id="leden" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Adres</th>
                        <th>Woonplaats</th>
                        <th>Telefoonnummer</th>
                        <th>E-mail</th>
                        <th>Datum</th>
                        <th>Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($rows):?>

                        <?php foreach ($rows as $row):?>

                            <tr>
                                <td><?=$row->voornaam?></td>
                                <td><?=$row->achternaam?></td>
                                <td><?=$row->adres?></td>
                                <td><?=$row->woonplaats?></td>
                                <td><?=$row->telefoonnummer?></td>
                                <td><?=$row->email?></td>
                                <td><?=get_date($row->datum)?></td>
                                <td>
                                    <button class="btn-sm btn btn-info"><i>edit</i></button>
                                    <button class="btn-sm btn btn-danger"><i>delete</i></button>
                                </td>

                                <!-- <td>
                                <a href="<?/*=ROOT*/?>/schools/edit/<?/*=$row->id*/?>">
                                    <button class="btn-sm btn btn-info text-white"><i class="fa fa-edit"></i></button>
                                </a>

                                <a href="<?/*=ROOT*/?>/schools/delete/<?/*=$row->id*/?>">
                                    <button class="btn-sm btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                </a>

                                <a href="<?/*=ROOT*/?>/switch_school/<?/*=$row->id*/?>">
                                    <button class="btn-sm btn btn-success">Switch to<i class="fa fa-chevron-right"></i></button>
                                </a>


                            </td>-->

                            </tr>

                        <?php endforeach;?>
                    <?php else:?>
                        <h4>No schools were found at this time</h4>
                    <?php endif;?>

                    </tbody>

                </table>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
                <script src="<?=ROOT?>/assets/app.js"></script>        </div>

        </div>
    </div>

<?php $this->view('includes/footer')?>