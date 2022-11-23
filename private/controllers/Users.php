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
        $crumbs[] = ['Home','home'];
        $crumbs[] = ['Users','users'];

        if(Auth::access('admin')){

            $this->view('users',[
                'crumbs'=>$crumbs,
                'rows' => $data,
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
                $this->redirect('users?succes='.$_POST['voornaam'].'_'.$_POST['achternaam'].'_is_toegevoegd');

            }else
            {
                //errors
                $errors = $user->errors;
            }
        }

        $crumbs[] = ['Home','home'];
        $crumbs[] = ['Users','users'];
        $crumbs[] = ['Toevoegen','users/add'];


        if(Auth::access('admin')){

            $this->view('users.add',[
                'crumbs'=>$crumbs,
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
//                echo $string = trim('16691291051072302474637ce391428d6.jpg', 'uploads');
//                echo "<br>";
//                echo $image = str_replace('/', '\\', $string);
//                echo "<br>";
//                 $path = realpath($_SERVER["DOCUMENT_ROOT"]);
//                echo $path2 = str_replace('/', '\\', $path);
//                echo "<br>";
//                echo unlink($path2);

                //goed
//                $string = trim('1669063827482035525637be49366724.jpg', 'uploads');
//                $file_name = $string;
//                $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
//                $file_delete =  "$base_dir/public/uploads/$file_name";
//                unlink($file_delete);
                // if (file_exists($file_delete)) {unlink($file_delete);}

                /*echo $string = trim($_POST['image'], 'uploads');
                echo '<br>';
                echo $file_name = $string;
                echo '<br>';
                echo $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
                echo '<br>';
                echo $file_delete =  "$base_dir/public/uploads/$file_name";
                echo '<br>';
                echo unlink($file_delete);*/

                if (array_key_exists('image', $_POST)) {
                    $string = trim($_POST['image'], 'uploads');
                    $file_name = $string;
                    $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
                    $file_delete =  "$base_dir/public/uploads/$file_name";

                    if (file_exists($file_delete)) {
                        unlink($file_delete);
                        addImage();
                    } elseif (count($_FILES) > 0 ) {
                        addImage();

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
            $this->redirect('users?delete='.$_POST['voornaam'].'_'.$_POST['achternaam'].'_is_verwijderd');

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