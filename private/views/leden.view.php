<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

    <h1>--------------------This is the leden page</h1>

    <div class="container-fluid p-4 shadow mx-auto" style="width: 1000px;">
        <?php $this->view('includes/crumbs')?>

        <div class="card-group justify-content-center">

            <?php if($rows):?>
                <?php foreach ($rows as $row):?>

                <?php $this->view('includes/leden_tabel')?>

            <?php endforeach;?>
            <?php else:?>
                <h4>Geen leden gevonden</h4>
            <?php endif;?>
        </div>

    </div>
<?php $this->view('includes/footer')?>