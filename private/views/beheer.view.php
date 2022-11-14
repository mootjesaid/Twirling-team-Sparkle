<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
        <div class="d-flex align-items-center p-2">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="table"></i>
            </div>
            <div class="d-flex title justify-content-center">

               <!-- --><?php /*foreach ($team as $obj)
                {
                    echo "Team ".$obj->naam;
                }*/?>
            </div>
        </div>
        <div class="d-flex align-items-center p-2 ">
            <?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>
        </div>
    </div>

    <div class="container-bg1 action-bar d-flex justify-content-end mt-3 mb-3">
        <i class="icon" data-feather="user"></i>
        <a href="<?=ROOT?>/teams/add">
            <button class="btn_add p-2"></i>Lid toevoegen</button>
        </a>
    </div>


    <div class="container-bg">
        <div class="container-fluid p-4 shadow-sm" <!--style="width: 80%; margin-left: 280px-->">

        <table id="tabel" class="table table-striped">
            <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Actie</th>
            </tr>
            </thead>
            <tbody>
            <?php if($rows):?>

                <?php foreach ($rows as $row):?>

                    <tr>
                        <td><?=$row->voornaam?></td>
                        <td><?=$row->achternaam?></td>
                        <td>
                            <a href="<?=ROOT?>/beheer/delete/<?=$row->id?>">
                                <input class="btn btn-danger float-end" type="submit" value="Delete"></button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach;?>
            <?php else:?>
                <h4>No Leden were found at this time</h4>
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