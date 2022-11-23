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
        $klant = new Klant();
        $team = new Team();

        $aantalleden = $lid->findAll();
        $aantalklanten = $klant->findAll();
        $aantalteams = $team->findAll();

        $active = $lid->where('actief', 'ja');
        $inactive = $lid->where('actief', 'nee');

        $activeKlanten = $klant->where('actief', 'ja');
        $inactiveKlanten = $klant->where('actief', 'nee');


        $this->view('home',[
            'inactive'=>$inactive,
            'active'=>$active,
            'inactive_klanten'=>$inactiveKlanten,
            'active_klanten'=>$aantalklanten,
            'leden'=>$aantalleden,
            'klanten'=>$aantalklanten,
            'teams'=>$aantalteams,
        ]);
    }


}


