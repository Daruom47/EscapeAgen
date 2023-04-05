<?php

class Scenario
{
    private $db;
    public function __construct()
    {
        $this->db = connect();
    }
    public function getList($onlyDisplayEnabled = true)
    {
        $requete = $this->db->prepare("SELECT * FROM scenario" . ($onlyDisplayEnabled ? " WHERE display=1;" : ";"));
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($scenario)
    {
        try {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("
                INSERT INTO scenario 
                (nom, image, short_resume, resume_complet, difficulty, min_players, max_players, time_mins, display) 
                VALUES (:nom, :image, :short_resume, :resume_complet, :difficulty, :min_players, :max_players, :time_mins, :display)
            ");
            $requete->bindParam(':nom', $scenario["nom"]);
            $requete->bindParam(':image', $scenario["image"]);
            $requete->bindParam(':short_resume', $scenario["short_resume"]);
            $requete->bindParam(':resume_complet', $scenario["resume_complet"]);
            $requete->bindParam(':difficulty', $scenario["difficulty"]);
            $requete->bindParam(':min_players', $scenario["min_players"]);
            $requete->bindParam(':max_players', $scenario["max_players"]);
            $requete->bindParam(':time_mins', $scenario["time_mins"]);
            $requete->bindParam(':display', $scenario["display"]);
            $requete->execute();

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }
    public function update($scenario)
    {
        try {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("
                UPDATE scenario SET 
                    nom = :nom, 
                    image = :image, 
                    short_resume = :short_resume, 
                    resume_complet = :resume_complet, 
                    difficulty = :difficulty, 
                    min_players = :min_players, 
                    max_players = :max_players, 
                    time_mins = :time_mins, 
                    display = :display 
                WHERE id = :id
            ");
            $requete->bindParam(':nom', $scenario["nom"]);
            $requete->bindParam(':image', $scenario["image"]);
            $requete->bindParam(':short_resume', $scenario["short_resume"]);
            $requete->bindParam(':resume_complet', $scenario["resume_complet"]);
            $requete->bindParam(':difficulty', $scenario["difficulty"]);
            $requete->bindParam(':min_players', $scenario["min_players"]);
            $requete->bindParam(':max_players', $scenario["max_players"]);
            $requete->bindParam(':time_mins', $scenario["time_mins"]);
            $requete->bindParam(':display', $scenario["display"]);
            $requete->bindParam(':id', $scenario["id"]);
            $requete->execute();

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }
    public function get($id) {
        try {
            $requete = $this->db->prepare("SELECT * FROM scenario WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->execute();
            $scenario = $requete->fetch(PDO::FETCH_ASSOC);
            return $scenario;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération du scénario: " . $e->getMessage());
        }
    }
    
    public function delete($id) {
        try {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("DELETE FROM scenario WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->execute();
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw new Exception("Erreur lors de la suppression du scénario: " . $e->getMessage());
        }
    }
}    