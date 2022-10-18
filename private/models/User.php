<?php
/**
 * User model
 */
class User extends Model
{
    //protected $table = "users";
    public function validate($DATA)
    {
        $this->errors = array();
        //check password
        if($DATA['password'] != $DATA['password2'] || empty($DATA['password'] ))
        {
            $this->errors[] = "De wachtwoord is niet klopt";
        }

        if(empty($DATA['firstname']))
        {
            $this->errors[] = "De First Name Kan niet empty zijn ";
        }

        if(empty($DATA['lastname']))
        {
            $this->errors[] = "De last name Kan niet empty zijn ";
        }
        if(empty($DATA['rol']))
        {
            $this->errors[] = "Select een rol ";
        }

        if(empty($DATA['telnummer']))
        {
            $this->errors[] = "Voer een telefoon nummer in ";
        }
        
        if(empty($DATA['email']))
        {
            $this->errors[] = " voer een email in ";
        }
        if(count($this->errors)==0)
        {
            return true;
        }
        return false;
    }

}//