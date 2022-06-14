<?php 

class Professional extends DB{
    private $table = "professional";
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

    public function insert($business_name, $professional_category, $phone_number, $name, $address ,$business_site,$email ,$password,$business_img)
    {
        $query = "INSERT INTO $this->table SET business_name=?,professional_category=?, phone_number=?,name=?,address=?,email=?,business_site = ?, password=? , business_img = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($business_name,$professional_category,$phone_number,$name,$address,$email,$business_site,$password,$business_img));
        
        return $this->conn->lastInsertId();
    }
    public function getProfessional($email)
    {
        $query = "SELECT * FROM $this->table WHERE email=:email ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email',$email);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function single($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$business_name,$professional_category,$phone_number,$name,$address,$business_site,$email)
    {
        $query = "UPDATE $this->table SET business_name=?,professional_category=?,phone_number=?,name=?,address=?,business_site=?,email=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($business_name,$professional_category,$phone_number,$name,$address,$business_site,$email,$id));
        return $stmt;
    }

    public function changePassword($password,$id)
    {
        $query = "UPDATE $this->table SET `password`=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($password,$id));
        return $stmt;
    }
}