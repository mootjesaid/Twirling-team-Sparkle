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
                if (count($_FILES) > 0) {

//                    //we have an image
                    $allowed[] = "image/jpeg";
                    $allowed[] = "image/png";

                    if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
                        $folder = "uploads";
                        if (!file_exists($folder)) {
                            mkdir($folder);
                        }
                        $uniquesavename = time() . uniqid(rand());
                        $destination = $folder . "/" . $uniquesavename . '.jpg';;
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $_POST['image'] = $destination;

                    }

                }

                $user->insert($_POST);
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


