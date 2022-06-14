<?php 

class Projects extends DB{
    private $table = "project";
    private $conn; 

    public function __construct()
    {
        $this->conn = $this->connect();
    }


    public function insert($idProfessional,$title,$description,$tags,$img,$date)
    {
        $query = "INSERT INTO $this->table (`idProfessional`,`title`,`description`,`tags`,`img`,`date`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $idProfessional,
            $title,
            $description,
            $tags,
            $img,
            $date,
        ]);
        return $this->conn->lastInsertId();
    }

    public function get($id)
    {
        $query = "SELECT * FROM $this->table WHERE idProfessional=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($id));
        return $stmt;
    }

}