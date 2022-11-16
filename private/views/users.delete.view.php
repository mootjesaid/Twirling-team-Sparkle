
    <div class="shadow-sm" style="margin-top: 50px">
            <div class="container-bg  ">

                <form id="deleteForm" method="post">
                        <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?> <?=get_var('voornaam',$row[0]->achternaam) ?>" type="text" name="voornaam" placeholder="Voor naam">

                        <input class="btn btn-danger float-end" type="submit" value="Verwijderen">
                </form>
            </div>
    </div>

    <script type="text/javascript">
        document.getElementById("deleteForm").style.display="none";
        document.getElementById("deleteForm").submit();
    </script>

<?php $this->view('includes/footer');



