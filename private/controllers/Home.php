<?php
/**
 * home controller
 */
class Home extends Controller
{

    function index()
    {
       //code..
        $user = $this->load_model('User');

        $data = $user->findAll();

        //$data = $user->where('email', 'janvdboer@hotmail.com');

        $this->view('home',['rows'=>$data]);
    }
}


