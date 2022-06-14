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
        $query = "SELECT orders.*,client.*, products.* FROM orders JOIN client ON orders.client_id = client.id JOIN products ON orders.product_id= products.id WHERE completed = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }






}