<?php

/**
 * Lid Model
 */
class Lid extends Model
{

    protected $allowedColumns = [
        'voornaam',
        'achternaam',
        'adres',
        'woonplaats',
        'image',
        'telefoonnummer',
        'email',
        'datum',
        'actief',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check voornaam
        if(empty($DATA['voornaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['voornaam']))
        {
            $this->errors['naam'] = "Voor naam mag alleen uit letters bestaan";
        }

        //check for achternaam
        if(empty($DATA['achternaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['achternaam']))
        {
            $this->errors['achternaam'] = "Achter naam mag alleen uit letters bestaan";
        }

        //check woonplaats
        if(empty($DATA['woonplaats']) || !preg_match('/^[a-zA-Z]+$/', $DATA['woonplaats']))
        {
            $this->errors['woonplaats'] = "Woonplaats mag alleen uit letters bestaan";
        }

        //check email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Vul een geldig e-mail adres in";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

}