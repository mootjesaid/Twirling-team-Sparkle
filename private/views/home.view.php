<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>


<div class="container-bg action-bar d-flex justify-content-between" style="margin-top: 100px;">
    <div class="d-flex align-items-center p-2">
        <div class="icon-container d-flex align-items-center justify-content-center">
            <i class="icon2" data-feather="table"></i>
        </div>
        <div class="d-flex title justify-content-center">
            Lid Toevoegen
        </div>
    </div>
    <div class="d-flex align-items-center p-2 ">

    </div>
</div>

<div class="container-bg1 mt-4">

    <div class="d-flex justify-content-between">

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-4 text-red-600">
                    Aantal leden
                </div>
                <div class="aantal fs-3 text fw-bolder ">
                    <?php echo count($leden) ?>
                </div>
            </div>
        </div>

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-4 text-red-600">
                    Aantal teams
                </div>
                <div class="aantal fs-3 text fw-bolder ">
                    <?php echo count($teams) ?>
                </div>
            </div>
        </div>

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-4 text-red-600">
                    Aantal klanten
                </div>
                <div class="aantal fs-3 text fw-bolder ">
                    <?php echo count($klanten) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-bg1 d-flex content-between mt-4">

    <div class="chart me-4 align-items-center">
        <div class="title pt-4 d-flex align-items-center justify-content-center">
            Leden
        </div>
        <div class=" d-flex title align-items-center  justify-content-center">
            <canvas id="leden"></canvas>
        </div>
    </div>

    <div class="chart ms-4 align-items-center">
        <div class="title pt-4 d-flex align-items-center justify-content-center">
            Klanten
        </div>
        <div class=" d-flex title align-items-center  justify-content-center">
            <canvas id="klanten"></canvas>
        </div>
    </div>
</div>






<script>
    $(function () {/*from   w ww .  ja va2 s  . c o  m*/
        var ctx = document.getElementById("leden").getContext('2d');
        var data = {
            datasets: [{
                data: [<?= count($active) ?>, <?= count($inactive) ?>],
                backgroundColor: [
                    '#DEB900',
                    '#120D91',

                ],
            }],
            labels: [
                'Actieve leden',
                'Inactieve leden',
            ]
        };
        var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 20
                    }
                }
            }
        });
        var ctx_2 = document.getElementById("klanten").getContext('2d');
        var data_2 = {
            datasets: [{
                data: [<?= count($active_klanten) ?>, <?= count($inactive_klanten) ?>,],
                backgroundColor: [
                    '#312ADE',
                    '#E2CA4F',
                ],
            }],
            labels: [
                'Actieve klanten',
                'Inactieve klanten'
            ]
        };
        var myDoughnutChart_2 = new Chart(ctx_2, {
            type: 'doughnut',
            data: data_2,
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12
                    }
                }
            }
        });
    });

</script>





<?php $this->view('includes/footer')?>

