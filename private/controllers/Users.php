<?php
/**
 * leden controller
 */
class Users extends Controller
{

    public function index()
    {
        //code..
        $user = new User();

        $data = $user->findAll();


        $this->view('home', [
            'rows' => $data
        ]);

    }

}
