<?php


/**
 * Lid Model
 */
class Team extends Model
{

    protected $allowedColumns = [
        'naam',

    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check naam
        if (empty($DATA['naam']) || !preg_match('/^[a-zA-Z]+$/', $DATA['naam'])) {
            $this->errors['naam'] = "Voor naam mag alleen uit letters bestaan";
        }


        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

}