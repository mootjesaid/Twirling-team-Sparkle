<?php
/**
 * leden controller
 */
class Beheer extends Controller
{

    public function index($team_id = null)
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $lid = new Lid();
        $team = new Team();

        $teams = $team->where('id', $team_id);

        $leden = $lid->findAll();

        $row = $lid->where('team_id', $team_id);

        $crumbs[] = ['Dashboard','home'];
        $crumbs[] = ['Leden','leden'];

        $this->view('beheer',[
            'crumbs'=>$crumbs,
            'rows'=>$row,
            'team'=>$teams,
            'leden'=>$leden
        ]);

    }

    public function overzicht($team_id = null)
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        $lid = new Lid();
        $team = new Team();

        $teams = $team->where('id', $team_id);
        $leden = $lid->where('team_id', 'NULL');


        $crumbs[] = ['Dashboard','home'];
        $crumbs[] = ['Leden','leden'];

        $this->view('beheer.overzicht',[
            'crumbs'=>$crumbs,
            'team'=>$teams,
            'rows'=>$leden,
        ]);

    }

    public function delete($id = null, $team_id = null )
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();
        $team = new Team();
        $team = $team->where('id', $team_id);
        $errors = array();
        if(count($_POST) > 0)
        {

            if($lid->validate($_POST))
            {
                $lid->update($id,$_POST);
                $this->redirect('teams');
            }else
            {
                //errors
                $errors = $lid->errors;
            }
        }
        $row = $lid->where('id', $id);

        $this->view('beheer.delete',[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }

    public function add($id = null, $team_id = null)
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();
        $team = new Team();


        $errors = array();
        if(count($_POST) > 0)
        {

            if($lid->validate($_POST))
            {
                $lid->update($id,$_POST);
                $this->redirect('teams');
            }else
            {
                //errors
                $errors = $lid->errors;
            }
        }
        $row = $lid->where('id', $id);
        $team = $team->where('id', $team_id);
        $this->view('beheer.add',[
            'row'=>$row,
            'errors'=>$errors,
            'team_id'=>$team,
        ]);
    }


}
