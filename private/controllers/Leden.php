<?php
/**
 * leden controller
 */
class Leden extends Controller
{

    public function index()
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();

        $data = $lid->where('actief', 'ja');

        $this->view('leden',[
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

        $lid = new Lid();

        $data = $lid->where('actief', 'nee');

        $this->view('leden.inactive',[
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

            $leden = new Lid();
            if($leden->validate($_POST))
            {
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

                $_POST['datum'] = date("Y-m-d H:i:s");

                $leden->insert($_POST);
                $this->redirect('leden');
            }else
            {
                //errors
                $errors = $leden->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','leden'];
        $crumbs[] = ['Add',''];

        $this->view('leden.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

    public function edit($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $leden = new Lid();
        $errors = array();
  ;

        if(count($_POST) > 0)
        {

            if($leden->validate2($_POST))
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
               $leden->update($id,$_POST);
                //$this->redirect('leden');
            }else
            {
                //errors
                $errors = $leden->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','leden'];
        $crumbs[] = ['Edit','leden/edit'];


        $row = $leden->where('id', $id);

        $this->view('leden.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

    public function delete($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();
        $errors = array();
        if(count($_POST) > 0)
        {

            if($lid->validate($_POST))
            {
                $lid->update($id,$_POST);
                $this->redirect('leden');
            }else
            {
                //errors
                $errors = $lid->errors;
            }
        }

        $row = $lid->where('id', $id);

        $this->view('leden.delete',[
            'row'=>$row,
            'errors'=>$errors,
        ]);

    }

    public function activate($id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();
        $errors = array();
        if(count($_POST) > 0)
        {

            if($lid->validate($_POST))
            {
                $lid->update($id,$_POST);
                $this->redirect('leden/inactive');
            }else
            {
                //errors
                $errors = $lid->errors;
            }
        }

        $row = $lid->where('id', $id);

        $this->view('leden.activate',[
            'row'=>$row,
            'errors'=>$errors,
        ]);

    }


}
