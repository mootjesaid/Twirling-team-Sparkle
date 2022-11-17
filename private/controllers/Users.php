<?php



/**
 * leden controller
 */
class Users extends Controller
{

    public function index()
    {
        //code..
        if(!Auth::admin())
        {
            $this->redirect('404');
        }

        $user = new User();

        $data = $user->findAll();

        if(Auth::access('admin')){

            $this->view('users',[
                'row' => $data,
            ]);
        }else{
            $this->view('403');
        }

    }

    public function add()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $errors = array();
        if(count($_POST) > 0 && Auth::access('admin'))
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

        if(Auth::access('admin')){

            $this->view('users.add',[
                'errors' => $errors,
            ]);
        }else{
            $this->view('403');
        }
    }

    public function edit($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $user = new User();
        $errors = array();

        if (count($_POST) > 0 && Auth::access('admin')) {

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

                if (count($_FILES) > 0 ) {

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

        if(Auth::access('admin')){

            $this->view('users.edit',[
                'row' => $row,
                'errors' => $errors,
            ]);
        }else{
            $this->view('403');
        }

    }

    public function delete($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $user = new User();
        $errors = array();
        if (count($_POST) > 0 && Auth::access('admin')) {
            $user->delete($id);
            $this->redirect('users');
        }

        $row = $user->where('id', $id);

        if(Auth::access('admin')){

            $this->view('users.delete',[
                'row'=>$row,
            ]);
        }else{
            $this->view('403');
        }

    }


}

