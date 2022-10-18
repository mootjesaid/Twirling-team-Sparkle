<?php
/**
 * home controller
 */
class Home extends Controller
{

    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        //echo Auth::logged_in();
        
        //code..
        $user = new User();

//        $user->insert($arr);
//        $user->update(4,$arr);
//        $user->delete(5);

        $data = $user->findAll();

        $this->view('home',['rows'=>$data]);
    }
}


