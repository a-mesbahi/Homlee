<?php 



class Orders extends DB 
{
    private $table = "orders";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
        
    }

    public function get()
    {
        $query = "SELECT client.*, products.*,orders.* FROM orders JOIN client ON orders.client_id = client.id JOIN products ON orders.product_id= products.id WHERE completed = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function complate($id)
    {
        $query = "UPDATE $this->table SET `completed`=1 WHERE `id`=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function add($product_id,$client_id,$address,$Card_name,$quantity)
    {   
        $query = "INSERT INTO $this->table (`product_id`,`client_id`,`address`,`Card_name`,`quantity`) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $product_id,
            $client_id,
            $address,
            $Card_name,
            $quantity,
        ]);
        return $stmt;
    }


}