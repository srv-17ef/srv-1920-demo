<?php
require_once "Database.php";

class Person extends Database
{
    protected $name, $id, $age;


    public function __construct(string $name = null)
    {
        parent::__construct();
        $this->table = "persons";
        $this->name = $name ?? null;
        array_push($this->fillable,"name","age");
    }

    public function find(int $id)
    {
        $tmp = parent::find($id);
        $this->id = $tmp->id;
        $this->name = $tmp->name;
    }

    public function save()
    {
        if ($this->id) {
            $params = ["id"=>$this->id, "name" => $this->name, "age"=>$this->age];
            $sql = "update persons set name=:name, age=:age where id=:id";
            return $this->runQuery($sql, $params);
        } else {
            $params = ["name" => $this->name, "age"=>$this->age];
            $sql = "insert into persons values(null,:name,:age)";
            $this->runQuery($sql, $params);
            $this->id = $this->fetchLastInsertedId()->id;
            return true;
        }

    }

}