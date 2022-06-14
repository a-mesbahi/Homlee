<?php 

class Admin extends DB 
{
    private $table = "products";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }

    public function login(){
        $query = "SELECT * FROM client WHERE is_admin = 1 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct()
    {
        $query = "INSERT INTO $this->table SET productName=:productName ,productPrice=:productPrice,productCategory=:productCategory  ";
    }
    
    public function deleteClient($id){
        $query = "DELETE FROM $this->table WHERE idClient = ?";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    } 

    public function updateClient($id,$prenom, $nom, $age, $profession)
    {
        $query = "UPDATE $this->table SET `nom`=':nom',`prenom`=':prenom',`age`=:age,`profession`=':profession' WHERE idClient = :id ";
        $stmt = $this->conn->prepare($query);


        $id = htmlspecialchars(strip_tags($id));
        $prenom = htmlspecialchars(strip_tags($prenom));
        $nom= htmlspecialchars(strip_tags($nom));
        $age = htmlspecialchars(strip_tags($age));
        $profession = htmlspecialchars(strip_tags($profession));
        
        $stmt->bindParam("id", $id);
        $stmt->bindParam("prenom", $prenom);
        $stmt->bindParam("nom", $nom);
        $stmt->bindParam("age", $age);
        $stmt->bindParam("profession", $profession);

        return $stmt->execute();

    }

    public function getAd()
    {
        $query = "SELECT * FROM ads ORDER BY id DESC LIMIT 3";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}