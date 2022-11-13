
<form id="deleteForm" method="post">

    <input autofocus class="my-2 form-control" value="<?=get_var('naam',$row[0]->naam)?>" type="text" name="naam" placeholder="naam">

    <input type="hidden" name="id">
    <input class="btn btn-danger float-end" type="submit" value="Verwijderen">


</form>

<script type="text/javascript">
    document.getElementById("deleteForm").style.display="none";
    document.getElementById("deleteForm").submit();
</script>


<?php $this->view('includes/footer');



