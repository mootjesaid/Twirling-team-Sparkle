<?php
/**
 * login controller
 */
class Login extends Controller
{

    function index()
    {
        if(Auth::logged_in())
        {
            $this->redirect('home');
        }
        $errors = array();

        if(count($_POST) >0)
        {
            $user = new User();
            if($row = $user->where('email',$_POST['email']))
            {
                $row = $row[0];
                //$Auth->authenticate($row);
                //echo $row->wachtwoord . ".....". sha1($_POST['password']);
                if(sha1($_POST['password']) ==  $row->wachtwoord)
                {
                    //Auth::authenticate($row);
                    Auth::authenticate($row);
                    $this->redirect('/home');
                }
                
            }else{
                $errors["email"] = "fout email of password";
            }
        }
        // code...
        $this->view('login',['errors' =>$errors]);
    }
}


