
<form id="deleteForm" method="post">
    <input autofocus class="my-2 form-control" value="NULL" type="text" name="team_id">
    <input autofocus class="my-2 form-control" value="<?=get_var('voornaam',$row[0]->voornaam)?>" type="text" name="voornaam" placeholder="Voor naam">
    <input autofocus class="my-2 form-control" value="<?=get_var('achternaam',$row[0]->achternaam)?>" type="text" name="achternaam" placeholder="Achter naam">
    <input autofocus class="my-2 form-control"  value="<?=get_var('adres', $row[0]->adres)?>" type="text" name="adres" placeholder="adres" >
    <input autofocus class="my-2 form-control" value="<?=get_var('woonplaats', $row[0]->woonplaats)?>" type="text" name="woonplaats" placeholder="Woonplaats" >
    <input autofocus class="my-2 form-control" type="number" value="<?=get_var('telefoonnummer', $row[0]->telefoonnummer)?>" name="telefoonnummer" placeholder="Telefoonnummer" >
    <input autofocus class="my-2 form-control" type="email" value="<?=get_var('email', $row[0]->email)?>" name="email" placeholder="Email">

    <button class="btn btn-primary float-end">Opslaan</button>
</form>

<script type="text/javascript">
    document.getElementById("deleteForm").style.display="none";
    document.getElementById("deleteForm").submit();
</script>




