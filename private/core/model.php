<?php
/**
 * main model
 */

class Model extends Database
{
    public $errors = array();

    public function __construct()
    {
        if(!property_exists($this, 'table'))
        {
            $this->table = strtolower($this::class);
        }
    }

    public function whereEmail($column1,$value1,$column2, $value2)
    {

        $column1 = addslashes($column1);
        $column2 = addslashes($column2);
        $query = "select * from $this->table where $column1 = :value1 AND $column2 != :value2";
        $data = $this->query($query,[
            'value1'=>$value1,
            'value2'=>$value2
        ]);

        //run functions after select
        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }

        return $data;
    }

    public function where($column,$value)
    {

        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        $data = $this->query($query,[
            'value'=>$value
        ]);

        //run functions after select
        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }

        return $data;
    }

    public function whereNot($column,$value)
    {

        $column = addslashes($column);
        $query = "select * from $this->table where $column != :value";
        $data = $this->query($query,[
            'value'=>$value
        ]);

        //run functions after select
        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }

        return $data;
    }

    public function getName($column,$value)
    {

        $column = addslashes($column);
        $query = "select voornaam from $this->table where $column = :value";
        $data = $this->query($query,[
            'value'=>$value
        ]);

        //run functions after select
        if(is_array($data)){
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }

        return $data;
    }

    public function findAll()
    {
        $query = "select * from $this->table";
        $data = $this->query($query);

        return $data;

    }

    public function insert($data)
    {
        //remove unwanted columns
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }

        }

        //run functions before insert
        if(property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }
        }

        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table ($columns) values (:$values)";

        return $this->query($query,$data);
    }

    public function insertPasswordReset($data)
    {

            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }


        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into password_reset_temp ($columns) values (:$values)";

        return $this->query($query,$data);
    }


    public function update($id,$data)
    {
        $str = "";
        foreach ($data as $key => $value) {
            // code...
            $str .= $key. "=:". $key.",";
        }

        $str = trim($str,",");

        $data['id'] = $id;
        $query = "update $this->table set $str where id = :id";

        return $this->query($query,$data);
    }

    public function addToTeam($id, $team_id)
    {

        $data['id'] = $id;
        $data['team_id'] = $team_id;
        $query = "update $this->table set team_id = '$team_id' where id = :id";

        return $this->query($query,$data);
    }


    public function delete($id)
    {
        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }


}