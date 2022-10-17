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


        $this->view('leden',['rows'=>$data]);
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

        $this->view('leden.add',[
            'errors'=>$errors,

        ]);
    }

}
