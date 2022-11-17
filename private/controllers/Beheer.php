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
        $lid = new User();
        $team = new Team();

        $team = $team->where('id', $team_id);


        $row = $lid->where('team_id', $team_id);

        $crumbs[] = ['Dashboard','home'];
        $crumbs[] = ['Leden','leden'];

        $this->view('beheer',[
            'crumbs'=>$crumbs,
            'rows'=>$row,
            'team'=>$team
        ]);

    }

    public function delete($id = null, $team_id = null )
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new User();
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

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Leden','teams'];
        $crumbs[] = ['Edit','teams/edit'];


        $row = $lid->where('id', $id);

        $this->view('beheer.delete',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs,
        ]);
    }
}
