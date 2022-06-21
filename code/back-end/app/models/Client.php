<?php

class Client extends DB
{
    private $table = "client";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }
    public function getAllClients()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addClient($fullname, $number, $email, $password)
    {
        $query = "INSERT INTO $this->table SET fullName=:fullName,number=:number, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':fullName',$fullname);
        $stmt->bindParam(':number',$number);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);

        $stmt->execute();
        return $stmt;
    }

    public function getClient($email)
    {
        $query = "SELECT * FROM $this->table WHERE email=:email ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email',$email);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getClientByID($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=:id ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$id);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}