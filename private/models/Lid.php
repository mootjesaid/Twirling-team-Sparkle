<?php

/**
 * Lid Model
 */
class Lid extends Model
{

    protected $allowedColumns = [
        'naam',
        'adres',
        'woonplaats',
        'foto',
        'telefoonnummer',
        'email',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check for name
        if(empty($DATA['naam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['naam']))
        {
            $this->errors['naam'] = "Naam mag alleen uit letters bestaan";
        }

        if(empty($DATA['woonplaats']) || !preg_match('/^[a-zA-Z]+$/', $DATA['woonplaats']))
        {
            $this->errors['woonplaats'] = "Woonplaats mag alleen uit letters bestaan";
        }

        //check for email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "dit e-mail is niet geldig";
        }

        //check if email exists
        if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = "Dit e-mail adress word gebruikt ";
        }



        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

}