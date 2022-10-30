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
        if(count($_POST) > 0)
        {

            if($leden->validate($_POST))
            {
                $leden->update($id,$_POST);
                $this->redirect('leden');
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
