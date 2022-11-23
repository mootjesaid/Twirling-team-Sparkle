
<form id="deleteForm" method="post">

    <input autofocus class="my-2 form-control" value="NULL" type="text" name="team_id" placeholder="id">

    <input type="hidden" name="id">
    <input class="btn btn-danger float-end" type="submit" value="Verwijderen">


</form>

<script type="text/javascript">
    document.getElementById("deleteForm").style.display="none";
    document.getElementById("deleteForm").submit();
</script>


<?php $this->view('includes/footer');



