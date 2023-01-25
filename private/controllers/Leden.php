<?php
/**
 * leden controller
 */
class Leden extends Controller
{

    public function index()
    {
        //code..
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $lid = new Lid();

        $data = $lid->where('actief', 'actief');

        $this->view('leden', [
            'rows' => $data,
        ]);

    }

    public function inactive()
    {
        //code..

        $lid = new Lid();

        $data = $lid->where('actief', 'inactief');

        $this->view('leden.inactive', [
            'rows' => $data,
        ]);


    }

    public function add()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0) {

            $leden = new Lid();
            if ($leden->validate($_POST)) {
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

                $_POST['datum'] = date("Y-m-d H:i:s");

                $future_timestamp = strtotime("+1 month");
                $_POST['eind_datum'] = date('Y-m-d H:i:s', $future_timestamp);


                $leden->insert($_POST);
                $this->redirect('leden?succes=' . $_POST['voornaam'] . '_' . $_POST['achternaam'] . '_is_toegevoegd');

            } else {
                //errors
                $errors = $leden->errors;
            }
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Leden', 'leden'];
        $crumbs[] = ['Add', ''];

        $this->view('leden.add', [
            'errors' => $errors,
            'crumbs' => $crumbs,
        ]);
    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $leden = new Lid();

        $errors = array();

        if (count($_POST) > 0) {

            if ($leden->validate2($_POST)) {
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

                $row = $leden->where('id', $id);

                if (array_key_exists('image', $_POST)) {
                    $string = trim($_POST['image'], 'uploads');
                    $file_name = $string;
                    $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
                    $uploadedFile =  $_FILES['image']['name'];
                    $file_delete =  "$base_dir/public/uploads/$file_name";



                    if (count($_FILES) > 0){
                        if (empty($uploadedFile)){

                        }
                        else{
                            unlink($file_delete);
                            addImage();
                        }
                    }

                }


                $leden->update($id, $_POST);
                $this->redirect('leden');
            } else {
                //errors
                $errors = $leden->errors;
            }
        }

        $row = $leden->where('id', $id);


        $this->view('leden.edit', [
            'row' => $row,
            'errors' => $errors,
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

            if($lid->validate2($_POST))
            {

                $_POST['eind_datum'] = date("Y-m-d H:i:s");
                $lid->update($id,$_POST);
                $this->redirect('leden?delete='.$_POST['voornaam'].'_'.$_POST['achternaam'].'_is_gedeactiveerd');
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

            if($lid->validate2($_POST))
            {

                $future_timestamp = strtotime("+1 month");
                $_POST['eind_datum'] = date('Y-m-d H:i:s', $future_timestamp);

                $lid->update($id,$_POST);
                $this->redirect('leden/inactive?succes='.$_POST['voornaam'].'_'.$_POST['achternaam'].'_is_geactiveerd');

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
