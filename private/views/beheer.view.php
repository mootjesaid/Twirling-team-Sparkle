<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
        <div class="d-flex align-items-center p-2">
            <div class="icon-container d-flex align-items-center justify-content-center">
                <i class="icon2" data-feather="table"></i>
            </div>
            <div class="d-flex title justify-content-center">

                <?php foreach ($team as $obj)
                {
                    echo "Team ".$obj->naam;
                }?>
            </div>
        </div>
        <div class="d-flex align-items-center p-2">
            <div  class="d-flex pt-3 justify-content-center">
                <ul class="breadcrumb">
                    <li><a href="<?=ROOT?>/home">Dashboard</a></li>
                    <li><a href="<?=ROOT?>/teams">Teams</a></li>
                    <li><?php foreach ($team as $obj)
                        {
                            echo "Team ".$obj->naam;
                        }?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-bg1 action-bar d-flex justify-content-end mt-3 mb-3">
        <i class="icon" data-feather="user"></i>
        <a class="" href="<?=ROOT?>/beheer/overzicht/<?php foreach ($team as $obj)
        {
            echo $obj->id;
        }?>">
            <button class="btn_add p-2"></i>Lid toevoegen</button>
        </a>
    </div>


    <div class="container-bg">
        <div class="container-fluid p-4 shadow-sm" <!--style="width: 80%; margin-left: 280px-->">

        <?php
        $succes = "";
        if(isset($_GET['succes'])){
            $succes = str_replace("_", " ", $_GET['succes']);
        }
        ?>

        <?php if($succes > 0):?>
            <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
                <?=$succes?>
            </div>
        <?php endif;?>

        <?php
        $delete = "";
        if(isset($_GET['delete'])){
            $delete = str_replace("_", " ", $_GET['delete']);
        }
        ?>

        <?php if($delete > 0):?>
            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                <?=$delete?>
            </div>
        <?php endif;?>



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
                <th>Status</th>
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
                        <td style="color: <?php if ($row->actief == 'actief'){
                            echo "#4BB543";
                        }else{
                            echo "red";
                        } ?>" ><?=$row->actief?></td>
                        <td>
                            <a class="" href="<?=ROOT?>/beheer/deletefrom/<?=$row->id?>/<?php foreach ($team as $obj)
                            {
                                echo $obj->id;
                            }?>"">
                                <button class="buttondelete"><i class="icon-3" data-feather="trash"></i></button>
                            </a>
                        </td>
                    </tr>

                <?php endforeach;?>
            <?php else:?>
            <div class="d-flex justify-content-center">
                <h4>Er zijn op dit moment geen leden in deze team </h4>

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