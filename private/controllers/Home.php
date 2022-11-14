<?php
/**
 * home controller
 */
class Home extends Controller
{

    function index()
    {
        //code..
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $lid = new Lid();

        $active = $lid->where('actief', 'ja');
        $inactive = $lid->where('actief', 'nee');


        $this->view('home',[
            'inactive'=>$inactive,
            'active'=>$active,
        ]);
    }


}


