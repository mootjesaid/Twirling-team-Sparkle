<?php
/**
 * Klant model
 */
class Klant extends Model
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

    public  function validate($DATA)
    {
        $this->errors = array();
        //check voornaam
        if (empty($DATA['voornaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['voornaam']))

        {
            $this->errors['voornaam'] = "Voor naam mag alleen uit letters bestaan";
        }

        //check achternaam
        if (empty($DATA['achternaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['achternaam']))

        {
            $this->errors['achternaam'] = "Achter naam mag alleen uit letters bestaan";
        }

        //check email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Vul een geldig e-mail adres in";
        }

        //check if email exists
        if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = "Dit e-mail is niet beschikbaar ";
        }


        if (count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }

    public  function validate2($DATA)
    {
        $this->errors = array();
        //check voornaam
        if (empty($DATA['voornaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['voornaam']))

        {
            $this->errors['voornaam'] = "Voor naam mag alleen uit letters bestaan";
        }

        //check achternaam
        if (empty($DATA['achternaam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['achternaam']))

        {
            $this->errors['achternaam'] = "Achter naam mag alleen uit letters bestaan";
        }

        //check if number is submitted
        if (empty($DATA['telefoonnummer'])){
            $this->errors['telefoonnummer'] = "Vul je telefoonnummer in";
        }

        //check if number is only numbers
        if(!is_numeric($DATA['telefoonnummer'])){
            $this->errors['telefoonnummer'] = "Telefoonnummer mag alleen uit cijfers bestaan";
        }

        //check if number exist
        if($this->whereEmail('telefoonnummer',$DATA['telefoonnummer'], 'id', $DATA['id']))
        {
            $this->errors['telefoonnummer'] = "Dit telefoonnummer is niet beschikbaar ";
        }

        //check email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Vul een geldig e-mail adres in";
        }


        if($this->whereEmail('email',$DATA['email'], 'id', $DATA['id']))
        {
            $this->errors['email'] = "Dit e-mail is niet beschikbaar ";
        }


        if (count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
}