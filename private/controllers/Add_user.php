<?php
/**
 * add user controller
 */
class Add_user extends Controller
{

    function index()
    {
        $errors = array();
       if (count($_POST) > 0)
       {
            $user = new User();

            if ($user->validate($_POST))
            {
                $arr['voornaam'] = $_POST['voornaam'];
                $arr['achternaam'] = $_POST['achternaam'];
                $arr['rol'] = $_POST['rol'];
                $arr['email'] = $_POST['email'];
                $arr['telefoonnummer'] = $_POST['telefoonnummer'];
                $arr['wachtwoord'] = ($_POST['wachtwoord']);
                $arr['datum'] = date("Y-m-d H:i:s");

                $user->insert($arr);
                $this->redirect('login');
            }else
            {
                //errors
                $errors = $user->errors;
            }
       }

        $this->view('add_user',[
            'errors'=>$errors,
            ]);
    }
}


