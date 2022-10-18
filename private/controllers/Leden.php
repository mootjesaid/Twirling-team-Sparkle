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
        $crumbs[] = ['Add','leden/add'];

        $this->view('leden.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

}
