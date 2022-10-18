<?php
session_start();
class Auth 
{
    public static function authenticate($row)
    {
        $_SESSION['USER'] = $row;
        //echo $_SESSION['USER'];
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
        }
    }

    public static function logged_in()
    {
        if(isset($_SESSION['USER']))
        {
           return true;
        }
        return false;
    }

    public static function user()
    {
        if(isset($_SESSION['USER']))
        {
           return $_SESSION['USER']->firstname;
        }
        return false;
    }
}

