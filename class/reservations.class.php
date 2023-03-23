<?php
require_once  "../includes/config.php";
require_once  "../includes/fonctions.php";

class Reservations
{
    private $db;

    public function __construct()
    {
        $this->db = connect();
    }

    public function insert($id_user, $id_scenario, $heure)
    {
        $stmt = $this->db->prepare("INSERT INTO `reservation` (`id_user`, `id_scenario`, `heure`) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $id_user, $id_scenario, $heure);
        $stmt->execute();
        $stmt->close();
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
