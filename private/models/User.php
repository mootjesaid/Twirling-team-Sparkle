<?php
/**
 * Users model
 */
class User extends Model
{
    protected $allowedColumns = [
        'voornaam',
        'achternaam',
        'rol',
        'email',
        'image',
        'telefoonnummer',
        'wachtwoord',
        'datum',
    ];

    protected $beforeInsert = [
        'hash_wachtwoord'
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


        //check rol
        $rollen = ['admin','medewerker'];
        if(empty($DATA['rol']) || !in_array($DATA['rol'], $rollen))
        {
            $this->errors['rol'] = "Kies een rol";
        }

        //check wachtwoorden
        if (empty($row->wachtwoord)) {
            if (empty($_POST['wachtwoord']) || empty($DATA['wachtwoord']) || $DATA['wachtwoord'] != $DATA['wachtwoord2']) {
                $this->errors['wachtwoord'] = "Wachtwoorden komen niet overeen";
            }
        }

        //check wachtwoord lengte
        if (empty($row->wachtwoord)){

        }


        if (count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
    public function hash_wachtwoord($data)
    {
        $data['wachtwoord'] = password_hash($data['wachtwoord'], PASSWORD_DEFAULT);
        return $data;
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

        //check rol
        $rollen = ['admin','medewerker'];
        if(empty($DATA['rol']) || !in_array($DATA['rol'], $rollen))
        {
            $this->errors['rol'] = "Kies een rol";
        }


        if (count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
}