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
        $query = "SELECT  proj.*, pro.* FROM $this->table proj JOIN professional pro ON  pro.id=proj.idProfessional  WHERE idProfessional=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($id));
        return $stmt;
    }

    public function getSingle($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfProjects($id)
    {
        $query = "SELECT * FROM $this->table WHERE idProfessional=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($id));
        return $stmt;
    }


    public function update($id,$title,$description,$tags,$img)
    {
        $query = "UPDATE $this->table SET `title`=:title,`description`=:description,`tags`=:tags,`img`=:img,`description`=:description WHERE id =:id ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':title',$title);
        $stmt->bindValue(':description',$description);
        $stmt->bindValue(':tags',$tags);
        $stmt->bindValue(':img',$img);
        $stmt->bindValue(':id',$id);


        $stmt->execute();
        return $stmt;
    } 

    public function delete($id){
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    } 
}