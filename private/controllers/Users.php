<?php



/**
 * leden controller
 */
class Users extends Controller
{

    public function index()
    {
        //code..
        $user = new User();

        $data = $user->findAll();


        $this->view('users', [
            'rows' => $data
        ]);

    }

    public function add()
    {

        $errors = array();
        if(count($_POST) > 0)
        {

            $user = new User();
            if($user->validate($_POST))
            {
                if(count($_FILES) > 0)
                {

//                    //we have an image
                    $allowed[] = "image/jpeg";
                    $allowed[] = "image/png";

                    if($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed))
                    {
                        $folder = "uploads";
                        if(!file_exists($folder)){
                            mkdir($folder);
                        }
                        $uniquesavename = time().uniqid(rand());
                        $destination = $folder. "/" . $uniquesavename . '.jpg';;
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $_POST['image'] = $destination;

                    }

                }

                $_POST['datum'] = date("Y-m-d H:i:s");

                $user->insert($_POST);
                $this->redirect('users');
            }else
            {
                //errors
                $errors = $user->errors;
            }
        }

        $this->view('users.add',[
            'errors'=>$errors,
        ]);
    }

    public function edit($id = null)
    {
        $user = new User();
        $errors = array();

        if (count($_POST) > 0) {

            if ($user->validate2($_POST)) {

                if (array_key_exists('image', $_POST)) {
                    $string = trim($_POST['image'], 'uploads');
                    $image = str_replace('/', '\\', $string);;
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/Twirling-team-Sparkle/public/uploads/' . $image;
                    $filename = realpath($path);
                    if (file_exists($filename)) {
                        unlink($filename);
                        echo 'File ' . $filename . ' is verwijderd';
                    } else {
                        echo $filename . ', afbeelding bestaat niet';
                    }
                }

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
                $user->update($id, $_POST);
                $this->redirect('users');
            } else {
                //errors
                $errors = $user->errors;
            }
        }

        $row = $user->where('id', $id);

        $this->view('users.edit', [
            'row' => $row,
            'errors' => $errors,
        ]);
    }

    public function delete($id = null)
    {
        $user = new User();
        $errors = array();
        if (count($_POST) > 0) {
            $user->delete($id);
            $this->redirect('medewerkers');
        }

        $row = $user->where('id', $id);

        $this->view('medewerkers.delete', [
            'row' => $row,
        ]);
    }


}

