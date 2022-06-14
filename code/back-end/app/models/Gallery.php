<?php 

class Gallery extends DB{
    private $table = "gallery_pictures";
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

    public function insert($url)
    {
        $query = "INSERT INTO $this->table SET url=:url";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':url',$url);
        
        $stmt->execute();
        return $stmt;
    }
}