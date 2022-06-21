<?php 

class Gallery extends DB{
    private $table = "gallery";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }


    public function get()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function three()
    {
        $query = "SELECT * FROM $this->table ORDER by id DESC LIMIT 3";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function insert($title,$url,$description)
    {
        $query = "INSERT INTO $this->table SET `url`=:url,`description` =:description, `title`= :title";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':url',$url);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':title',$title);
        
        $stmt->execute();
        return $stmt;
    }
} 