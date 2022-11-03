<?php
/**
 * leden controller
 */
class Beheer extends Controller
{

    public function index($team_id = null)
    {
        //code..
        $lid = new Lid();
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
}
