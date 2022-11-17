<?php

/**
 * logout controller
 */
class Logout extends Controller
{

    function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }
        // code...
        Auth::logout();
        $this->redirect('login');

    }
}