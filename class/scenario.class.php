<!-- hash("sha256", rtrim($_POST["password"])) -->

<?php 
    class Scenario {
        private $db;
        public function __construct() {
            $this->db = connect();
        }
        public function getList($onlyDisplayEnabled = true) {
            $requete = $this->db->prepare("SELECT * FROM scenario".($onlyDisplayEnabled ? " WHERE display=1;" : ";"));
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
        public function add($scenario) {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("
                INSERT INTO scenario 
                (nom, image, short_resume, resume_complet,difficulty, min_players, max_players, time_mins, display) 
                VALUES (:nom, :image, :short_resume, :resume_complet, :difficulty, :min_players, :max_players, :time_mins, :display)
            ");
            $requete->execute(
                array(
                    $scenario["nom"], 
                    $scenario["image"], 
                    $scenario["short_resume"], 
                    $scenario["resume_complet"],
                    $scenario["difficulty"],
                    $scenario["min_players"],
                    $scenario["max_players"],
                    $scenario["time_mins"],
                    $scenario["display"]
                    )
                );
            $this->db->commit();
            return true;
        }
        public function update($scenario) {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("
                UPDATE scenario SET 
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
            $requete->execute(
                array(
                    $scenario["image"], 
                    $scenario["short_resume"], 
                    $scenario["resume_complet"],
                    $scenario["difficulty"],
                    $scenario["min_players"],
                    $scenario["max_players"],
                    $scenario["time_mins"],
                    $scenario["display"],
                    $scenario["id"]
                )
                );  
                $this->db->commit();
                return true;
        }
        public function delete($id) {
            $this->db->beginTransaction();
            $requete = $this->db->prepare("DELETE FROM scenario WHERE id = :id");
            $requete->execute(array(":id" => $id));
            $this->db->commit();
            return true;
        }
    }
?>