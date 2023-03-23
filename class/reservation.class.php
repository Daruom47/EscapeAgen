<?php 

class Reservation {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function selectFigurines(){

        $query = "SELECT * FROM figurine";
        $prep = $this->db->prepare($query);
        $prep->execute();
        
        return  $prep->fetchALL(PDO::FETCH_ASSOC);
        
    }

    public function figurineByName($name){
        $query = "SELECT * FROM figurine 
        WHERE nom LIKE CONCAT('%',:name,'%')";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':name', $name, PDO::PARAM_STR);
        $prep->execute();

        return $prep->fetchALL(PDO::FETCH_ASSOC);
    }

    public function figurineByID($id){
        $query = "SELECT * FROM figurine 
        WHERE id = :id";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();

        return $prep->fetch(PDO::FETCH_ASSOC);
    }

    public function figurineByPrice($prix1, $prix2){
        $query = "SELECT * FROM figurine 
        WHERE prix BETWEEN :prix1 AND :prix2";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':prix1', $prix1, PDO::PARAM_INT);
        $prep->bindValue(':prix2', $prix2, PDO::PARAM_INT);
        $prep->execute();

        return $prep->fetchALL(PDO::FETCH_ASSOC);
    }


    public function insertFigurine($tab){
        $query = "INSERT INTO figurine (nom, prix, disponible, image)
        VALUES (:nom,:prix,:disponible,:image)";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':nom', $tab['nom'], PDO::PARAM_STR);
        $prep->bindValue(':prix', $tab['prix'], PDO::PARAM_INT);
        $prep->bindValue(':disponible', $tab['disponible'], PDO::PARAM_BOOL);
        $prep->bindValue(':image', $tab['image'], PDO::PARAM_STR);

        try {
            $prep->execute();
        } catch (\Throwable $th) {
            echo "erreur" . $th->getMessage();
        }
    }

    public function updateFigurine($tab,$id){
        $query = "UPDATE figurine
        SET nom = :nom, prix = :prix, disponible = :disponible
        WHERE id = :id";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':nom', $tab['nom'], PDO::PARAM_STR);
        $prep->bindValue(':prix', $tab['prix'], PDO::PARAM_INT);
        $prep->bindValue(':disponible', $tab['disponible'], PDO::PARAM_BOOL);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $prep->execute();
        } catch (\Throwable $th) {
            echo "erreur" . $th->getMessage();
        }
    }


    public function deleteFigurine($id) {
        $query = "DELETE FROM figurine
        WHERE id = :id" ;
        $prep = $this->db->prepare($query);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $prep->execute();
        } catch (\Throwable $th) {
            echo "erreur" . $th;
        }
    
    }
}