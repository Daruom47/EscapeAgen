<?php

class Reservation{
    private $db;

    public function __construct()
    {
        $this->db = connect();
    }

    public function getReservations(){
        $query = "SELECT * FROM reservation";
        $prep = $this->db->prepare($query);
        $prep->execute();

        return $prep->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationsById($id){
        $query = "SELECT * FROM reservation
        WHERE id = :id";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();

        return $prep->fetch(PDO::FETCH_ASSOC);
    }

    public function updateReservation($tab,$id){
        $query = "UPDATE reservation
        SET id_scenario = :id_scenario, nom = :nom, mail = :mail, telephone = :telephone, 
        nombre_adulte = :nombre_adulte, nombre_enfant = :nombre_enfant,
        jour = :jour, heure = :heure, information = :information
        WHERE id = :id";
        $prep = $this->db->prepare($query);
        $prep->bindValue(':id_scenario', $tab['id_scenario'], PDO::PARAM_STR);
        $prep->bindValue(':nom', $tab['nom'], PDO::PARAM_STR);
        $prep->bindValue(':mail', $tab['mail'], PDO::PARAM_STR);
        $prep->bindValue(':telephone', $tab['telephone'], PDO::PARAM_STR);
        $prep->bindValue(':nombre_adulte', $tab['nombre_adulte'], PDO::PARAM_STR);
        $prep->bindValue(':nombre_enfant', $tab['nombre_enfant'], PDO::PARAM_STR);
        $prep->bindValue(':jour', $tab['jour'], PDO::PARAM_STR);
        $prep->bindValue(':heure', $tab['heure'], PDO::PARAM_STR);
        $prep->bindValue(':information', $tab['information'], PDO::PARAM_STR);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $prep->execute();
        } catch (\Throwable $th) {
            echo "erreur" . $th->getMessage();
        }
    }

    public function delete($id){
        $query = "DELETE FROM reservation
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