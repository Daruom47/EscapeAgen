<?php
require_once  "./includes/config.php";
require_once  "./includes/fonctions.php";

class Reservations
{
    private $db;

    public function __construct()
    {
        $this->db = connect();
    }

    public function insert($id_user, $id_scenario, $nom, $mail, $telephone, $nombre_adulte, $nombre_enfant, $jour, $heure, $information)
    {
        $stmt = $this->db->prepare("INSERT INTO `reservation` (`id_user`, `id_scenario`,`nom`,`mail`,`telephone`,`nombre_adulte`,`nombre_enfant`,`jour`,`heure`,`information`) VALUES (:id_user, :id_scenario, :nom, :mail, :telephone, :nombre_adulte, :nombre_enfant, :jour, :heure, :information)");

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_scenario', $id_scenario, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_adulte', $nombre_adulte, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_enfant', $nombre_enfant, PDO::PARAM_INT);
        $stmt->bindParam(':jour', $jour, PDO::PARAM_STR);
        $stmt->bindParam(':heure', $heure, PDO::PARAM_STR);
        $stmt->bindParam(':information', $information, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    public function reservationExist($id_scenario, $jour, $heure)
    {
        $stmt = $this->db->prepare("SELECT * FROM reservation WHERE id_scenario = :id_scenario AND jour = :jour AND heure = :heure");
        $stmt->bindParam(':id_scenario', $id_scenario, PDO::PARAM_INT);
        $stmt->bindParam(':jour', $jour, PDO::PARAM_STR);
        $stmt->bindParam(':heure', $heure, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->rowCount();
        if ($resultat > 0) {
            // L'élément existe déjà en base de données
            return true;
        } else {
            // L'élément n'existe pas en base de données
            return false;
        }
    }
    public function playerlimit($nombre_enfant,$nombre_adulte,$limitemin,$limitemax)
    {
        return $nombre_adulte + $nombre_enfant <= $limitemax && $nombre_adulte + $nombre_enfant >= $limitemin;
    }

    public function update($id, $id_user, $id_scenario, $heure)
    {
        $stmt = $this->db->prepare("UPDATE `reservation` SET `id_user` = ?, `id_scenario` = ?, `heure` = ? WHERE `id` = ?");
        $stmt->bind_param("iisi", $id_user, $id_scenario, $heure, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM `reservation` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM `reservation`");
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM `reservation` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function getByIdUser($id_user)
    {
        $stmt = $this->db->prepare("SELECT * FROM `reservation` WHERE `id_user` = ?");
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

}
