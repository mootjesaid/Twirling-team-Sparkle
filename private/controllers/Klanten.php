<?php
/**
 * klanten controller
 */
class Klanten extends Controller
{

    public function index()
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $klant = new Klant();

        $data = $klant->where('actief', 'ja');

        $this->view('klanten',[
            'rows'=>$data,
        ]);

    }

    public function inactive()
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $klant = new Klant();

        $data = $klant->where('actief', 'nee');

        $this->view('klanten.inactive',[
            'rows'=>$data,
        ]);

    }

    public function add()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $errors = array();
        if(count($_POST) > 0)
        {

            $klant = new Klant();
            if($klant->validate($_POST))
            {
                if (array_key_exists('image', $_POST)) {
                    $string = trim($_POST['image'], 'uploads');
                    $image = str_replace('/', '\\', $string);;
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/Twirling-team-Sparkle/public/uploads/'.$image;
                    $filename = realpath($path);
                    if (file_exists($filename)) {
                        unlink($filename);
                        echo 'File ' . $filename . ' is verwijderd';
                    } else {
                        echo $filename . ', afbeelding bestaat niet';
                    }
                }

                if(count($_FILES) > 0)
                {

                    //we have an image
                    $allowed[] = "image/jpeg";
                    $allowed[] = "image/png";

                    if($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed))
                    {
                        $folder = "uploads";
                        if(!file_exists($folder)){
                            mkdir($folder);
                        }
                        $uniquesavename = uniqid(rand());
                        $destination = $folder. "/" . $uniquesavename . '.jpg';;
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $_POST['image'] = $destination;

                    }

                }

                $_POST['datum'] = date("Y-m-d H:i:s");

                $klant->insert($_POST);
                $this->redirect('klanten');
            }else
            {
                //errors
                $errors = $klant->errors;
            }
        }

        $this->view('klanten.add',[
            'errors'=>$errors,
        ]);
    }

    public function edit($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $klant = new Klant();
        $errors = array();
        ;

        if(count($_POST) > 0)
        {

            if($klant->validate2($_POST))
            {

                if (array_key_exists('image', $_POST)) {
                    $string = trim($_POST['image'], 'uploads');
                    $image = str_replace('/', '\\', $string);;
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/Twirling-team-Sparkle/public/uploads/'.$image;
                    $filename = realpath($path);
                    if (file_exists($filename)) {
                        unlink($filename);
                        echo 'File ' . $filename . ' is verwijderd';
                    } else {
                        echo $filename . ', afbeelding bestaat niet';
                    }
                }

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
                $klant->update($id,$_POST);
                $this->redirect('klanten');
            }else
            {
                //errors
                $errors = $klant->errors;
            }
        }

        $row = $klant->where('id', $id);

        $this->view('klanten.edit',[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }

    public function delete($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $klant = new Klant();
        $errors = array();
        if(count($_POST) > 0)
        {

            if($klant->validate2($_POST))
            {
                $klant->update($id,$_POST);
                $this->redirect('leden');
            }else
            {
                //errors
                $errors = $klant->errors;
            }
        }

        $row = $klant->where('id', $id);

        $this->view('klanten.delete',[
            'row'=>$row,
            'errors'=>$errors,
        ]);

    }

}
