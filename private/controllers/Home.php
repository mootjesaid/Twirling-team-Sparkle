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

        $active = $lid->where('actief', 'actief');
        $inactive = $lid->where('actief', 'inactief');

        $activeKlanten = $klant->where('actief', 'actief');
        $inactiveKlanten = $klant->where('actief', 'inactief');


        $this->view('home',[
            'inactive'=>$inactive,
            'active'=>$active,
            'inactive_klanten'=>$inactiveKlanten,
            'active_klanten'=>$activeKlanten,
            'leden'=>$aantalleden,
            'klanten'=>$aantalklanten,
            'teams'=>$aantalteams,
        ]);
    }


}


