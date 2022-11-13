<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>

<h1 class="aaaa">--------------------This is the home page</h1>

<div class="container mt-4">

    <div class="d-flex justify-content-between">

        <div class="statusCardParent col-md-3 shadow-sm bg-body">
            <div class="statusCard p-4 text-left">
                <div class="fs-6 text-red-600">
                    Totale orders
                </div>
                <div class="fs-5 text fw-bolder ">
                    {{$orders}}
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

   <?php $this->view('includes/footer')?>

