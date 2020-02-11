<?php


class Database
{
    protected $db;
//    protected $db_path = __DIR__ . "\\" . "oop-db.sqlite";
    protected $table = "";
    protected $fillable = [];
//    public $name, $age;

    public function __construct()
    {
        $dsn = "sqlite:" . __DIR__ . "\\" . "oop-db.sqlite";
        try {
            $this->db = new PDO($dsn);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) { // fånga upp fel och skriv ut
            echo $e->errorInfo;
            exit();
        }
    }

    // köra sql
    public function executeQuery(string $sql, array $data)
    {
        $prepared = $this->db->prepare($sql);
        foreach ($data as $key=>$value){
            $prepared->bindValue($key,$value);
        }
        var_dump($prepared->execute());
        var_dump($prepared->fetch());
        return false;
    }

    // fetcha
    public function getOne(int $id)
    {
        $sql = "select * from persons where id=:id";
        $prepared = $this->db->prepare($sql);
        $prepared->bindValue("id",$id);
        var_dump($prepared->execute());
        var_dump($prepared->fetch());
        return false;
    }
    // fetcha fler

    // enklare och snyggare hämta

    // lägga till
    public function save()
    {
        $sql = "insert into persons values(null, :name, :age)";
        $data = ["name"=>$this->name,"age"=>$this->age];
        $this->executeQuery($sql,$data);
    }

    // uppdatera

    // ta bort
    public function homicide(int $id)
    {
        $sql = "delete from persons where id=:id";
        $data = ["id"=>$id];
        $this->executeQuery($sql,$data);
    }
    // getters

    // setter

    public function runQuery(string $query, array $params = [])
    {
        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        return $stmt->execute();
    }

    /**
     * Hämta enskild rad data
     * @param string $query
     * @param array $params
     * @return mixed result assoc array
     */
    public function fetch(string $query, array $params = [])
    {
        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        return $stmt->fetch();
    }

    public function fetchAll(string $query, array $params = [])
    {
        $stmt = $this->db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find(int $id)
    {
        $sql = "select * from $this->table where id=:id";
        $params = ["id"=>$id];
        return $this->fetch($sql,$params);
    }

    public function __get($property)
    {
        if(property_exists ( $this , $property )){
            return $this->$property;
        }
        return false;
    }

    public function __set($property, $value)
    {
        if( in_array($property,$this->fillable)){
            $this->$property = $value;
        }
    }

    protected function fetchLastInsertedId()
    {
        $sql = "select MAX(id) as id from $this->table";
        return $this->fetch($sql);
    }
}