<?php
/**
 * add user controller
 */
class Add_user extends Controller
{

    function index()
    {
        // code...\
        $errors =array();
        if(count($_POST) >0)
        {
            $user = new User();
            if($user->validate($_POST))
            {
                $arr['firstname'] = $_POST['firstname'];
                $arr['lastname'] = $_POST['lastname'];
                $arr['nummer'] = $_POST['telnummer'];
                $arr['email'] = $_POST['email'];
                $arr['wachtwoord'] = sha1($_POST['password']);
                $arr['rol'] = $_POST['rol'];
                $arr['datum'] = date("Y-m-d H:i:s");

                $user->insert($arr);
                $this->redirect('login');

            }else{
                $errors = $user->errors;
            }

        }
        //print_r($_POST);
        $this->view('add_user',['errors' =>$errors]);
    }
}


