<?php
/**
 * main model
 */

class Model extends Database
{
    protected $table = "user";

    function __construct()
    {
        // code...
    }


    public function where($column,$value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        echo $query;
        return $this->query($query,[
            'value'=>$value
        ]);
    }



    public function findAll()
    {
        $query = "select * from $this->table ";
        return $this->query($query);
    }

}