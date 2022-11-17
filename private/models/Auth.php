<?php

/**
 * Authentication class
 */
class Auth
{

    public static function authenticate($row)
    {
        // code...
        $_SESSION['USER'] = $row;
    }

    public static function logout()
    {
        // code...
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }

    public static function logged_in()
    {
        // code...
        if (isset($_SESSION['USER'])) {
            return true;
        }

        return false;
    }

    public static function user()
    {
        // code...
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER']->voornaam;
        }
        return false;
    }

    public static function __callStatic($method,$params)
    {
        $prop = strtolower(str_replace("get","",$method));

        if(isset($_SESSION['USER']->$prop))
        {
            return $_SESSION['USER']->$prop;
        }

        return 'Unknown';
    }

    public static function access($rank = 'medewerker')
    {
        // code...
        if(!isset($_SESSION['USER']))
        {
            return false;
        }

        $logged_in_rank = $_SESSION['USER']->rol;

        $ROL['admin'] 			= ['admin', 'medewerker'];
        $ROL['medewerker'] 		= ['medewerker'];


        if(!isset($ROL[$logged_in_rank]))
        {
            return false;
        }

        if(in_array($rank,$ROL[$logged_in_rank]))
        {
            return true;
        }

        return false;
    }
}