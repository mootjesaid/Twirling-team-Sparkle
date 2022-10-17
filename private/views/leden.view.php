<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <h1>--------------------This is the leden page</h1>

    <div class="container-fluid p-4 shadow " style="width: 1600px; margin-left: 285px">
        <?php $this->view('includes/crumbs')?>

        <div class="card-group">

            <table id="leden" class="table table-striped" style="width:117.5%">
                <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Adres</th>
                    <th>Woonplaats</th>
                    <th>Telefoonnummer</th>
                    <th>E-mail</th>
                    <th>Datum</th>
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
                            <td><?=$row->datum?></td>
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
<?php $this->view('includes/footer')?>