<?php
/**
 * leden controller
 */
class Leden extends Controller
{

    public function index()
    {
        //code..
        $lid = new Lid();

        $data = $lid->findAll();

        $crumbs[] = ['Dashboard','home'];
        $crumbs[] = ['Leden','leden'];

        $this->view('leden',[
            'crumbs'=>$crumbs,
            'rows'=>$data
        ]);

    }




    public function add()
    {

        $errors = array();
        if(count($_POST) > 0)
        {

            $leden = new Lid();
            if($leden->validate($_POST))
            {

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
        $leden = new Lid();
        $errors = array();
  ;

        if(count($_POST) > 0)
        {

            if($leden->validate($_POST))
            {

                // delete works just have to update
                $path = $_SERVER['DOCUMENT_ROOT'] . "/Twirling-team-Sparkle/public/uploads";
//                $string = $_POST['image'];
//                $imagename = str_replace('/', '\\', $string);
//                $filename = getcwd(). "\\".$imagename;
                //$filename =  $path . "/" . trim($imagename,'uploads/');; // build the full path here
                $path = $_SERVER['DOCUMENT_ROOT'] . '/Twirling-team-Sparkle/public/uploads/166847296512234163596372e0852de36.jpg';
                $filename = realpath($path);
                if (array_key_exists('image', $_POST)) {
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/Twirling-team-Sparkle/public/uploads/166847296512234163596372e0852de36.jpg';
                    $filename = realpath($path);
                    if (file_exists($filename)) {
                        unlink($filename);
                        echo 'File ' . $filename . ' has been deleted';
                    } else {
                        echo 'Could not delete ' . $filename . ', file does not exist';
                    }
                }else{
                    echo $path;
                }

//                $deleteImage =  getcwd() . '\uploads\1668469845997947096372d45556950.jpg';
//
//                unlink($deleteImage);
//                //check for files
                if(count($_FILES) > 0)
                {

                    //we have an image
//                    $allowed[] = "image/jpeg";
//                    $allowed[] = "image/png";
//
//                    if($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed))
//                    {
//                        $folder = "uploads";
//                        if(!file_exists($folder)){
//                            mkdir($folder);
//                        }
//                        $uniquesavename = time().uniqid(rand());
//                        $destination = $folder. "/" . $uniquesavename . '.jpg';;
//                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
//                        $_POST['image'] = $destination;
//
//                    }

                }
//               $leden->update($id,$_POST);
                ///$this->redirect('leden');
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
        $leden = new Lid();
        $errors = array();
        if(count($_POST) > 0)
        {
            $leden->delete($id);
            $this->redirect('leden');
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','leden'];
        $crumbs[] = ['Delete','leden/delete'];


        $row = $leden->where('id', $id);

        $this->view('leden.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }


}
