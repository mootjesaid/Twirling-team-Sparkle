<?php $this->view('includes/head')?>

    <div class="container-fluid">

        <div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
            <img src="<?=ROOT?>/assets/Images/sparkle_twirling.png" class="d-block mx-auto rounded-circle" style="width:200px;">
            <h3>Add User</h3>
            <input class="my-2 form-control" type="firstname" name="firstname" placeholder="First Name" >
            <input class="my-2 form-control" type="lastname" name="lastname" placeholder="Last Name" >
            <select class="my-2 form-control">
                <option value="">Kies een rol...</option>
                <option value="medewerker">Medewerker</option>
                <option value="admin">Admin</option>

            </select>
            <input class="my-2 form-control" type="number" name="telnummer" placeholder="Telefoon nummer" >
            <input class="my-2 form-control" type="email" name="email" placeholder="Email" >
            <input class="my-2 form-control" type="text" name="password" placeholder="Wachtwoord">
            <input class="my-2 form-control" type="text" name="password2" placeholder="Herhaal wachtwoord">
            <br>
            <button class="btn btn-primary float-end">Add User</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>

