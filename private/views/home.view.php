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

<div class="container-bg1 mt-3">

    <div class="d-flex justify-content-between">

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-6 text-red-600">
                    Succesvolle leveringen
                </div>
                <div class="fs-5 text fw-bolder ">
                    {{$designated}}
                </div>
            </div>
        </div>

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-6 text-red-600">
                    Succesvolle leveringen
                </div>
                <div class="fs-5 text fw-bolder ">
                    {{$designated}}
                </div>
            </div>
        </div>

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-6 text-red-600">
                    Aantal artikelen
                </div>
                <div class="fs-5 text fw-bolder ">
                    {{$products}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-bg1 d-flex justify-content-between mt-3">
    <div class="align-items-center p-2">
        <div class="title d-flex align-items-center justify-content-center">
            Klanten
        </div>
        <div class="chart d-flex title justify-content-center">
            <canvas id="leden"></canvas>
        </div>
    </div>
    <div class="align-items-center p-2 ">
        <div class="title d-flex align-items-center justify-content-center">
            Klanten
        </div>
        <div class="chart d-flex title justify-content-center">

            <canvas id="klanten"></canvas>
        </div>
    </div>
</div>

<div class="container-bg1 mt-3 d-flex justify-content-between">
    <div class="container-chart">

    </div>

</div>





<script>
    $(function () {/*from   w ww .  ja va2 s  . c o  m*/
        var ctx = document.getElementById("leden").getContext('2d');
        var data = {
            datasets: [{
                data: [10, 20],
                backgroundColor: [
                    '#3c8dbc',
                    '#f56954',

                ],
            }],
            labels: [
                'Request',
                'Layanan',
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
                data: [10, 20, 30],
                backgroundColor: [
                    '#f56954',
                    '#f39c12',
                ],
            }],
            labels: [
                'Layanan',
                'Problem'
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

