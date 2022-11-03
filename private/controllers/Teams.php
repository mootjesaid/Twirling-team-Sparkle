<?php
/**
 * leden controller
 */
class Teams extends Controller
{

    public function index()
    {
        //code..
        $team = new Team();

        $data = $team->findAll();

        $crumbs[] = ['Dashboard','home'];
        $crumbs[] = ['Leden','leden'];

        $this->view('teams',[
            'crumbs'=>$crumbs,
            'rows'=>$data
        ]);
    }

    public function deleteFromTeam($id = null)
    {
        $leden = new Lid();
        $errors = array();
        if(count($_POST) > 0)
        {

            if($leden->validate($_POST))
            {
                $leden->update($id,$_POST);
                $this->redirect('');
            }else
            {
                //errors
                $errors = $leden->errors;
            }
        }

        $row = $leden->where('id', $id);

        $this->view('beheer',[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }



    public function add()
    {

        $errors = array();
        if(count($_POST) > 0)
        {

            $teams = new Team();
            if($teams->validate($_POST))
            {

                $_POST['datum'] = date("Y-m-d H:i:s");

                $teams->insert($_POST);
                $this->redirect('teams');
            }else
            {
                //errors
                $errors = $teams->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','teams'];
        $crumbs[] = ['Add',''];

        $this->view('teams.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

    public function edit($id = null)
    {
        $teams = new Team();
        $errors = array();
        if(count($_POST) > 0)
        {

            if($teams->validate($_POST))
            {
                $teams->update($id,$_POST);
                $this->redirect('teams');
            }else
            {
                //errors
                $errors = $teams->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','teams'];
        $crumbs[] = ['Edit','teams/edit'];


        $row = $teams->where('id', $id);

        $this->view('teams.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }

    public function delete($id = null)
    {
        $teams = new Team();
        $errors = array();
        if(count($_POST) > 0)
        {
            $teams->delete($id);
            $this->redirect('teams');
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','teams'];
        $crumbs[] = ['Delete','teams/delete'];


        $row = $teams->where('id', $id);

        $this->view('teams.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }
}
