<?php
/**
 * leden controller
 */
class Leden extends Controller
{

    function index()
    {
        //code..
        $lid = new Lid();

        $data = $lid->findAll();




        $this->view('leden',['rows'=>$data]);
    }
}
